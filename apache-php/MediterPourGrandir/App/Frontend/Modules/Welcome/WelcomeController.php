<?php
namespace App\Frontend\Modules\Welcome;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Contact;
use \FormBuilder\ContactFormBuilder;
use \App\Frontend\Modules\Welcome\WelcomeFormHandler;
use \OCFram\MyException;

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

    // $listFeedbacks = $this->cache->read($nameCache);
    $listFeedbacks = null;
    if ($listFeedbacks === null)
    {
      $manager =  $this->managers->getManagerOf('Feedback');
      // $listFeedbacks = $manager->getFeedback(0, 3);
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

    //$this->page->addVar('title', 'Me contacter');
    if ($request->method() == 'POST')
    {
      
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

  
    if ($welcomeFormHandler->processMailContact($contact))
    {
      $this->app->user()->setFlash('Votre message a bien ete envoye, nous vous repondrons au plus vite. merci.');
      
      // $this->app->httpResponse()->redirect('/welcome/mailContact.php');

      // $this->app->httpResponse()->redirect('/');
    }
    
    // my catpcha try ==============================
  
    // generate captcha to validate contact-form 
    $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  
    function secure_generate_string($input, $strength = 5, $secure = true) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            if($secure) {
                $random_character = $input[random_int(0, $input_length - 1)];
            } else {
                $random_character = $input[mt_rand(0, $input_length - 1)];
            }
            $random_string .= $random_character;
        }
      
        return $random_string;
    }
     
    $string_length = 6;
    $captcha_string = secure_generate_string($permitted_chars, $string_length);
    
    
       
    if($user) {
      $this->page->addVar('student', $user);
    }
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
