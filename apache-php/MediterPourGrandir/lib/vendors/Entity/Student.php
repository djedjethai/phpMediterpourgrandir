<?php
namespace Entity;

use \OCFram\Entity;

class Student extends Entity
{
  protected $id,
            $pseudo,
            $password,
            $confirmPassword,
            $email,
            $dateSignUp,
            $dateLastLesson,
            $lesson,
            $level,
            $actif,
            $message,
            $picture,
            $csrf;

  const PSEUDO_INVALIDE = 1;
  const EMAIL_INVALIDE = 2;
  const PASSWORD_INVALIDE = 3;

  public function isValid()
  {
    return !(empty($this->pseudo) || empty($this->email) || empty($this->password));
  }


  // SETTERS //
  public function setId($id)
  {
    $this->id = $id;
  }

  public function setPseudo($pseudo)
  {
    $this->pseudo = $pseudo;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function setConfirmPassword($password)
  {
    $this->confirmPassword = $password;
  }

  public function setDateSignUp(\DateTime $dateSignUp)
  {
    $this->dateSignUp = $dateSignUp;
  }

  public function setDateLastLesson(\DateTime $dateLastLesson)
  {
    $this->dateLastLesson = $dateLastLesson;
  }

  public function setLesson($lesson)
  {
    $this->lesson = $lesson;
  }

  public function setLevel($level)
  {
    $this->level = $level;
  }

  public function setMessage($nbrMessage)
  {
    $this->message = $nbrMessage;
  }

  public function setPicture($picture)
  {
    $this->picture = $picture;
  }

  public function setCsrf($csrf)
  {
    $this->csrf = $csrf;
  }


  // GETTERS //

  public function id()
  {
    return $this->id;
  }

  public function pseudo()
  {
    return $this->pseudo;
  }

  public function email()
  {
    return $this->email;
  }

  public function password()
  {
    return $this->password;
  }

  public function confirmPassword()
  {
    return $this->confirmPassword;
  }

  public function dateSignUp()
  {
    return $this->dateSignUp;
  }

  public function dateLastLesson()
  {
    return $this->dateLastLesson;
  }

  public function lesson()
  {
    return $this->lesson;
  }

  public function level()
  {
    return $this->level;
  }

  public function actif()
  {
    return $this->actif;
  }

  public function message()
  {
    return $this->message;
  }

  public function picture()
  {
    return $this->picture;
  }

  public function csrf()
  {
    return $this->csrf;
  }
}
