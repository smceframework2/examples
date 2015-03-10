<?php

use Smce\Core\DI;
use Smce\Core\Queue\QueueListen;

$di=new DI;

$di->bind("memcache",function(){
	    $memcache=new Smce\Driver\Memcache;
	    $memcache->setConfig(array(
	        "host"=>"127.0.0.1",
		    "port"=>"11211"
	    ));
	    $memcache->connect();
	    return $memcache;

	});

//new Queue
$listen=new QueueListen(DI::resolve("memcache"),"queue1");


echo json_encode($listen->status());
echo "<br>";
echo "<br>";

if(!empty($listen->getLastTransactionTime()))
{

	echo "Process Time:". date("Y-m-d H:i:s",$listen->getLastTransactionTime());
}

echo "<br>";
echo "<br>";
echo "<pre>";
print_r($listen->getAll());
