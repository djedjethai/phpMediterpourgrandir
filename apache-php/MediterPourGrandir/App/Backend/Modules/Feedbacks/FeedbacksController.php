<?php
namespace App\Backend\Modules\Feedbacks;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Feedback;
use \FormBuilder\FeedbackFormBuilder;
use \App\Frontend\Modules\Learn\FeedbackFormHandler; 

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

    $feedbackId = $request->getData('id');

    $this->managers->getManagerOf('Feedback')->delete($feedbackId);

    // delete all caches
    if (file_exists($this->cache->dataFolder()."/feedbacks/welcomePageAllFeed"))
    {
      	$this->cache->delete('/feedbacks/welcomePageAllFeed');
    }  
    if (file_exists($this->cache->dataFolder()."/feedbacks/welcomePage"))
    {
     	$this->cache->delete('/feedbacks/welcomePage');
    }  
    
    $this->app->user()->setFlash('Le feedback a bien été supprimée !');

    $this->app->httpResponse()->redirect('.');
  }

  
  public function executeIndexFeedbacks(HTTPRequest $request)
  { 	  
    $user = $this->verifSession();

    $manager = $this->managers->getManagerOf('Feedback');
    
    $this->page->addVar('listFeedbacks', $manager->getFeedback(0,50));
    // $this->page->addVar('nombreNews', $manager->count());

    $this->page->addVar('student', $user); 
    $this->page->addVar('title', 'Gestion des news');
  }
 
  public function executeUpdate(HTTPRequest $request)
  {    

    $this->processForm($request);

    $this->page->addVar('title', 'Modification d\'un feedback');
  }

 
  public function processForm(HTTPRequest $request)
  {
    $user = $this->verifSession();

    $managerFeedback = $this->managers->getManagerOf('Feedback');

    if ($request->method() == 'POST' && hash_equals($user->csrf(), $request->getPost('csrfForm')))
    {

      if (file_exists($this->cache->dataFolder()."/feedbacks/welcomePageAllFeed"))
      {
        $this->cache->delete('/feedbacks/welcomePageAllFeed');
      }  

      if (file_exists($this->cache->dataFolder()."/feedbacks/welcomePage"))
      {
        $this->cache->delete('/feedbacks/welcomePage');
      }  

      $feedback = new Feedback([
      'studentId' => $user->id(),
      'contenu' => $request->postData('contenu'),
      'grade' => intval($request->postData('grade'))
      ]);
    } 
    else
    {
	    $feedback = $managerFeedback->modereGetFeedback($request->getData('id'));
    }

    $formBuilder = new FeedbackFormBuilder($feedback, $user->csrf());
    $formBuilder->build();  

    $form = $formBuilder->form();

    $feedbackFormHandler = new FeedbackFormHandler($form, $managerFeedback, $request);

    if ($feedbackFormHandler->process(true))
    {
      $this->app->user()->setFlash('Votre avis a bien été ajouté, merci !');
      
      // $this->app->httpResponse()->redirect('/learn/learn.php');
      $this->app->httpResponse()->redirect('/admin/feedbacks');
    }

    if ($feedback->grade() !== null) { $this->page->addVar('grade', $feedback->grade());}
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Moderez le feedback');
    $this->page->addVar('student', $user);

  }
}
