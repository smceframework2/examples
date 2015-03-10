<?php


use Smce\Core\DI;
use Smce\Core\Loader;
use Smce\Core\Queue;

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

$queue=new Queue(DI::resolve("memcache"));

//bind register

$queue->bind("queue1","process1",function(){
							
	$foo=new Foo;
	$foo->name="Soo";
	return $foo;

})->register(Queue::MAX);

//addMinutes - After 10 min

/*
$queue->bind("queue1","process1",function(){
							
	$foo=new Foo;
	$foo->name="Soo";
	return $foo;

})->addMinutes(10)->register(Queue::MAX);

 */