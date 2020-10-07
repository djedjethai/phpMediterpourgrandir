<?php
namespace Entity;

use \OCFram\Entity;

class Notification extends Entity
{
  protected $id;
  protected $newsId;
  protected $userId;
  protected $userEmail;
  protected $status;

  
  public function setId($id)
  {
    $this->id = $id;
  }

  public function setNewsId($newsId)
  {
    $this->newsId = $newsId;
  }

  public function setUserId($userId)
  {
    $this->userId = $userId;
  }

  public function setUserEmail($userEmail)
  {
    $this->userEmail = $userEmail;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  

  public function id()
  {
    return $this->id;
  }

  public function newsId()
  {
    return $this->newsId;
  }

  public function userId()
  {
    return $this->userId;
  }

  public function userEmail()
  {
    return $this->userEmail;
  }

  public function status()
  {
    return $this->status;
  }

}