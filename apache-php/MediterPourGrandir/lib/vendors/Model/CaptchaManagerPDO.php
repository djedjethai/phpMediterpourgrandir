<?php
namespace Model;

use \OCFram\Manager;
// use \Entity\Feedback;

class CaptchaManagerPDO extends Manager
{

  // protected $expiration = // expiration time 

  public function add($cptCode)
  {
     //we add the new captcha
      $requete = $this->dao->prepare('INSERT INTO captcha SET code = :captchaCode, quand = NOW()');
      $requete->bindValue(':captchaCode', $cptCode);
      $requete->execute();
  }
 
  public function haveCaptcha($cptCode) 
  {
    $exist = false;

    $q = $this->dao->prepare('SELECT COUNT(*) FROM captcha WHERE code = :captchaCode');
    
    $q->bindValue(':captchaCode', $cptCode);
    
    $q->execute();
    
    if (intval($q->fetchColumn()) > 0)
      {
        $exist = true;
      }

    return $exist;
  }

  // maybee useless as even i delete with no match, no err are returned ???
  public function getCaptchaOverTime()
  {
	$exist = false;

	$q = $this->dao->prepare('SELECT COUNT(*) FROM captcha WHERE quand > DATE_SUB(NOW(), INTERVAL 3 HOUR)');
	$q->execute();

	if (intval($q->fetchColumn()) > 0)
        {
        	$exist = true;
        }

        return $exist;
  }

  public function delete($cptCode)
  {
	  $q = $this->dao->prepare('DELETE FROM captcha WHERE code = :captchaCode');
    
	  $q->bindValue(':captchaCode', $cptCode);
	  $q->execute();

  }

  public function deleteCaptchaOverTime()
  {
    $this->dao->exec('DELETE FROM captcha WHERE quand > DATE_SUB(NOW(), INTERVAL 3 HOUR)');
  }
}
