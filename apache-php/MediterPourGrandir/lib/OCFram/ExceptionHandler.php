<?php
namespace OCFram;

use \OCFram\FileWriter;
use \OCFram\DBWriter;
use \OCFram\TextFormater;


class ExceptionHandler {

	
	public static function errorLoggerFileNoRedirection($error, $fileName) 
	{
		$fileWriter = new FileWriter(new TextFormater, $fileName);
		$fileWriter->write($error);

		echo $error;
		
		// no redirection as we end in an infinite loop in case the err come from the routing
    	die();
	}
	
	public static function errorLoggerFile($error, $fileName) 
	{
		$fileWriter = new FileWriter(new TextFormater, $fileName);
		$fileWriter->write($error);

		echo $error;

		// then redirect si necessaire, sur une page special pour, par exemple......
      	// header("Location: http://mediterpourgrandir/welcome/error.php");
    	die();
	}


	public static function errorLoggerDb($error, $manager) 
	{
		$DBWriter = new DBWriter(new TextFormater, $manager);
		$DBWriter->write($error);

		echo $error;

		// then redirect si necessaire, sur une page special pour, par exemple......
      	// header("Location: http://mediterpourgrandir/welcome/error.php");
    	die();
	}
}