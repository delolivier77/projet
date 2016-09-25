<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\MatiereModel;
use \Model\ScolariteModel;
use \Model\RechercheModel;

class RechercheController extends Controller
{

	public function recherche() {

		
		$rechercheResults = $this->generateRechercheResults();
		debug($rechercheResults);
		$this->show('recherche/recherche', ['matieres' => $rechercheResults[0], 'scolarites' => $rechercheResults[1]]);

	}

	public function generateRechercheResults() {
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

		return array($matieresjson, $scolaritesjson);
	}

	public function result() {
		/*debug($_POST);*/
		$matieremodel = new MatiereModel();
		$tabmat = array('nom' => $_POST['matiere']);
		$resultm = $matieremodel->findByName($tabmat);
		/*var_dump($resultm[0]['id_m']);*/
		$scolaritemodel = new ScolariteModel();
		$tabsco = array('nom' => $_POST['scolarite']);
		$results = $scolaritemodel->findByName($tabsco);
		/*var_dump($results[0]['id_s']);*/
		$recherchemodel = new RechercheModel();
		$finalresult = $recherchemodel-> searchResult($_POST['ville'], $resultm[0]['id_m'], $results[0]['id_s']);
		/*debug($finalresult);*/
		$rechercheResults = $this->generateRechercheResults();
		/*debug($rechercheResults);*/
		/*debug($finalresult);*/
		$this->show('searchresult/searchresult', ['ville' => $_POST['ville'], 'matiere' => $_POST['matiere'], 'scolarite' => $_POST['scolarite'], 'finalresultv' => $finalresult, 'matieres' => $rechercheResults[0], 'scolarites' => $rechercheResults[1]]);
	}
}
?>