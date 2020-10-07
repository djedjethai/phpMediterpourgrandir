<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Student;

class SessionManagerPDO extends Manager
{
	
	public function setSessionDb($userId, $csrfToken)
	{
		$requete = $this->dao->prepare('INSERT INTO sessions SET user_id = :id, csrfToken = :token, dateSet = NOW(), dateExpire = DATE_ADD(NOW(), INTERVAL 6 HOUR)');
	    $requete->bindValue(':id', (int) $userId, \PDO::PARAM_INT);
	    $requete->bindValue(':token', $csrfToken);
	    $requete->execute();

	    $requete = $this->dao->prepare('SELECT id FROM sessions WHERE user_id = :id');
    	$requete->bindValue(':id', (int) $userId, \PDO::PARAM_INT);
    	$requete->execute();

	    $idSession = $requete->fetch(\PDO::FETCH_ASSOC);

		return $idSession['id'];
	}

	public function validTimeSession($sessionId)
	{
		$q = $this->dao->prepare('SELECT TIMEDIFF(dateExpire, NOW()) FROM sessions WHERE id = :id');
	    $q->bindValue(':id', $sessionId, \PDO::PARAM_INT);
	    $q->execute();

	    $getTimeLeft = $q->fetch(\PDO::FETCH_NUM);

	    if($getTimeLeft[0] > 0)
	    {
	    	return true;
	    }

	    return false;
	}

	public function verifSessionDb($userId)
	{
		$exist = false;
		
		$q = $this->dao->prepare('SELECT COUNT(*) FROM sessions WHERE user_id = :id');
    
	    $q->bindValue(':id', (int) $userId, \PDO::PARAM_INT);
	    $q->execute();

	  	if ($q->fetchColumn() > 0)
	  	{
	  		$exist = true;
	  	}

	  	return $exist;
	}

	public function getUserFromSessionDb($sessionId)
	{
		$q = $this->dao->prepare('SELECT students.id, csrfToken as csrf, pseudo, email, dateSignUp, dateLastLesson, lesson, level, actif, picture FROM students INNER JOIN sessions ON students.id = sessions.user_id WHERE sessions.id = :id');

	    $q->bindValue(':id', (int) $sessionId, \PDO::PARAM_INT);
	    $q->execute();
	    
	    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Student');
	    
	    //return $q->fetch();
	    $student = $q->fetch();

	    $requete = $this->dao->prepare('SELECT COUNT(*) FROM notifications WHERE user_id = :userId AND status = 1');
	    $requete->bindValue(':userId', (int) $student->id(), \PDO::PARAM_INT);
	    $requete->execute();
	    $student->setMessage(intval($requete->fetchColumn()));

	    return $student;

	}

	public function deleteSessionDbFromSessionId($sessionId)
	{
		$this->dao->exec('DELETE FROM sessions WHERE id = '.(int) $sessionId);
	}

	public function deleteSessionDbFromUserId($userId)
	{
		$this->dao->exec('DELETE FROM sessions WHERE user_id = '.(int) $userId);
	}

}