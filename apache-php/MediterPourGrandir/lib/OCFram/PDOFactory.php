<?php
namespace OCFram;

// use SecureEnvPHP\SecureEnvPHP;


class PDOFactory
{
  	public static function getMysqlConnexion()
  	{
	  	// (new SecureEnvPHP())->parse('.env.enc', '.env.key');
		$user = getenv('MYSQL_USER');
		$password = getenv('MYSQL_PASSWORD');

		
		var_dump($user);

		$db = new \PDO('mysql:host=mysql;port=3306;dbname=monsupersite;charset=utf8', $user, $password);
		
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    
    		return $db;
  	}
}
