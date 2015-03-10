<?php

$di=new Smce\Core\DI;

$di->bind("loader",function(){

    $loader=new Smce\Core\Loader;

    $loader->setDir(array(
        dirname(__FILE__)."/main/controller/",
    ));

    return $loader;
});





$loader=Smce\Core\DI::resolve("loader");
$loader->register();




$di->bind("router",function(){

    $router = new Smce\Mvc\Router;
    $router->setDefaultController('site');
    $router->setDefaultAction('index');
    $router->handle();

    return $router;
});





try{

	$smce=new Smce\Core\SmceFramework;
	$smce->make();
     


}catch(Smce\Http\HttpException $e){


    echo $e->getHttpCode(). " - ".$e->getMsg();

}
