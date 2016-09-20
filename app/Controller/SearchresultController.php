<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\MatiereModel;
use \Model\ScolariteModel;
use \Model\RechercheModel;

class SearchresultController extends Controller
{
	public function recherche() {

		
		$rechercheResults = $this->generateRechercheResults();
		/*
			$RecherchesJson = "[
				'Maths',
				'Anglais',
				...
			]"
		*/
		$this->show('searchresult/searchresult', ['matieres' => $rechercheResults[0], 'scolarites' => $rechercheResults[1]]);	

	}