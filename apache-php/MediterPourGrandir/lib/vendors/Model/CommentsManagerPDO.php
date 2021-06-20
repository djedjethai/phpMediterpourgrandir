<?php
namespace Model;

use \Entity\Comment;

class CommentsManagerPDO extends CommentsManager
{
  protected function add(Comment $comment)
  {
    $q = $this->dao->prepare('INSERT INTO comments SET newsId = :news,  auteurComId = :auteurComId, contenu = :contenu, date = NOW()');
    
    $q->bindValue(':news', $comment->newsId(), \PDO::PARAM_INT);
    $q->bindValue(':auteurComId', $comment->auteurComId(), \PDO::PARAM_INT);
    $q->bindValue(':contenu', $comment->contenu());
    
    $q->execute();
    
    $comment->setId($this->dao->lastInsertId());


    $sql = $this->dao->prepare('UPDATE news JOIN comments ON news.id = comments.newsId SET news.nbrComments = news.nbrComments + 1 WHERE comments.id = :id');
    
    $sql->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
    $sql->execute();

  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM comments WHERE id = '.(int) $id);
	// $q = $this->dao->prepare('DELETE FROM comments WHERE id = :id');
	// 
    	// $q->bindValue(':id', $idint, \PDO::PARAM_INT);
    	// $q->execute();

    // substract one number of comments in news
      }

  public function decountNews($id){
    $idint = intval($id, 10);

    $sql = $this->dao->prepare('UPDATE news JOIN comments ON news.id = comments.newsId SET news.nbrComments = news.nbrComments - 1 WHERE comments.id = :id');
   var_dump($idint); 
    $sql->bindValue(':id', $idint, \PDO::PARAM_INT);
    $sql->execute();

    	var_dump('php is suuuuperrr sucks');

  }

  public function deleteFromNews($news)
  {
    $this->dao->exec('DELETE FROM comments WHERE newsId = '.(int) $news);
  }
  
  public function getListOf($news)
  {
    if (!ctype_digit($news))
    {
      throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
    }

    $q = $this->dao->prepare('SELECT comments.id, newsId, auteurComId, pseudo, picture, contenu, date FROM comments INNER JOIN students ON comments.auteurComId = students.id WHERE newsId = :news ORDER BY comments.id ASC');
    $q->bindValue(':news', $news, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
    
    $comments = $q->fetchAll();
    
    foreach ($comments as $comment)
    {
      $comment->setDate(new \DateTime($comment->date()));
    }
    
    return $comments;
  }

  protected function modify(Comment $comment)
  {
    $q = $this->dao->prepare('UPDATE comments SET contenu = :contenu WHERE id = :id');
    $q->bindValue(':contenu', $comment->contenu());
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
    
    $q->execute();
  }
  
  public function get($id)
  {
    $q = $this->dao->prepare('SELECT comments.id, newsId, auteurComId, pseudo, contenu, date FROM comments INNER JOIN students ON comments.auteurComId = students.id WHERE comments.id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
    
    return $q->fetch();
  }

  public function isNewsHaveComment($id)
  {
  	$exist = false;

  	$q = $this->dao->prepare('SELECT COUNT(*) FROM comments WHERE newsId = :id');
    
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    
    $q->execute();
    
    if (intval($q->fetchColumn()) > 0)
	  	{
	  		$exist = true;
	  	}

	return $exist;

  }

  public function getLastComment($newsId)
  {
    $q = $this->dao->prepare('SELECT comments.id, newsId, auteurComId, pseudo, picture, contenu, date FROM comments INNER JOIN students ON comments.auteurComId = students.id WHERE comments.id = (SELECT MAX(id) FROM comments WHERE newsId = :id)');
    $q->bindValue(':id', (int) $newsId, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
    
    return $q->fetch();
  }

}
