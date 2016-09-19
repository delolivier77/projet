<?php

namespace Controller;

use \W\Controller\Controller;
use \Controller\RechercheController;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$rechercheController = new RechercheController();
		$rechercheResults = $rechercheController->generateRechercheResults();
		$this->show('default/home',array('matieres' => $rechercheResults[0], 'scolarites' => $rechercheResults[1]));
	}


	/**
	 * Page hello
	 */
	public function hello()
	{
		$this->show('default/hello', ['username' => 'Bruce Willis']);
	}

}