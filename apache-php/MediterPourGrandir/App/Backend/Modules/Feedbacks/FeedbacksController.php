<?php
namespace App\Backend\Modules\Feedbacks;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Feedback;
use \FormBuilder\FeedbackFormBuilder;

class FeedbacksController extends BackController
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

  
  public function executeIndexFeedbacks(HTTPRequest $request)
  { 	  
    $user = $this->verifSession();

    $manager = $this->managers->getManagerOf('Feedback');
    
    $this->page->addVar('listFeedbacks', $manager->getOldFeedback());
    // $this->page->addVar('nombreNews', $manager->count());

    $this->page->addVar('student', $user); 
    $this->page->addVar('title', 'Gestion des news');
  }
 
  public function executeUpdate(HTTPRequest $request)
  {    

    $this->processForm($request);

    $this->page->addVar('title', 'Modification d\'une news');
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
