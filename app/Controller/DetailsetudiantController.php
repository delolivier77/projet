<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\RechercheModel;
use \Model\ScolariteModel;
use \Model\ConnaissanceModel;

class DetailsetudiantController extends Controller
{
		public function details($id) {

		$detailsetudiantModel = new RechercheModel();
		$etudiant = $detailsetudiantModel->searchResultById($id);
	    // var_dump($etudiant);
		/*$connaissances = new ConnaissanceModel();
		$connaissance = $connaissances->connaissance($id_u);

	    $newscolaritemin = new ScolariteModel();
		$scolarite_min = $newscolaritemin->search(['id_s' => $connaissance['id_s_min']]);

		$newscolaritemax = new ScolariteModel();
		$scolarite_max = $newscolaritemax->search(['id_s' => $connaissance['id_s_max']]);
		debug($connaissance);*/
		$this->show('Detailsetudiant/Detailsetudiant', ['etudiant' => $etudiant[0]/*, 'newscolaritemin' => $newscolaritemin, 'newscolaritemax' => $newscolaritemax*/]);

		
	}

}