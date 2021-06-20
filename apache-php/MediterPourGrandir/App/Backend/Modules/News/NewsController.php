<?php
namespace App\Backend\Modules\News;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\News;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\NewsFormBuilder;
use \App\Frontend\Modules\News\NewsFormHandler;

class NewsController extends BackController
{
  public function executeDisconnect(HTTPRequest $request)
  {
    $this->app->user()->setAuthenticated(false);
    $this->app->httpResponse()->redirect('/');
  }
  
  public function executeDelete(HTTPRequest $request)
  {	  
    $user = $this->verifSession();

    $newsId = $request->getData('id');

    $this->managers->getManagerOf('News')->delete($newsId);
    $this->managers->getManagerOf('Comments')->deleteFromNews($newsId);

    // delete all caches
    $this->cache->deleteIndex();
    if (file_exists($this->cache->dataFolder()."/news-".$request->getData('id')))
    {   
        $this->cache->delete('news-'.$request->getData('id'));
    } 

    $this->app->user()->setFlash('La news a bien été supprimée !');

    $this->app->httpResponse()->redirect('.');
  }

  public function executeDeleteComment(HTTPRequest $request)
  {
    $user = $this->verifSession();
   
    $this->managers->getManagerOf('Comments')->delete($request->getData('id'));

    // delete index's cache as the number of comments will decrease
    $this->cache->deleteIndex();
      
    $this->app->user()->setFlash('Le commentaire a bien été supprimé !');

    // var_dump($request);

    $this->app->httpResponse()->redirect('/news/index-1.php');
  }

  public function executeIndex(HTTPRequest $request)
  { 	  
    $user = $this->verifSession();

    $manager = $this->managers->getManagerOf('News');
    
    $this->page->addVar('listeNews', $manager->getList());
    $this->page->addVar('nombreNews', $manager->count());

    $this->page->addVar('student', $user); 
    $this->page->addVar('title', 'Gestion des news');
  }
 
  public function executeUpdate(HTTPRequest $request)
  {    

    $this->processForm($request);

    $this->page->addVar('title', 'Modification d\'une news');
  }

  public function executeUpdateComment(HTTPRequest $request)
  { 
    $user = $this->verifSession();

    $this->page->addVar('title', 'Modification d\'un commentaire');

    if ($request->method() == 'POST' && hash_equals($user->csrf(), $request->getPost('csrfForm')))
    {
      $comment = new Comment([
        'id' => $request->getData('id'),
        'auteur' => $request->postData('auteur'),
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

    $newsFormHandler = new NewsFormHandler($form, $this->managers->getManagerOf('Comments'), $request);

    if ($newsFormHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été modifié');

      $this->app->httpResponse()->redirect('/news/index-1.php');
    }

    $this->page->addVar('form', $form->createView());
    $this->page->addVar('student', $user); 
  }

  public function processForm(HTTPRequest $request)
  {
    $user = $this->verifSession();

    // if ($request->method() == 'POST')
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
        //'auteur' => $request->postData('auteur'),
        'titre' => $request->postData('titre'),
        'contenu' => $request->postData('contenu')
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

    // var_dump($news);
    $formBuilder = new NewsFormBuilder($news, $user->csrf());
    // $formBuilder = new NewsFormBuilder($news);
    $formBuilder->build();

    $form = $formBuilder->form();

    $newsFormHandler = new NewsFormHandler($form, $this->managers->getManagerOf('News'), $request);

    if ($newsFormHandler->process())
    {
      $this->app->user()->setFlash($news->isNew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée !');
      
      $this->app->httpResponse()->redirect('/admin/');
    }

    $this->page->addVar('student', $user); 
    $this->page->addVar('form', $form->createView());
  }
}
