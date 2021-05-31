<?php
namespace Entity;

use \OCFram\Entity;

class News extends Entity
{
  protected $auteurId,
            $pseudo,
            $titre,
            $picture,
            $contenu,
            $levelNew,
            $dateAjout,
            $dateModif;

  const AUTEUR_INVALIDE = 1;
  const TITRE_INVALIDE = 2;
  const CONTENU_INVALIDE = 3;

  public function isValid()
  {
    return !(empty($this->titre) || empty($this->contenu));
  }


  // SETTERS //
  public function setAuteurId($id)
  {

    $this->auteurId = $id;
  }

  public function setPicture($picture)
  {

    $this->picture = $picture;
  }

  public function setPseudo($pseudo)
  {
    if (!is_string($auteur) || empty($auteur))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }

    $this->pseudo = $pseudo;
  }

  public function setTitre($titre)
  {
    if (!is_string($titre) || empty($titre))
    {
      $this->erreurs[] = self::TITRE_INVALIDE;
    }

    $this->titre = $titre;
  }

  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }

    $this->contenu = $contenu;
  }

  public function setLevelNew($level)
  {
    $this->levelNew = $level;
  }

  public function setDateAjout(\DateTime $dateAjout)
  {
    $this->dateAjout = $dateAjout;
  }

  public function setDateModif(\DateTime $dateModif)
  {
    $this->dateModif = $dateModif;
  }

  // GETTERS //
  public function auteurId()
  {
    return $this->auteurId;
  }

  public function picture()
  {
    return $this->picture;
  }

  public function pseudo()
  {
    return $this->pseudo;
  }

  public function titre()
  {
    return $this->titre;
  }

  public function contenu()
  {
    return $this->contenu;
  }

  public function levelNew()
  {
    return $this->levelNew;
  }

  public function dateAjout()
  {
    return $this->dateAjout;
  }

  public function dateModif()
  {
    return $this->dateModif;
  }
}
