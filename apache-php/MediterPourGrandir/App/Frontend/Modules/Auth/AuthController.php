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

    $this->page->addVar('title', 'bienvenue a l\'authentification.');

    $formBuilder->build();

    $form = $formBuilder->form();
    
    $managerAuth = $this->managers->getManagerOf('Auth');

    $authFormHandler = new AuthFormHandler($form, $managerAuth, $request);

    $wrongEmailPassword = '';
    
    $exist = $authFormHandler->processAuth($student);

    if ($exist === 'exist')
    {
      // $this->app->user()->setFlash('');

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

    $this->page->addVar('title', 'bienvenue a authentification sign Up');

    $formBuilder->build();

    $form = $formBuilder->form();
    
    $authFormHandler = new AuthFormHandler($form, $this->managers->getManagerOf('Auth'), $request);

    // form handler check emailRepeat/pseudoRepeat/confirmPassword
    $signUpErr = $authFormHandler->processRegistration($student);

    if($signUpErr === 'register'){
        $this->app->user()->setFlash('Votre pre-enregistrement a bien ete effectue, un mail vous a ete envoye afin de confirmer votre inscription, merci !');

        $this->app->httpResponse()->redirect('/');
      
        // $this->app->httpResponse()->redirect('/auth/registration.php');
    }

    $this->page->addVar('signUpErr', $signUpErr);
    $this->page->addVar('Inscription', $student);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Creation d\'un compte');

  }

  // public function executeRegistration(HTTPRequest $request)
  // {
  //   $this->app->user()->setFlash('Un email vous a ete envoye afin de confirmer votre inscription, merci !');
  // }

  public function executeConfRegistration(HTTPRequest $request)
  {
      $this->app->user()->setFlash('Votre compte est active.');
      
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

        $this->app->user()->setFlash('Bienvenue, en esperant que ce cours reponde a vos attentes, nous vous souhaitons de bonnes seances de meditation.');

        $this->app->httpResponse()->redirect('/learn/learn.php');

      }
      else
      {
        //throw err
        $this->app->httpResponse()->redirect('/');
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

    $this->page->addVar('title', 'Vous avez oublie votre mot de passe');

    $formBuilder->build();

    $form = $formBuilder->form();
    
    $managerAuth = $this->managers->getManagerOf('Auth');

    $authFormHandler = new AuthFormHandler($form, $managerAuth, $request);
    
    if($authFormHandler->processForgetPassword($student))
    {

      $this->app->user()->setFlash('Un email contenant votre mot de passe vous a ete envoye.');

      $this->app->httpResponse()->redirect('/');

      // $this->app->httpResponse()->redirect('/auth/password.php');
      
    }

    $this->page->addVar('mot de passe oublie', $student);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'mot de passe oublie');
  }

  // public function executePassword(HTTPRequest $request)
  // {
  //   $this->app->user()->setFlash('Un email contenant votre mot de passe vous a ete envoye');
  // }
}
