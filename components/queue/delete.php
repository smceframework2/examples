<?php


use Smce\Core\DI;
use Smce\Core\Queue;

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

$queue=new Queue(DI::resolve("memcache"));

$queue->removeQue("queue1");
