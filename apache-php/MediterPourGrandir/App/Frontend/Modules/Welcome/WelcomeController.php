<?php
namespace App\Frontend\Modules\Welcome;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Contact;
use \FormBuilder\ContactFormBuilder;
use \App\Frontend\Modules\Welcome\WelcomeFormHandler;
use \OCFram\MyException;
use \OCFram\Captcha;

class WelcomeController extends BackController
{
  public function verifSession()
  {
    $user = null;
    $sessionId = $this->app->user()->getUser();
    if(isset($sessionId) && $sessionId) {
       $user = $this->session->isValidSession($sessionId);
    }
    return $user;
  }


  public function executeIndex(HTTPRequest $request)
  {
    $user = $this->verifSession();

    if($user) {
      $this->page->addVar('student', $user);
    }

    $nameCache = '/feedbacks/welcomePage';

    $listFeedbacks = null;
    if ($listFeedbacks === null)
    {
      $manager =  $this->managers->getManagerOf('Feedback');
      $listFeedbacks = $this->getFeedbackHepler();

      $this->cache->write($nameCache, $listFeedbacks, '2 months');
    }

    $this->page->addVar('feedbacks', $listFeedbacks);

    $this->page->addVar('title', 'Bienvenue a acceuil');
  }
   
  public function executeQuiSuisJe(HTTPRequest $request)
  {
    $user = $this->verifSession();

    if($user) {
      $this->page->addVar('student', $user);
    }
    $this->page->addVar('title', 'Qui suis-je');
  }

  public function executeContact(HTTPRequest $request)
  {
    $user = $this->verifSession();

    $managerCaptcha = $this->managers->getManagerOf('Captcha'); 
    $errCaptcha = false;

    if ($request->method() == 'POST')
    {
	if($request->postData('valiIpt') && $managerCaptcha->haveCaptcha($request->postData('valiIpt'))){
		
		// delete used captcha
		$managerCaptcha->delete($request->postData('valiIpt')); 
		
	} else {
		// err wrong or no captcha
		$errCaptcha = true;
	}
	
	$contact = new Contact([
        'pseudo' => $request->postData('pseudo'),
        'email' => $request->postData('email'),
        'contenu' => $request->postData('contenu')
      	]);
    }
    else
    {
      $contact = new Contact;
    }

    if ($user) {
      $formBuilder = new ContactFormBuilder($contact, $user->csrf());
    } else {
      $csrf = '012345789';
      $formBuilder = new ContactFormBuilder($contact, $csrf);
    }

    $this->page->addVar('title', 'bienvenue a authentification sign Up');

    $formBuilder->build();

    $form = $formBuilder->form();
    
    $welcomeFormHandler = new WelcomeFormHandler($form, $this->managers->getManagerOf('Welcome'), $request);

  
    if (!$errCaptcha && $welcomeFormHandler->processMailContact($contact))
    {
      $this->app->user()->setFlash('Votre message a bien ete envoye, nous vous repondrons au plus vite. merci.');
      
      // $this->app->httpResponse()->redirect('/welcome/mailContact.php');

      // $this->app->httpResponse()->redirect('/');
    }    
    
    // delete overtime captcha (if have)
    $managerCaptcha->deleteCaptchaOverTime();

    $captcha = new Captcha();
    $captcha->setCaptcha();
    if($captcha_string = $captcha->getCaptcha()) { 
	    $managerCaptcha->add($captcha_string); 
    }

    if($user) {
      $this->page->addVar('student', $user);
    }
    $this->page->addVar('errCaptcha', $errCaptcha);
    $this->page->addVar('captchatext', $captcha_string);
    $this->page->addVar('Inscription', $contact);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Creation d\'un compte');

  }

  public function executeMailContact(HTTPRequest $request)
  {
    $this->page->addVar('title', 'mail contact');
  }

  public function executeError(HTTPRequest $request) 
  {
    $this->page->addVar('title', 'error');
  }

  public function executeAllFeedbacks(HTTPRequest $request) 
  {  

    $user = $this->verifSession();

    if($user) {
      $this->page->addVar('student', $user);
    }

    $nameCache = "/feedbacks/welcomePageAllFeed";

    $listFeedbacks = $this->cache->read($nameCache);
    
    if ($listFeedbacks === null)
    {
      $manager = $this->managers->getManagerOf('Feedback');
      $listFeedbacks = $manager->getFeedback( 0, 50);
    
      $this->cache->write($nameCache, $listFeedbacks, '2 months');
    }

    $this->page->addVar('listFeedbacks', $listFeedbacks);

    $this->page->addVar('title', 'Liste des commentaires');

  }

  public function getFeedbackHepler() 
  {  

    $nombreFeedback = $this->app->config()->get('nombre_feedback');
    $nombreCaracteres = $this->app->config()->get('nombre_caracteresFeedback');

    $manager = $this->managers->getManagerOf('Feedback');

    // set cache system v.newsController
    $listFeedbacks = $manager->getFeedback( 0, $nombreFeedback);

    foreach ($listFeedbacks as $feedback)
    {
      if (strlen($feedback->contenu()) > $nombreCaracteres)
      {
        $debut = substr($feedback->contenu(), 0, $nombreCaracteres);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';

        $feedback->setContenu($debut);
      }
    }

    // a retourner dans la page acceuil which will show it
    return $listFeedbacks;
    }
}
