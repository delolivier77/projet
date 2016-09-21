<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\StudentModel;

class DefaultController extends Controller
{
	
	public function home()
	{
		$this->show('default/accueil');
	}

	public function testhome()
	{
		$studentModel = new StudentModel();

		$lastStudents = $studentModel->getLastStudents();

		$this->show('default/testhome', array('lastStudentsForView'=>$lastStudents));
	}


}


