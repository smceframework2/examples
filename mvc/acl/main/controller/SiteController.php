<?php


class SiteController
{
	
	public function  __construct()
	{

		$event=Smce\Core\DI::resolve("EventManager");

		$event->bind("acl",function(){

			$acl= new Smce\Mvc\Acl;
			$acl->setRule(array(
	                'actions'=>array('index','page'), // Actions. is array
	                'users'=>'@',  // Only * or @ values ​​are
	                'redirect'=>"site/login",
	                'expression'=>true,    //True is allowed only. Only TRUE or FALSE values ​​are.
	                //'ip'=>array('127.0.0.1'), //IP is allowed only. is array
            ));

            $acl->setRule(array(
	                'actions'=>array('about'), // Actions. is array
	                'users'=>'*',  // Only * or @ values ​​are
	                'redirect'=>"site/login",
	                'expression'=>true,    //True is allowed only. Only TRUE or FALSE values ​​are.
	                //'ip'=>array('127.0.0.1'), //IP is allowed only. is array
            ));
            
            $acl->run();
		});

	}

	// http://localhost/acl/site/index

	public function actionIndex()
	{

		echo "Hello world";

	}

	// http://localhost/acl/site/page
	public function actionPage()
	{

		echo "Page";

	}

	// http://localhost/acl/site/about
	public function actionAbout()
	{

		echo "About";

	}

	// http://localhost/acl/site/login

	public function actionLogin()
	{

		echo "Login Page";

	}


}