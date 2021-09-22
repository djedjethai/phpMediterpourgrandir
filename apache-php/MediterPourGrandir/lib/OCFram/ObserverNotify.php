<?php
namespace OCFram;

use \OCFram\Mailer;
use \OCFram\SplObserver;
use \Entity\Notification;

class ObserverNotify implements SplObserver
{
  protected $managerNotif;
  protected $users;
  
  public function __construct($managerNotif) {
   
    $this->managerNotif = $managerNotif;
  }

  public function update(SplSubject $comment, $userId) {
   

    // get all user we need to notify 
    // exept the userId who is the comment writer and except user with status = 1 
    // (as they already got a mail from prcedent answer but didn t open it yet)
    $this->users = $this->managerNotif->getUsersToNotify($comment->newsId(), $userId);
    
    $users = $this->users;
    
    //update their status to 1 (when user open acces to the chat status back to 0)
    foreach ($users as $user) 
    {  
      $this->managerNotif->updateStatus($user);
    }

    //if author comment is already in notify for this comment, or news 
    if ($this->managerNotif->isUserNotifiy($comment)) 
    {
      //we set his status back to 0 (for this comment of course)
      //like this no need to add him again, and if following comment he will still be notify.
      $this->managerNotif->updateNotification($comment);
    } 
    else 
    {
      //in case he is not register (add a news, or add first comment), then we register him.
      $this->managerNotif->insertNewNotification($comment);
    }

    if ($this->users) {

      $newsArr = $this->managerNotif->getNewsInfoForMail($comment->newsId());
      // make q query to get comments datas (like the title) and pass it in the mail
     
      $this->sendMailNotification($newsArr[0]);
    }
    
  }

  public function sendMailNotification($news) {

    $users = $this->users;

    foreach ($users as $user) {
      if ($user) 
      {
        Mailer::sendMailNotify($user, $news); 
      }    
    }
  }
  
}
