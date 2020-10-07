<?php
namespace Model;

use \Entity\News;

class NewsManagerPDO extends NewsManager
{
  protected function add(News $news)
  {

    // A VOIR, SI POSSIBLE DE FAIRE LES 3 MANIP EN UNE SEULE REQ......??????????
    //we add the new news
    $requete = $this->dao->prepare('INSERT INTO news SET auteurId = :id, titre = :titre, contenu = :contenu, dateAjout = NOW(), dateModif = NOW(), levelNew = :levelNew');
    $requete->bindValue(':id', $news->auteurId());
    $requete->bindValue(':titre', $news->titre());
    $requete->bindValue(':contenu', $news->contenu());
    $requete->bindValue(':levelNew', $news->levelNew());
    $requete->execute();

    //we get id of the new news
    $requete = $this->dao->prepare('SELECT id FROM news WHERE auteurId = :id AND  titre = :titre AND contenu = :contenu');
    $requete->bindValue(':id', $news->auteurId());
    $requete->bindValue(':titre', $news->titre());
    $requete->bindValue(':contenu', $news->contenu());
    $requete->execute();
    $newsId = $requete->fetch(\PDO::FETCH_NUM);

    //we register this news in the notification
    $requete = $this->dao->prepare('INSERT INTO notifications SET news_id = :newsId, user_id = :userId, status = 0');
    $requete->bindValue(':newsId', $newsId[0]);
    $requete->bindValue(':userId', $news->auteurId());
    $requete->execute();

  }

  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM news')->fetchColumn();
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM news WHERE id = '.(int) $id);
  }

  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT news.id, students.pseudo, picture, titre, contenu, dateAjout, dateModif FROM news JOIN students ON news.auteurId = students.id ORDER BY id DESC';
    
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
    
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\News');
    
    $listeNews = $requete->fetchAll();

    //echo '<pre>';
    //print_r($listeNews);
    
    foreach ($listeNews as $news)
    {
      $news->setDateAjout(new \DateTime($news->dateAjout()));
      $news->setDateModif(new \DateTime($news->dateModif()));
    }
    
    $requete->closeCursor();
    
    return $listeNews;
  }
  
  public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT news.id, auteurId, picture, students.pseudo, titre, contenu, dateAjout, dateModif FROM news JOIN students ON news.auteurId = students.id WHERE news.id = :id');

    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
    
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\News');
    
    if ($news = $requete->fetch())
    {
      $news->setDateAjout(new \DateTime($news->dateAjout()));
      $news->setDateModif(new \DateTime($news->dateModif()));
      
      return $news;
    }
    
    return null;
  }

  protected function modify(News $news)
  {
    $requete = $this->dao->prepare('UPDATE news SET titre = :titre, contenu = :contenu, dateModif = NOW() WHERE id = :id');
    
    $requete->bindValue(':titre', $news->titre());
    $requete->bindValue(':contenu', $news->contenu());
    $requete->bindValue(':id', $news->id(), \PDO::PARAM_INT);
    
    $requete->execute();
  }
}