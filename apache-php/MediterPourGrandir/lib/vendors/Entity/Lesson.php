<?php
namespace Entity;

use \OCFram\Entity;

class Lesson extends Entity
{
  protected $id,
            $chapterNumber,
            $lessonNumber,
            $chapter,
            $title,
            $lesson,
            $videoLink;
          

  // SETTERS //

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setChapterNumber($chapterNumber)
  {
    $this->chapterNumber = $chapterNumber;
  }

  public function setLessonNumber($lessonNumber)
  {
    $this->lessonNumber = $lessonNumber;
  }

  public function setChapter($chapter)
  {
    $this->chapter = $chapter;
  }

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function setLesson($lesson)
  {
    $this->lesson = $lesson;
  }

  public function setVideoLink($videoLink)
  {
    $this->videoLink = $videoLink;
  }

  
  // GETTERS //

  public function id()
  {
    return $this->id;
  }

  public function chapterNumber()
  {
    return $this->chapterNumber;
  }

  public function lessonNumber()
  {
    return $this->lessonNumber;
  }

  public function chapter()
  {
    return $this->chapter;
  }

  public function title()
  {
    return $this->title;
  }

  public function lesson()
  {
    return $this->lesson;
  }

  public function videoLink()
  {
    return $this->videoLink;
  }

  
}