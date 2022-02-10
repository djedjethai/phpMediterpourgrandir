<?php
namespace OCFram;

class PDOFactory
{
  	public static function getMysqlConnexion()
  	{
		$user = rtrim(file_get_contents(getenv('MYSQL_USER')));
		$password = rtrim(file_get_contents(getenv('MYSQL_PASSWORD')));

		$db = new \PDO('mysql:host=mysql;port=3306;dbname=monsupersite;charset=utf8', $user, $password);
		
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    
    		return $db;
  	}
}
