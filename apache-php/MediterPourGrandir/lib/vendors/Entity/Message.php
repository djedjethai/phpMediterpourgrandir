<?php
namespace Entity;

use \OCFram\Entity;

class Message extends Entity
{
  protected $idNotify,
            $idNews,
            $title,
            $auteur,
            $dateAjout,
            $status;   

  // SETTERS //

  public function setIdNotify($idNotify)
  {
    $this->idNotify = $idNotify;
  }

  public function setIdNews($idNews)
  {
    $this->idNews = $idNews;
  }

  public function setTitleNews($title)
  {
    $this->title = $title;
  }

  public function setAuteurNews($auteur)
  {
    $this->auteur = $auteur;
  }

  public function setDateAjout(\DateTime $dateAjout)
  {
    $this->dateAjout = $dateAjout;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }
  
  // GETTERS //
  public function idNotify()
  {
    return $this->idNotify;
  }

  public function idNews()
  {
    return $this->idNews;
  }

  public function titleNews()
  {
    return $this->title;
  }

  public function auteurNews()
  {
    return $this->auteur;
  }

  public function dateAjout()
  {
    return $this->dateAjout;
  }

  public function status()
  {
    return $this->status;
  }

  
}