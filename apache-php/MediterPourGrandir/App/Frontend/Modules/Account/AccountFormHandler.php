<?php
namespace App\Frontend\Modules\Account;

use \OCFram\FormHandler;
use \OCFram\Hasher;

class AccountFormHandler extends FormHandler
{

	const PSEUDO_REPEAT = 'pseudoRepeat';
	const EMAIL_REPEAT = 'emailRepeat';
	const PASSWORD_INCORRECT = 'passwordIncorrect';
	const CONFIRM_NEW_PASSWORD_INCORRECT = 'confirmNewPasswordIncorrect';
	const VERIF_OK = 'verifOk';

  public function processStudentVerification($student) 
  {
    if($this->request->method() == 'POST' && $this->form->isValid())
    {

      if($this->manager->pseudoRepeat($student)){
        $verif = self::PSEUDO_REPEAT;
      }
      elseif($this->manager->emailRepeat($student)){
        $verif = self::EMAIL_REPEAT;
      }
      elseif(!$this->manager->verifOldMdp($student)){
        $verif = self::PASSWORD_INCORRECT;
      }
      else{
        $verif = self::VERIF_OK;
      }

      return $verif;

    }
    
    return false;       
  }

  public function processStudentModification($student, $user) 
  {

    if(!$student->pseudo()) 
    {
      $student->setPseudo($user->pseudo());
    }

    if(!$student->email()) 
    {
      $student->setEmail($user->email());
    }

    // path in container
    $imageDestination = "/var/www/html/Web/pictures";

    // if mofify picture, and already got one, we delete the old one
    if ($student->picture() && $student->newPicture())
    {
    	unlink($imageDestination. '/' .$student->picture());
    }
    
    // case of deleting picture. check in db if pic exist, if yes delete the image in folder.
    // this req will be execute on all user without picture
    if (!$student->picture())
    {
    	$imageExist = $this->manager->imageExist($student);
		  if ($imageExist) {
			 unlink($imageDestination. '/' .$imageExist);
		  }
    }
    $this->manager->modifyStudent($student);

  }

  public function processPasswordVerification($student) 
  {
    if($this->request->method() == 'POST' && $this->form->isValid())
    {

      if(!$this->manager->verifOldMdp($student)){ // a faire
        $verif = self::PASSWORD_INCORRECT;
      }
      elseif($student->newPassword() !== $student->confirmPassword()){ // a faire
        $verif = self::CONFIRM_NEW_PASSWORD_INCORRECT;
      }
      else 
      {
        $verif = self::VERIF_OK;
      }

      return $verif;

    }
    
    return false;       
  }

  public function processPasswordModification($student, $user) 
  {

    if(strlen($student->newPassword())) 
    {
      $passHash = new Hasher();
      $passHashed = $passHash->hash($student->newPassword());
      $student->setNewPassword($passHashed);
    } else {
      $student->setPassword($user->password());
    }

    $this->manager->modifyPassword($student);

  }
}
