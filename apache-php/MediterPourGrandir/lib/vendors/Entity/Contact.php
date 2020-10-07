<?php
namespace Entity;

use \OCFram\Entity;

class Contact extends Entity
{
  protected $pseudo,
            $email,
            $contenu;

  const PSEUDO_INVALIDE = 1;
  const EMAIL_INVALIDE = 2;
  const CONTENU_INVALIDE = 3;

  public function isValid()
  {
    return !(empty($this->pseudo) || empty($this->email) || empty($this->contenu));
  }


  // SETTERS //

  public function setPseudo($pseudo)
  {
    if (!is_string($pseudo) || empty($pseudo))
    {
      $this->erreurs[] = self::PSEUDO_INVALIDE;
    }

    $this->pseudo = $pseudo;
  }

  public function setEmail($email)
  {
    if (!is_string($email) || empty($email))
    {
      $this->erreurs[] = self::EMAIL_INVALIDE;
    }

    $this->email = $email;
  }

  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }

    $this->contenu = $contenu;
  }

  
  // GETTERS //

  public function pseudo()
  {
    return $this->pseudo;
  }

  public function email()
  {
    return $this->email;
  }

  public function contenu()
  {
    return $this->contenu;
  }
}