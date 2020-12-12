<?php
namespace App\Frontend\Modules\Learn;

use \Entity\Student;
use \Entity\Lesson;
use \Entity\Feedback;
use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \OCFram\FormHandler;
use \FormBuilder\FeedbackFormBuilder;
use \App\Frontend\Modules\Learn\FeedbackFormHandler;


class LearnController extends BackController
{

  public function executeLearn(HTTPRequest $request)
  {
    //we verify the session
    $student = $this->verifSession();

    $manager = $this->managers->getManagerOf('Learn');

    $interLesson = $manager->getIntervalLesson($student);

    if($interLesson === false || ($student->lesson() == 1))
    {   
      $lesson = $manager->getLesson($student->lesson());
    }
    else
    {
      $lastLesson = $student->lesson() - 1 ;
      $lesson = $manager->getLesson($lastLesson);
    }

    // var_dump($lesson);

    $this->page->addVar('interLesson', $interLesson);
    $this->page->addVar('lesson', $lesson);
    $this->page->addVar('student', $student);
  }

  public function updateStudentStatus($student, $manager, $updatedLesson) 
  {
    $student->setLesson($updatedLesson);
    $updatedLevel = $student->level() + 1;
    $student->setLevel($updatedLevel);
    $manager->updateStudent($student);
  }


  public function executeLessonFinish(HTTPRequest $request)
  {
    //we verify the session
    $student = $this->verifSession();
    
    $manager = $this->managers->getManagerOf('Learn');

    $updatedLesson = $student->lesson() + 1;

    switch($updatedLesson){
      // case 3 :
      //   // we update the student's lesson && level in student's database table
      //   $this->updateStudentStatus($student, $manager, $updatedLesson);
      //   $this->app->httpResponse()->redirect('/learn/addFeedback.php');
      //   break;
      case 12 :
        // we update the student's lesson && level in student's database table
        $this->updateStudentStatus($student, $manager, $updatedLesson);
        $this->app->httpResponse()->redirect('/learn/addFeedback.php');
        break;
      case 19 :
        $updatedLevel = $student->level() + 1;
        $student->setLevel($updatedLevel);
        break;
      case 37 :
        $this->updateStudentStatus($student, $manager, $updatedLesson);
        $this->app->httpResponse()->redirect('/learn/addFeedback.php');
        break;
      case 44 :
        $updatedLevel = $student->level() + 1;
        $student->setLevel($updatedLevel);
        break;
      case 48 :
        $this->updateStudentStatus($student, $manager, $updatedLesson);
        $this->app->httpResponse()->redirect('/learn/addFeedback.php');
        break; 
    }

    // we update the student's lesson in student's database table
    $student->setLesson($updatedLesson);
    $manager->updateStudent($student);



    $this->app->httpResponse()->redirect('/learn/learn.php');

  }
  

  public function executeDeconnexion(HTTPRequest $request)
  {
    
    $sessionId = $this->app->user()->getUser();
    $this->session->deleteSessionDb($sessionId);

    $this->app->user()->deconnexionUser();
   
  }

  
  // this method works for adding or updating a feedback
  public function executeAddFeedback(HTTPRequest $request) 
  {
    $user = $this->verifSession();

    $managerFeedback = $this->managers->getManagerOf('Feedback');
    // check if student have feedback (return a bool)
    $haveFeedback = $managerFeedback->haveFeedBack($user->id());
    

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
    elseif($haveFeedback)
    {
      $feedback = $managerFeedback->getOldFeedback($user->id());
    }
    else 
    { 
      $feedback = new Feedback;
    }

    $formBuilder = new FeedbackFormBuilder($feedback, $user->csrf());
    $formBuilder->build();  

    $form = $formBuilder->form();

    $feedbackFormHandler = new FeedbackFormHandler($form, $managerFeedback, $request);
    
    if ($feedbackFormHandler->process($haveFeedback))
    {
      $this->app->user()->setFlash('Votre avis a bien été ajouté, merci !');
      
      $this->app->httpResponse()->redirect('/learn/learn.php');
    }

    if ($feedback->grade()) { $this->page->addVar('grade', $feedback->grade());}
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Ajouter votre avis');
    $this->page->addVar('student', $user);

  }

  
  public function executePastLearn(HTTPRequest $request)
  {
    
  }

  public function executeDonation(HTTPRequest $request)
  {
  
  }
}
