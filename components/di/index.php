<?php

use Smce\Core\DI;

$di=new DI;

//bind foo
$di->bind("foo",function(){
	$foo=new Foo;
	$foo->name="samed ceylan";
	return $foo;
});

//bind foo2
DI::bind("foo2",function(){
	$foo=new Foo;
	$foo->name="soo coo";
	return $foo;
});

//resolve foo
$foo=$di->resolve("foo");
echo $foo->getName();

echo "<br><br>";

//resolve foo2
$foo2=$di->resolve("foo2");
echo $foo2->getName();

echo "<br><br>";

//resolve foo2
$foo2=DI::resolve("foo2");
echo $foo2->getName();

class Foo
{

	public $name;

	public function getName()
	{
		return $this->name;
	}
}