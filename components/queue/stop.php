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
$listen=new QueueListen($di->resolve("memcache"),"queue1");


//Queue stop
$listen->stop();
