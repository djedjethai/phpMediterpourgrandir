<?php
namespace OCFram;

class Hasher{

	public function hash($password)
	{
		$passHash = password_hash($password, PASSWORD_DEFAULT);
		return $passHash;
	}
}
