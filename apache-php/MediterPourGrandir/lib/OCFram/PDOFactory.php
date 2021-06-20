<?php
namespace OCFram;

use SecureEnvPHP\SecureEnvPHP;


class PDOFactory
{
  	public static function getMysqlConnexion()
  	{
	  	(new SecureEnvPHP())->parse('.env.enc', '.env.key');
		$user = getenv('DB_USER');
		$password = getenv('DB_PASSWORD');


		$db = new \PDO('mysql:host=mysql;port=3306;dbname=monsupersite;charset=utf8', $user, $password);
		
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    
    		return $db;
  	}
}
