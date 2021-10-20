<?php
namespace App\Frontend\Modules\Account;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \OCFram\ImageHandler;
use \Entity\Student;
use \Entity\StudentModifyAccount;
use \FormBuilder\StudentResetAccountFormBuilder;
use \FormBuilder\StudentResetPasswordFormBuilder;
use \App\Frontend\Modules\Account\AccountFormHandler;


class AccountController extends BackController
{

	public function executeMessage(HTTPRequest $request)
  {
    	//we verify the session
    	$student = $this->verifSession();

    	$managerAccount = $this->managers->getManagerOf('Account');

    	$message = [];
    	$messages = $managerAccount->getMessages($student->id());

      
      foreach ($messages as $message) {
        if ($message->status()) {
          $managerAccount->MessageUpdateNotification($message->idNotify());
        }
      }
    	
    	$this->page->addVar('student', $student);
    	$this->page->addVar('messages', $messages);
  }



  public function executeModifyAccount(HTTPRequest $request)
  {

    $user = $this->verifSession();
    $imageErr = false;

    if ($request->method() == 'POST' && hash_equals($user->csrf(), $request->getPost('csrfForm')))
    {

        if ($request->fileExists('picture'))
        {
          $imageDestination = "/var/www/html/Web/pictures";
          $imageHandler = new ImageHandler($imageDestination);
          $imageErr = $imageHandler->checkFile($request->fileData('picture'));
        }

        if ($request->postData('deletePic') && $request->postData('password')) 
        {
         $student = new StudentModifyAccount([
          'id' => $user->id(),
          'pseudo' => $request->postData('pseudo'),
          'email' => $request->postData('email'),
          'password' => $request->postData('password'),
          'picture' => '',
          'newPicture' => ''
        ]);
        }
        else
        {
          $student = new StudentModifyAccount([
            'id' => $user->id(),
            'pseudo' => $request->postData('pseudo'),
            'email' => $request->postData('email'),
            'password' => $request->postData('password'),
            'picture' => $user->picture(),
            'newPicture' => $request->fileData('picture')["name"]
          ]);
        }
        // as some client datas has been updated, we delete all caches.
        $this->cache->deleteIndex();
        $this->cache->deleteAllNews();	
        $this->cache->delete('/feedbacks/welcomePage');
        $this->cache->delete('/feedbacks/welcomePageAllFeed');
         // $this->cache->delete('news-'.$request->getData('id'));
    }
    else
    {
      $student = new StudentModifyAccount([
        'pseudo' => $user->pseudo(),
        'email' => $user->email(),
	'picture' => $user->picture(),
	'message' => $user->message()
      ]);
    }

    $formBuilder = new StudentResetAccountFormBuilder($student, $user->csrf());

    $this->page->addVar('title', 'Modifier votre compte');

    $formBuilder->build();

    $form = $formBuilder->form();
    
    $accountFormHandler = new AccountFormHandler($form, $this->managers->getManagerOf('Account'), $request);
    
    $errMessage = '';
  
     if ($request->method() == 'POST' && hash_equals($user->csrf(), $request->getPost('csrfForm')))
    {
      
      $errMessage = $accountFormHandler->processStudentVerification($student);

      if($errMessage === 'verifOk' && !$imageErr) {
        
        $uploadSuccess = $imageHandler->uploadFile($request->fileData('picture'));
        $accountFormHandler->processStudentModification($student, $user);
        $this->app->user()->setFlash('La modification de votre compte a été effectuée');
        $this->app->httpResponse()->redirect('/Account/modifyAccount.php');
      }
      
    }
    
    $this->page->addVar('errImage', $imageErr);
    $this->page->addVar('errMessage', $errMessage);
    $this->page->addVar('student', $student);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Modification du compte');

  }

  public function executeModifyPassword(HTTPRequest $request)
  {

    $user = $this->verifSession();


    if ($request->method() == 'POST' && hash_equals($user->csrf(), $request->getPost('csrfForm')))
    {
      $student = new StudentModifyAccount([
        'id' => $user->id(),
        'password' => $request->postData('password'),
        'newPassword' => $request->postData('newPassword'),
        'confirmPassword' => $request->postData('confirmPassword')
      ]);
    }
    else
    {
      $student = new StudentModifyAccount(['message' => $user->message()]);
    } 

    $formBuilder = new StudentResetPasswordFormBuilder($student, $user->csrf());


    $this->page->addVar('title', 'Modifier votre compte');

    $formBuilder->build();

    $form = $formBuilder->form();
    
    $accountFormHandler = new AccountFormHandler($form, $this->managers->getManagerOf('Account'), $request);
    
    $errMessage = '';
    
     if ($request->method() == 'POST' && hash_equals($user->csrf(), $request->getPost('csrfForm')))
    {

      $errMessage = $accountFormHandler->processPasswordVerification($student);

      if($errMessage === 'verifOk'){
        $accountFormHandler->processPasswordModification($student, $user);
        $this->app->user()->setFlash('La modification de votre compte a été effectuée');
        $this->app->httpResponse()->redirect('/Account/modifyAccount.php');
      }
    }

      
    $this->page->addVar('errMessage', $errMessage);
    $this->page->addVar('student', $student);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Modification du compte');

  }
}

