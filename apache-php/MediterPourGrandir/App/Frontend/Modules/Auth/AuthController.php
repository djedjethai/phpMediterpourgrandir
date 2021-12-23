<?php
namespace App\Frontend\Modules\Auth;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Student;
use \FormBuilder\StudentSignUpFormBuilder;
use \FormBuilder\StudentSignInFormBuilder;
use \FormBuilder\StudentForgetPasswordFormBuilder;
use \App\Frontend\Modules\Auth\AuthFormHandler;



class AuthController extends BackController
{
  public function executeSignIn(HTTPRequest $request)
  {
  	if ($request->method() == 'POST')
    {
      $student = new Student([
        'email' => $request->postData('email'),
        'password' => $request->postData('password')
      ]);
    }
    else
    {
      $student = new Student;
    }

    // create csrf
    $csrfForm = $this->createCsrf();

    $formBuilder = new StudentSignInFormBuilder($student, $csrfForm);

    $this->page->addVar('title', 'Bienvenue à l\'authentification.');

    $formBuilder->build();

    $form = $formBuilder->form();
    
    $managerAuth = $this->managers->getManagerOf('Auth');

    $authFormHandler = new AuthFormHandler($form, $managerAuth, $request);

    $wrongEmailPassword = '';
    
    $exist = $authFormHandler->processAuth($student);

    if ($exist === 'exist')
    {
      //we set the session[]
      $studAuth = $managerAuth->getStudent($student);

      $sessionId = $this->session->signInSetSession($studAuth->id(), $csrfForm);

      $this->app->user()->setUser($sessionId);//sock id table correspondant a l'user


      $this->app->httpResponse()->redirect('/learn/learn.php');
    }
    if ($exist === 'unknow')
    {
      $wrongEmailPassword = 'Votre email ou votre mot de passe est incorrect';
    } 

    $this->page->addVar('wrongEmailPassword', $wrongEmailPassword);
    $this->page->addVar('Connection', $student);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'acces au compte');
  }


  public function executeSignUp(HTTPRequest $request)
  {
  	if ($request->method() == 'POST')
    {
      $student = new Student([
        'pseudo' => $request->postData('pseudo'),
        'email' => $request->postData('email'),
        'password' => $request->postData('password'),
        'confirmPassword' => $request->postData('confirmPassword')
      ]);
    }
    else
    {
      $student = new Student;
    }

    $csrfForm = $this->createCsrf();

    $formBuilder = new StudentSignUpFormBuilder($student, $csrfForm);

    $this->page->addVar('title', 'Bienvenue à authentification sign Up');

    $formBuilder->build();

    $form = $formBuilder->form();
    
    $authFormHandler = new AuthFormHandler($form, $this->managers->getManagerOf('Auth'), $request);

    // form handler check emailRepeat/pseudoRepeat/confirmPassword
    $signUpErr = $authFormHandler->processRegistration($student);

    if($signUpErr === 'register'){

        $this->app->user()->setFlash('Votre pré-enregistrement a bien été effectué, un mail vous a été envoyé afin de confirmer votre inscription, merci (si l\'email n\'apparait pas, pensez à vérifier vos pourriels/spams)!');

        $this->app->httpResponse()->redirect('/');
      
        // $this->app->httpResponse()->redirect('/auth/registration.php');
    }

    $this->page->addVar('signUpErr', $signUpErr);
    $this->page->addVar('Inscription', $student);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Creation d\'un compte');

  }

  public function executeConfRegistration(HTTPRequest $request)
  {
      $this->app->user()->setFlash('Votre compte est activé.');
      
      $data = $request->getData('key');
    
      $key = intval(substr($data, 0, 14));

      $id = intval(substr($data, 14));

     
      $managerAuth = $this->managers->getManagerOf('Auth');

      if ($managerAuth->confStudent($id, $key))
      {
  
        $managerAuth->confRegistration($id, $key);//Si ok je stocke l'id du student dans la table auth e recupere l'id corresondant
        
        $csrfForm = $this->createCsrf();
        $sessionId = $this->session->setSessionUser($id, $csrfForm);

        $this->app->user()->setUser($sessionId);//on stoke l'id (table auth)

        $this->app->user()->setFlash('Bienvenue, en espérant que cet enseignement réponde à vos attentes, nous vous souhaitons de bonnes séances de méditation.');

        $this->app->httpResponse()->redirect('/learn/learn.php');

      }
      else
      {
	      // if active link confInscription when already signedin	
	      // kill session first
	      	$sessionId = $this->app->user()->getUser();

    		if($sessionId)
    		{
      			$this->app->user()->deconnexionUser();
    		}
	
		$this->app->httpResponse()->redirect('/auth/signIn.php');
      } 
  }

  public function executeForgetPassword(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $student = new Student([
        'pseudo' => $request->postData('pseudo'),
        'email' => $request->postData('email')
      ]);
    }
    else
    {
      $student = new Student;
    }

    $csrfForm = $this->createCsrf();

    $formBuilder = new StudentForgetPasswordFormBuilder($student, $csrfForm);

    $this->page->addVar('title', 'Vous avez oublié votre mot de passe');

    $formBuilder->build();

    $form = $formBuilder->form();
    
    $managerAuth = $this->managers->getManagerOf('Auth');

    $authFormHandler = new AuthFormHandler($form, $managerAuth, $request);

    $wrongEmailPseudo = ""; 
    if($request->method() == 'POST')
    {
    	if($authFormHandler->processForgetPassword($student))
    	{

    	  $this->app->user()->setFlash('Un email contenant un nouveau mot de passe vous a été envoyé (si l\'email n\'apparait pas, pensez à vérifier vos pourriels/spams).');

    	  $this->app->httpResponse()->redirect('/');

    	  // $this->app->httpResponse()->redirect('/auth/password.php');
    	  
    	}
    	else {
    	    $wrongEmailPseudo = "Votre email ou votre pseudo est incorrect";
	}
    }

    $this->page->addVar('wrongEmailPseudo', $wrongEmailPseudo);
    $this->page->addVar('mot de passe oublié', $student);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'mot de passe oublié ');
  }
}
