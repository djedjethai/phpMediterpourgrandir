<?php
namespace App\Frontend\Modules\News;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Comment;
use \Entity\News;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\NewsFormBuilder;
use \App\Frontend\Modules\News\NewsFormHandler;
use \OCFram\ObserverNotify;



class NewsController extends BackController
{
  
  public function executeIndex(HTTPRequest $request)
  {   
    $user = $this->verifSession();

    $nombreNews = $this->app->config()->get('nombre_news');
    $nombreCaracteres = $this->app->config()->get('nombre_caracteres');
    
    $manager = $this->managers->getManagerOf('News');

    $page = floatval($request->getData('page'));
    $totalPages = floor( intval($manager->count(), 10) / 10);

    $nameCache = substr($_SERVER['REQUEST_URI'],6,-4);
    $listeNews = $this->cache->read($nameCache);
    
    if ($listeNews === null)
    {
      // echo 'from db';
      $fromNewsNbr = ($page - 1) * 10;
      $listeNews = $manager->getList($fromNewsNbr, $nombreNews);
    
      $this->cache->write($nameCache, $listeNews, '2 months');
    }
    // if no cache query list of news and cache it 
    
    
    foreach ($listeNews as $news)
    {
      if (strlen($news->contenu()) > $nombreCaracteres)
      {
        $debut = substr($news->contenu(), 0, $nombreCaracteres);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
        
        $news->setContenu($debut);
      }
    }

    // send num de page
    $this->page->addVar('page', $page);
    // send total news
    $this->page->addVar('totalPages', $totalPages);
    // On ajoute la variable $listeNews à la vue.
    $this->page->addVar('listeNews', $listeNews);
    $this->page->addVar('student', $user);
  }
  
  public function executeShow(HTTPRequest $request)
  {
    $user = $this->verifSession();


    // cache modif this block
    $newsId = $request->getData('id');

    // read cache implementation
    $nameCache = 'news-'.$newsId;
    $news = $this->cache->read($nameCache);
    if ($news === null) 
    {
      // echo 'from db';
      $news = $this->managers->getManagerOf('News')->getUnique($newsId);
       if (!empty($news))
      {
        $this->cache->write($nameCache, $news, '2 months');
      }
    }
    
    if (empty($news))
    {
      $this->app->httpResponse()->redirect404();
    }

    //check is last comment to autorize or not to add comment
    $lastComment = $this->managers->getManagerOf('Comments')->getLastComment($news->id());

    //if news have comment $user can not comment but still can modif
    $newsHaveComment = $this->managers->getManagerOf('Comments')->isNewsHaveComment($news->id());
    if ($news->auteurId() === $user->id())
    {
      $this->page->addVar('newsHaveComment', $newsHaveComment);
    } 
    else 
    {
      $newsHaveComment = true;
      $this->page->addVar('newsHaveComment', $newsHaveComment);
    }
    
    
    $this->page->addVar('lastComment', $lastComment);
    $this->page->addVar('student', $user);
    $this->page->addVar('title', $news->titre());
    $this->page->addVar('news', $news);
    $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($news->id()));
  }

  public function executeInsertComment(HTTPRequest $request)
  {
     //verif the session
    $user = $this->verifSession();


    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST' && hash_equals($user->csrf(), $request->getPost('csrfForm')))
    {
      $comment = new Comment([
        'newsId' => $request->getData('news'),
        'auteurComId' => $user->id(),//ne sera plus sesion mais objet
        'contenu' => $request->postData('contenu')
      ]);

      //$managerCom = $this->managers->getManagerOf('Comments');
      $managerNotif = $this->managers->getManagerOf('Notification');     

      //we attach the ObserverNotify
      $comment->attach(new ObserverNotify($managerNotif));
      $comment->notify($user->id());
    }
    else
    {	
      $comment = new Comment;
    }

    $formBuilder = new CommentFormBuilder($comment, $user->csrf());
    $formBuilder->build();

    $form = $formBuilder->form();

    $newsFormHandler = new NewsFormHandler($form, $this->managers->getManagerOf('Comments'), $request);


    if ($newsFormHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');
      
      $this->app->httpResponse()->redirect('news-'.$request->getData('news').'.php');
    }

    $this->page->addVar('comment', $comment);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Ajout d\'un commentaire');
    $this->page->addVar('student', $user);
  }

  public function executeInsert(HTTPRequest $request)
  {
    $this->processForm($request);

    $this->page->addVar('title', 'Ajout d\'une news');
  }

  public function executeUpdate(HTTPRequest $request)
  {
    $this->processForm($request);

    $this->page->addVar('title', 'Modification d\'une news');
  }


  public function executeUpdateComment(HTTPRequest $request)
  {

    $this->page->addVar('title', 'Modification d\'un commentaire');

    $user = $this->verifSession();

    if ($request->method() == 'POST' && hash_equals($user->csrf(), $request->getPost('csrfForm')))
    {
      $comment = new Comment([
        'id' => $request->getData('id'),
        'auteurComId' => $user->id(),//sera objet
        'contenu' => $request->postData('contenu')
      ]);
    }
    else
    {
      $comment = $this->managers->getManagerOf('Comments')->get($request->getData('id'));
    }

    $formBuilder = new CommentFormBuilder($comment, $user->csrf());
    $formBuilder->build();

    $form = $formBuilder->form();

    // we pass the csrfToken as an argument, to be implement(hidden) in any created form ..????  
    $newsFormHandler = new NewsFormHandler($form, $this->managers->getManagerOf('Comments'), $request);

    if ($newsFormHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été modifié');

      $comment = $this->managers->getManagerOf('Comments')->get($request->getData('id'));

      $this->app->httpResponse()->redirect('news-'.$comment['newsId'].'.php');
    }

    $this->page->addVar('form', $form->createView());
    $this->page->addVar('student', $user);
  }


  public function processForm(HTTPRequest $request)
  {
    $user = $this->verifSession();

    if ($request->method() == 'POST' && hash_equals($user->csrf(), $request->getPost('csrfForm')))
    {
       
      // in case of any update or news's insertion, we delete all index-x files
      $this->cache->deleteIndex();

      // if update of a news, delete the news's cache
      if (file_exists($this->cache->dataFolder()."/news-".$request->getData('id')))
      {
        $this->cache->delete('news-'.$request->getData('id'));
      }  

      $news = new News([
        'auteurId' => $user->id(),
        'titre' => $request->postData('titre'),
        'contenu' => $request->postData('contenu'),
        'levelNew' => $user->level(),
      ]);


      if ($request->getExists('id'))
      {
        $news->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant de la news est transmis si on veut la modifier
      if ($request->getExists('id'))
      {
        $news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
      }
      else
      {
        $news = new News;
      }
    }

    $formBuilder = new NewsFormBuilder($news, $user->csrf());
    $formBuilder->build();

    $form = $formBuilder->form();

    $newsFormHandler = new NewsFormHandler($form, $this->managers->getManagerOf('News'), $request);

    if ($newsFormHandler->process())
    {
      $this->app->user()->setFlash($news->isNew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée !');
      
      $this->app->httpResponse()->redirect('/news/index-1.php');
    }

    $this->page->addVar('form', $form->createView());
    $this->page->addVar('student', $user);
  }  
}
