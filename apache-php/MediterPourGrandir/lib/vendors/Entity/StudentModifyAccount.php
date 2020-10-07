<?php
namespace Entity;

// use \OCFram\Entity;
use \Entity\Student;

class StudentModifyAccount extends Student
{
  protected $newPassword,
            $newPicture,
            $dateModify;

  const PSEUDO_INVALIDE = 1;
  const EMAIL_INVALIDE = 2;
  const PASSWORD_INVALIDE = 3;


  public function isValid()
  {
    return true; // a voir......
  }


  // SETTERS //

  public function setNewPassword($password)
  {
    $this->newPassword = $password;
  }

  public function setNewPicture($picture)
  {
    $this->newPicture = $picture;
  }

  public function setDateModify(\DateTime $dateModify)
  {
    $this->dateModify = $dateModify;
  }


  // GETTERS //

  public function newPassword()
  {
    return $this->newPassword;
  }

  public function newPicture()
  {
    return $this->newPicture;
  }

  public function dateModify()
  {
    return $this->dateModify;
  }

}
  