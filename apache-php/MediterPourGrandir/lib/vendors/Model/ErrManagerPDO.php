<?php
namespace Model;

use \OCFram\Manager;
//use \OCFram\Lesson;
//use \OCFram\Student;

class ErrManagerPDO extends Manager
{

	public function recordErr($err)
	{
		$q = $this->dao->prepare('INSERT INTO erreurs (id, message, recordTime) VALUES(null, :mess, now())');
		$q->BindValue(':mess', $err);
		$q->execute();
	}

}