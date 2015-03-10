<?php

use Smce\Core\DI;
use Smce\Core\Loader;
use Smce\Core\Queue\QueueListen;

$di=new DI;

	
$di->bind("loader",function(){

    $loader=new Loader;

    $loader->setDir(array(
        dirname(__FILE__)."/queuemodel/",
    ));

    return $loader;
});

$loader=DI::resolve("loader");
$loader->register();

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

//Queue start
$listen->start();

