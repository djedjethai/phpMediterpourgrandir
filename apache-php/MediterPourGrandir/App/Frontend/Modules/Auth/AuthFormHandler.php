<?php
namespace App\Frontend\Modules\Auth;

use \OCFram\FormHandler;
use \OCFram\Hasher;
use \OCFram\Mailer; 
use \OCFram\KeyGenerator;

class AuthFormHandler extends FormHandler
{
 
 public function processAuth($student)
  {
    if($this->request->method() == 'POST' && $this->form->isValid())
    {

      if(!$student->pseudo() && $this->manager->existStudent($student))
	    {
	      return 'exist';
	    }

	  return 'unknow';
	}

	return false;

    
  }

  public function processRegistration($student)
  {
  	if($this->request->method() == 'POST' && $this->form->isValid())
    {

      $feedBack = '';

    	if($this->manager->emailRepeat($student)){
    		$feedBack = 'emailRepeat';
        return $feedBack;
    	}
    	if($this->manager->pseudoRepeat($student)){
    		$feedBack = 'pseudoRepeat';
        return $feedBack;
    	}
      if($student->password() !== $student->confirmPassword()){
        $feedBack = 'passwordUnmatch';
        return $feedBack;
      }

        $genKey = new KeyGenerator;
        $key = $genKey->generateKey(15);

        $passHash = new Hasher();
        $passHashed = $passHash->hash($student->password());
        $student->setPassword($passHashed);

        $this->manager->registerStudent($student, $key);

        $studentPreRegister = $this->manager->getStudent($student);

        Mailer::sendMailAuth($studentPreRegister, $key);

        $feedBack = 'register';
        return $feedBack;

    }
    
	return false;				
  }

  public function processForgetPassword($student)
  {
  	if($this->request->method() == 'POST' && $this->form->isValid())
    {
        //verif student
        $isStudent = $this->manager->isStudent($student);

        if($isStudent)
        {
        	//generate new password
	        $genKey = new KeyGenerator;
	        $key = $genKey->generateKey(7);

          $passHash = new Hasher();
          $pass = $passHash->hash($key);
	    	
	    	//register new password in bdd
	        $this->manager->registerNewPassword($student, $pass);

	        //send mail with new password
        	Mailer::sendMailPassword($student, $key);
        	return true;
        }
        return false;
    }
	return false;	
  }
  
}
