<?php
namespace Controller;

use \W\Controller\Controller;
use \Controller\RechercheController;
use \Model\EtudiantModel;

class DefaultController extends Controller
{
	/**
	* Page d'accueil par défaut
	*/
	public function home()
	{
		// $rechercheController = new RechercheController();
		// $rechercheResults = $rechercheController -> generateRechercheResults();
		$etudiant = new EtudiantModel();
		$lastStudents = $etudiant->getLastStudents();
		
		// $this->show('default/home',array('matieres' => $rechercheResults[0], 'scolarites' => $rechercheResults[1], 'lastStudentsForView'=>$lastStudents));


		$this -> show('default/home', array('lastStudentsForView' => $lastStudents));
	}

	/**
	* Page de contact
	*/
	public function contact()
	{
		$this->show('default/contact');
	}

	/**
	* Page des conditions générales d'utilisation
	*/
	public function cgu()
	{
		$this->show('default/cgu');
	}
}