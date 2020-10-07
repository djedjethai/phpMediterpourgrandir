<?php
namespace OCFram;

session_start();

class User
{
  public function getAttribute($attr)
  {
    return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
  }

  public function getFlash()
  {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);

    return $flash;
  }

  public function hasFlash()
  {
    return isset($_SESSION['flash']);
  }

  public function isAuthenticated()
  {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
  }

  public function setAttribute($attr, $value)
  {
    $_SESSION[$attr] = $value;
  }

  public function setAuthenticated($authenticated = true)
  {
    if (!is_bool($authenticated))
    {
      throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAuthenticated() doit être un boolean');
    }

    $_SESSION['auth'] = $authenticated;
  }

  public function setFlash($value)
  {
    $_SESSION['flash'] = $value;
  }

  public function setUser($user)
  {
  	$_SESSION['user'] = $user;
  	//$userSer = serialize($user);
  	//$_SESSION['user'] = $userSer;
  }

  public function getUser()
  {
  	if(isset($_SESSION['user']) && $_SESSION['user'])
  	{  	
  	  	//$userSer = $_SESSION['user'];
  	    //$user = unserialize($userSer);
  	    return $_SESSION['user'];
  	}
  }

  public function isUser()
  {
  	$user = $this->getUser();

  	if($user)
  	{
  		return true;
  	}
  	return false;
  }

  public function deconnexionUser()
  {
  	$_SESSION['user'] = array();

	// Si vous voulez détruire complètement la session, effacez également
	// le cookie de session.
	// Note : cela détruira la session et pas seulement les données de session !
	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}

	// Finalement, on détruit la session.
	session_destroy();
  }
}