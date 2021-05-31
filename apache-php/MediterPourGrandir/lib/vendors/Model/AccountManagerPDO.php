<?php
namespace Model;

use \OCFram\Manager;

class AccountManagerPDO extends Manager
{

	public function getMessages($idStudent) 
	{
		$q = $this->dao->prepare('SELECT notifications.id as idNotify, news.id as idNews, titre as title, dateAjout, status  FROM notifications JOIN news ON notifications.news_id = news.id WHERE user_id = :idStudent AND (status = 1 OR history = 1)');
	    $q->bindValue(':idStudent', (int) $idStudent, \PDO::PARAM_INT);
	    $q->execute();
	    
	    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Message');
	    
	    return $q->fetchAll();  
	}

	public function MessageUpdateNotification($id) {

    	$q = $this->dao->prepare('UPDATE notifications SET status = 0 WHERE id = :Id');
	    $q->bindValue(':Id', $id, \PDO::PARAM_INT);
	    
	    $q->execute();
    }

    public function pseudoRepeat($student)
	{
		$exist = false;

		$q = $this->dao->prepare('SELECT COUNT(*) FROM students WHERE pseudo = :pseudo AND id != :id');
    
	    $q->bindValue(':id', $student->id());
	    $q->bindValue(':pseudo', $student->pseudo());
	    $q->execute();

	   	if (intval($q->fetchColumn()) > 0)
	  	{
	  		
	  		$exist = true;
	  	}

	  	return $exist;
	}

	public function emailRepeat($student)
	{
		$exist = false;

		$q = $this->dao->prepare('SELECT COUNT(*) FROM students WHERE email = :email AND id != :id');
    
	    $q->bindValue(':id', $student->id());
	    $q->bindValue(':email', $student->email());
	    $q->execute();

	   	if (intval($q->fetchColumn()) > 0)
	  	{
	  		$exist = true;
	  	}

	  	return $exist;
	}

	public function verifOldMdp($student)
	{
		$exist = false;
		
		$q = $this->dao->prepare('SELECT password FROM students WHERE id = :id');
    
	    $q->bindValue(':id', (int)$student->id(), \PDO::PARAM_INT);
	    $q->execute();

	  	$passHash = $q->fetch(\PDO::FETCH_ASSOC);

	  	if (password_verify($student->password(), $passHash['password']))
	  	{
	  		$exist = true;
	  	}

	  	return $exist;
	}


	public function modifyStudent($student)
	{
		
    	if ($student->newPicture())
    	{
	    $q = $this->dao->prepare('UPDATE students SET pseudo = :pseudo, email = :email, picture = :picture WHERE id = :id');
	    $q->bindValue(':pseudo', $student->pseudo());
	    $q->bindValue(':email', $student->email());
	    $q->bindValue(':picture', $student->newPicture());
	    $q->bindValue(':id', $student->id(), \PDO::PARAM_INT);
		}
	    else 
	    {
	    $q = $this->dao->prepare('UPDATE students SET pseudo = :pseudo, email = :email, picture = :picture WHERE id = :id');
	    $q->bindValue(':pseudo', $student->pseudo());
	    $q->bindValue(':email', $student->email());
	    $q->bindValue(':picture', $student->picture());
	    $q->bindValue(':id', $student->id(), \PDO::PARAM_INT);
	    }
	    $q->execute();
	}

	public function modifyPassword($student)
	{
	    $q = $this->dao->prepare('UPDATE students SET password = :password WHERE id = :id');
	    $q->bindValue(':password', $student->newPassword());
	    $q->bindValue(':id', $student->id(), \PDO::PARAM_INT);
	    
	    $q->execute();
	}

	public function imageExist($student)
	{
		$q = $this->dao->prepare('SELECT picture FROM students WHERE id = :id');
    
	    $q->bindValue(':id', (int)$student->id(), \PDO::PARAM_INT);
	    $q->execute();

	    $picture = $q->fetch(\PDO::FETCH_ASSOC);
	    return $picture['picture'];
	}

}
