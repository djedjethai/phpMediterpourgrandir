<?php
namespace OCFram;

class Csrf
{
	public function setToken() 
	{
		$token = bin2hex(random_bytes(32));
		return $token;
	}
}