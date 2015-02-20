<?php


class SiteController
{

	// http://localhost/injection/site/index

	public function actionIndex(CurPerson $person)
	{

		echo $person->getPersonName(). " ". $person->getPersonSurname();

	}


}