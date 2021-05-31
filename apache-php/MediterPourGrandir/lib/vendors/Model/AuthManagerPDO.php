<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Student;

class AuthManagerPDO extends Manager
{
	
	//sgnUp method
	public function isAvailablePseudo($pseudo){} 
	public function isUniqueEmail(){}


	//signIn method
	public function existStudent(Student $student)
	{
		$exist = false;
		
		$q = $this->dao->prepare('SELECT password FROM students WHERE email = :email AND actif = 1');
    
	    $q->bindValue(':email', $student->email());
	    $q->execute();

	  	$passHash = $q->fetch(\PDO::FETCH_ASSOC);

	  	if (isset($passHash['password']) 
	  		&& $passHash['password'] 
	  		&& password_verify($student->password(), $passHash['password']))
	  	{
	  		$exist = true;
	  	}

	  	return $exist;
	}

	public function getStudent(Student $student)
	{
	    $q = $this->dao->prepare('SELECT id, pseudo, email, dateSignUp, dateLastLesson, lesson, level, actif  FROM students WHERE email = :email');
	    $q->bindValue(':email', $student->email());
	    $q->execute();
	    
	    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Student');
	    
	    return $q->fetch();
	}

	public function emailRepeat($student)
	{
		$exist = false;

		$q = $this->dao->prepare('SELECT COUNT(*) FROM students WHERE email = :email');
    
	    $q->bindValue(':email', $student->email());
	    $q->execute();

	   	if (intval($q->fetchColumn()) > 0)
	  	{
	  		$exist = true;
	  	}

	  	return $exist;
	}

	public function pseudoRepeat($student)
	{
		$exist = false;

		$q = $this->dao->prepare('SELECT COUNT(*) FROM students WHERE pseudo = :pseudo');
    
	    $q->bindValue(':pseudo', $student->pseudo());
	    $q->execute();

	   	if (intval($q->fetchColumn()) > 0)
	  	{
	  		$exist = true;
	  	}

	  	return $exist;
	}

	public function registerStudent(Student $student, $cle)
	{
		$requete = $this->dao->prepare('INSERT INTO students SET pseudo = :pseudo, password = :password, email = :email, dateSignUp = NOW(), cle = :cle, lesson = 1, level = 0');
	    
	    $requete->bindValue(':pseudo', $student->pseudo());
	    $requete->bindValue(':email', $student->email());
	    $requete->bindValue(':password', $student->password());
	    $requete->bindValue(':cle', (int) $cle, \PDO::PARAM_INT);
	    
	    $requete->execute();
	}


	public function confStudent($id, $key)
	{
		$exist = false;

		$q = $this->dao->prepare('SELECT COUNT(*) FROM students WHERE id = :id AND cle = :cle');
    
	    $q->bindValue(':id', (int)$id, \PDO::PARAM_INT);
	    $q->bindValue(':cle', (int)$key, \PDO::PARAM_INT);
	    $q->execute();

	   	if ($q->fetchColumn() > 0)
	  	{
	  		$exist = true;
	  	}

	  	return $exist;
	}

	public function confRegistration($id, $key)
	{
		$q = $this->dao->prepare('UPDATE students SET actif = 1 WHERE id = :id AND cle = :cle');
	    
	    $q->bindValue(':id', (int)$id, \PDO::PARAM_INT);
	    $q->bindValue(':cle', (int)$key, \PDO::PARAM_INT);
	    
	    $q->execute();
	}

	public function getNewStudent($id, $key)
	{
	    $q = $this->dao->prepare('SELECT id, pseudo, email, dateSignUp, dateLastLesson, lesson, level, actif  FROM students WHERE id = :id AND cle = :cle');

	    $q->bindValue(':id', (int)$id, \PDO::PARAM_INT);
	    $q->bindValue(':cle', (int)$key, \PDO::PARAM_INT);
	    $q->execute();
	    
	    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Student');
	    
	    return $q->fetch();
	}

	public function isStudent($student)
	{
	    $exist = false;

	    $q = $this->dao->prepare('SELECT COUNT(*) FROM students WHERE email = :email AND pseudo = :pseudo');
    
	    $q->bindValue(':pseudo', $student->pseudo());
	    $q->bindValue(':email', $student->email());
	    $q->execute();

	   	if ($q->fetchColumn() > 0)
	  	{
	  		$exist = true;
	  	}

	  	return $exist;
	}

	public function registerNewPassword($student, $pass)
	{
		$requete = $this->dao->prepare('UPDATE students SET password = :password WHERE email = :email AND pseudo = :pseudo');
	    
	    $requete->bindValue(':pseudo', $student->pseudo());
	    $requete->bindValue(':email', $student->email());
	    $requete->bindValue(':password', $pass);
	    
	    $requete->execute();
	}
	

	//sera dans StudentManager
	public function modifyPseudoStudent(){}

	public function modifyEmailStudent(){}

	public function modifyPasswordStudent(){}
	
}
