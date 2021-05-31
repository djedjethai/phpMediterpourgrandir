<?php
namespace OCFram;

use \OCFram\User;
use \OCFram\Session;

class ValidUserSession
{
  protected $sessionId;
  protected $user;

  public function __construct($user, $session)
  {
    $this->sessionId = $user->getUser();
    $this->user = $session->isValidSession($sessionId);
    $this->isValid();
  }

  public function isValid() 
  {
    if(!$this->user)
    {
      $this->user->deconnexionUser();
      return;
    }
    return $user;
  }
  
}
