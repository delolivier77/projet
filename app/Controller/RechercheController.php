<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\MatiereModel;
use \Model\ScolariteModel;

class RechercheController extends Controller
{

	/**
	 * Fonction qui affiche la Liste des films
	*/
	public function recherche() {

		$matieremodel = new MatiereModel();
		$scolaritemodel = new ScolariteModel();
		$recherchesm = $matieremodel->findAllNames();
		$recherchess = $scolaritemodel ->findAllNames();

		/* 
		RecherchesM = array(
			array('nom'=>'Maths'),	
			array('nom' => 'Anglais')
			...
		)
		*/
		$recherchesmformat = array();


		foreach ($recherchesm as $recherche){
			/*
			$RecherchesFormat = array(
				'Maths'
			)
			*/
			$recherchesmformat[]=$recherche['nom'];
		}

		/*
			Ici, recherche RecherchesFormat = array(
				"Maths",
				"Anglais",
				....
			)
		*/
		$matieresjson = json_encode($recherchesmformat);

		/*
			$RecherchesJson = "[
				'Maths',
				'Anglais',
				...
			]"
		*/

		/* 
		RecherchesM = array(
			array('nom'=>'Maths'),	
			array('nom' => 'Anglais')
			...
		)
		*/
		$recherchessformat = array();


		foreach ($recherchess as $recherche){
			/*
			$RecherchesFormat = array(
				'Maths'
			)
			*/
			$recherchessformat[]=$recherche['nom'];
		}

		/*
			Ici, recherche RecherchesFormat = array(
				"Maths",
				"Anglais",
				....
			)
		*/
		$scolaritesjson = json_encode($recherchessformat);

		/*
			$RecherchesJson = "[
				'Maths',
				'Anglais',
				...
			]"
		*/
		$this->show('recherche/recherche', ['matieres' => $matieresjson, 'scolarites' => $scolaritesjson]);	


		

	}
	public function result() {
		debug($_POST);
		$matieremodel = new MatiereModel();
		$tabmat = array('nom' => $_POST['matiere']);
		$resultm = $matieremodel->findByName($tabmat);
		var_dump($resultm[0]['id_m']);



	}


}
?>