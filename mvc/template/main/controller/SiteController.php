<?php

use Smce\Core\DI;

class SiteController
{


	public function __construct()
	{

		$this->setTemplate();
		$this->setContent();

	}

	private function setTemplate()
	{

		DI::bind("template",function(){
		    $template = new Smce\Mvc\Template;
		    $template->setLayoutDirectory(dirname(__FILE__)."/../view/layouts");
		    $template->setViewDirectory(dirname(__FILE__)."/../view");
		    $template->setLayout("column1");
		    return $template;
		});


	}

	private function render($view, $arr=array())
	{

		$template=DI::resolve("template");
		$template->setView($view, $arr);
		$template->run();

	}

	private function setContent()
	{

		DI::bind("layout",function(){
		    $layout = new Smce\Mvc\Layout;
		    $layout->setContentDirectory(dirname(__FILE__)."/../view/layouts");
		    return $layout;
		});
	
	}

	public static function renderContent($view, $arr=array())
	{

		$layout=DI::resolve("layout");
		$layout->setContent($view, $arr);
		$layout->run();

	}




	// http://localhost/helloworld/index.php?route=/site/index

	public function actionIndex()
	{

		$msg="Hello World";

		$this->render("site/index",array(
			"msg"=>$msg,
		));

	}


}