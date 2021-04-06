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
    // check if student have feedback (return a bool)
    // $haveFeedback = $managerFeedback->haveFeedBack($user->id());
    

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
	    // no good ..... need to implement new req from feedback id
	    $feedback = $managerFeedback->modereGetFeedback($request->getData('id'));
    }
    // else 
    // { 
    //   $feedback = new Feedback;
    // }

    $formBuilder = new FeedbackFormBuilder($feedback, $user->csrf());
    $formBuilder->build();  

    $form = $formBuilder->form();

    $feedbackFormHandler = new FeedbackFormHandler($form, $managerFeedback, $request);

    // see the story of the process($haveFeedback) which $haveFeedback is a bool.... 
    // if ($feedbackFormHandler->process($haveFeedback))
    if ($feedbackFormHandler->process(true))
    {
      $this->app->user()->setFlash('Votre avis a bien été ajouté, merci !');
      
      // $this->app->httpResponse()->redirect('/learn/learn.php');
    }

    if ($feedback->grade()) { $this->page->addVar('grade', $feedback->grade());}
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Moderez le feedback');
    $this->page->addVar('student', $user);

  }
}
