<?php
namespace OCFram;

// use \OCFram\Csrf;

class Session
{
  // protected $csrfToken;
  protected $managerSession = null;

  public function __construct($managerSession)
  {
    $this->managerSession = $managerSession;
  }

  public function isValidSession($sessionId)
  {
    $isValidTimeSession = $this->managerSession->validTimeSession($sessionId); // return true if valid

    if($isValidTimeSession && isset($isValidTimeSession))
    {
      return $this->managerSession->getUserFromSessionDb($sessionId);
    }
  }

  public function deleteSessionDb($sessionId)
  {
    $this->managerSession->deleteSessionDbFromSessionId($sessionId);
  }

  public function signInSetSession($studentId, $token)
  {

    if($this->managerSession->verifSessionDb($studentId))
      {
      	$this->setSession('csrfToken', $token); 
        $this->managerSession->deleteSessionDbFromUserId($studentId);
        $sessionId = $this->managerSession->setSessionDb($studentId, $token);
        
      }
      else
      {
      	$this->setSession('csrfToken', $token); 
        $sessionId = $this->managerSession->setSessionDb($studentId, $token);
      }

    return $sessionId;
  }

  public function setSessionUser($userId, $token)
  {
  	$this->setSession('csrfToken', $token); 
    return $this->managerSession->setSessionDb($userId, $token);
  }

  public function setSession($name, $data) 
  {
  	$_SESSION[$name] = $data;
  }

  public function getSession($name) 
  {
  	return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
  }

  public function killSession($name) 
  {
  	unset($_SESSION[$name]);
  }
}