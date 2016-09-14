<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\RechercheModel;

class RechercheController extends Controller
{

	/**
	 * Fonction qui affiche la Liste des films
	*/
	public function recherche() {

		$RechercheModel = new RechercheModel();
		$RecherchesM = $RechercheModel->findAllMatieres();
		/* 
		RecherchesM = array(
			array('nom'=>'Maths'),
			array('nom' => 'Anglais')
			...
		)
		*/
		$RecherchesFormat = array();

		foreach ($RecherchesM as $Recherche){
			/*
			$RecherchesFormat = array(
				'Maths'
			)
			*/
			$RecherchesFormat[]=$Recherche['nom'];
		}
		/*
			Ici, recherche RecherchesFormat = array(
				"Maths",
				"Anglais",
				....
			)
		*/
		$RecherchesJson = json_encode($RecherchesFormat);

		/*
			$RecherchesJson = "[
				'Maths',
				'Anglais',
				...
			]"
		*/

		$this->show('recherche/recherche', ['matieres' => $RecherchesJson]);	
		

	}

	public function showMatiere() {


		$this->show('recherche/recherche');
	}
}
?>