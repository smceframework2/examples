<?php


use Smce\Core\EventManager;
use Smce\Sm;

$event=new EventManager;



$event->bind("config",function(){
	return array(
			"db"=>array(
				"db_user" 		=> 'root',
				"db_password" 	=> '123456',
				"db_dbname" 	=> 'dbname',
				"db_host"		=> 'localhost',
				"db_encoding" 	=> 'utf8',
			),

			"baseurl"=>dirname(__FILE__),

			"data1"=>"Hello",

		);
	
});

echo "<br>";

echo Sm::app()->baseurl;

echo "<br>";
echo "<br>";

echo Sm::app()->data1;

echo "<br>";
echo "<br>";

echo Sm::app()->db["db_user"];
echo "<br>";
echo Sm::app()->db["db_password"];
echo "<br>";
echo Sm::app()->db["db_dbname"];
echo "<br>";
echo Sm::app()->db["db_host"];
echo "<br>";
echo Sm::app()->db["db_encoding"];