<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Notification;
use \Entity\News;

class NotificationManagerPDO extends Manager
{
	public function getUsersToNotify($newsId, $userId) {
		
		$q = $this->dao->prepare('SELECT notifications.id, news_id as newsId, user_id as userId, email as userEmail, status FROM notifications LEFT JOIN students ON user_id = students.id WHERE news_id = :newsId AND user_id != :userId AND status = 0');
		//AND status = 0

    	$q->bindValue(':newsId', (int) $newsId, \PDO::PARAM_INT);
    	$q->bindValue(':userId', (int) $userId, \PDO::PARAM_INT);


    	$q->execute();

    	$q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Notification');
    
    	return $q->fetchAll();

    	//$q->closeCursor();//a ajouter partout !!!!

    }

    public function isUserNotifiy($comment) {

    	$exist = false;

		$q = $this->dao->prepare('SELECT COUNT(*) FROM notifications WHERE user_id = :userId AND news_id = :newsId');
    	$q->bindValue(':newsId', $comment->newsId(), \PDO::PARAM_INT);
	    $q->bindValue(':userId', $comment->auteurComId(), \PDO::PARAM_INT);
	    $q->execute();

	   	if (intval($q->fetchColumn()) > 0)
	  	{
	  		$exist = true;
	  	}

	  	return $exist;
    }

    public function updateNotification($comment) {

    	$q = $this->dao->prepare('UPDATE notifications SET status = 0 WHERE user_id = :userId AND news_id = :newsId');
	    $q->bindValue(':newsId', $comment->newsId(), \PDO::PARAM_INT);
	    $q->bindValue(':userId', $comment->auteurComId(), \PDO::PARAM_INT);
	    
	    $q->execute();
    }

	public function updateStatus($user) {

		$q = $this->dao->prepare('UPDATE notifications SET status = 1, history = 1 WHERE user_id = :userId AND news_id = :newsId');
		$q->bindValue(':newsId', $user->newsId(), \PDO::PARAM_INT);
	    $q->bindValue(':userId', $user->userId(), \PDO::PARAM_INT);
	    
	    $q->execute();	
	}

  
  	public function insertNewNotification($comment) {

  		$q = $this->dao->prepare('INSERT INTO notifications SET news_id = :newsId,  user_id = :userId, status = 0');
	    $q->bindValue(':newsId', $comment->newsId(), \PDO::PARAM_INT);
	    $q->bindValue(':userId', $comment->auteurComId(), \PDO::PARAM_INT);
	    
	    $q->execute();
  	}

  	public function getNewsInfoForMail($newsId)
  	{
  		
  		$q = $this->dao->prepare('SELECT titre FROM news WHERE id = :newsId');

  		$q->bindValue(':newsId', $newsId, \PDO::PARAM_INT);
  		$q->execute();

  		$q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\News');
  		
		$news = $q->fetchAll();

		return $news;
  	}

}



