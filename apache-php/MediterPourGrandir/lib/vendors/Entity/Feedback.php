<?php
namespace Entity;

use \OCFram\Entity;


class Feedback extends Entity
{
  protected $id,
            $studentId,
	    $picture,
            $pseudo,
            $contenu,
            $grade,
            $datePost;
            
  const CONTENU_INVALIDE = 1;
  
  public function isValid()
  {
    return !(empty($this->contenu));
  }

  public function setStudentId($id)
  {
    $this->studentId = (int) $id;
  }

  public function setPseudo($pseudo)
  {
    if (!is_string($pseudo) || empty($pseudo))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }

    $this->pseudo = $pseudo;
  }

  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }

    $this->contenu = $contenu;
  }

  public function setGrade($grade)
  {
    if (!is_int($grade) || empty($grade))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }

    $this->grade = $grade;
  }
  
  public function setPicture($picture)
  {
    $this->picture = $picture;
  }

  public function setDatePost(\DateTime $datePost)
  {
    $this->datePost = $datePost;
  }

  public function id()
  {
    return $this->id;
  }

  public function studentId()
  {
    return $this->studentId;
  }

  public function pseudo()
  {
    return $this->pseudo;
  }

  public function contenu()
  {
    return $this->contenu;
  }

  public function grade()
  {
    return $this->grade;
  }

  public function picture()
  {
    return $this->picture;
  }

  public function datePost()
  {
    return $this->datePost;
  }
}
