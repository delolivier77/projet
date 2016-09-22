<?php

namespace Controller;

use \W\Controller\Controller;
use \Controller\RechercheController;
use \Model\StudentModel;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$rechercheController = new RechercheController();
		$rechercheResults = $rechercheController->generateRechercheResults();
		$studentModel = new StudentModel();
		$lastStudents = $studentModel->getLastStudents();
		$this->show('default/home',array('matieres' => $rechercheResults[0], 'scolarites' => $rechercheResults[1], 'lastStudentsForView'=>$lastStudents));
	}



	/**
	 * Page hello
	 */
	public function hello()
	{
		$this->show('default/hello', ['username' => 'Bruce Willis']);
	}

}