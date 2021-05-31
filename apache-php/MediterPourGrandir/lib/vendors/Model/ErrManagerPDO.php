<?php
namespace Model;

use \OCFram\Manager;

class ErrManagerPDO extends Manager
{

	public function recordErr($err)
	{
		$q = $this->dao->prepare('INSERT INTO erreurs (id, message, recordTime) VALUES(null, :mess, now())');
		$q->BindValue(':mess', $err);
		$q->execute();
	}

}
