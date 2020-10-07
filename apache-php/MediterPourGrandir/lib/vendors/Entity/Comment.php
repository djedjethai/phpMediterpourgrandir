<?php
namespace Entity;

use \OCFram\Entity;
use \OCFram\SplSubject;
use \OCFram\SplObserver;


class Comment extends Entity implements SplSubject
{
  protected $id,
            $newsId,
            $auteurComId,
            $pseudo,
            $picture,
            $contenu,
            $date,
            $observers = [];

  const AUTEUR_INVALIDE = 1;
  const CONTENU_INVALIDE = 2;

  public function attach(SplObserver $observer)
  {
    $this->observers[] = $observer;
    return $this;
  }

  public function detach(SplObserver $observer)
  {
    if(is_int($key = array_search($observer, $this->observers, true)))
      unset($this->observers[$key]);
  }

  public function notify($userId) 
  {
    foreach ($this->observers as $observer) {
      $observer->update($this, $userId);
    }
  }

  public function isValid()
  {
    return !(empty($this->contenu));
  }

  public function setId($id)
  {
    $this->id = (int) $id;
  }

  public function setNewsId($news)
  {
    $this->newsId = (int) $news;
  }

  public function setPicture($picture)
  {
    $this->picture = $picture;
  }

  public function setAuteurComId($auteurComId)
  {
    $this->auteurComId = (int) $auteurComId;
  }

  public function setPseudo($pseudo)
  {
    if (!is_string($pseudo) || empty($pseudo))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
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

  public function setDate(\DateTime $date)
  {
    $this->date = $date;
  }

  public function id()
  {
    return $this->id;
  }

  public function newsId()
  {
    return $this->newsId;
  }

  public function picture()
  {
    return $this->picture;
  }

  public function auteurComId()
  {
    return $this->auteurComId;
  }

  public function pseudo()
  {
    return $this->pseudo;
  }

  public function contenu()
  {
    return $this->contenu;
  }

  public function date()
  {
    return $this->date;
  }
}