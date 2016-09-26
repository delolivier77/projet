<?php
namespace Controller;

use \W\Controller\Controller;
use \Controller\userController;
use \Model\RechercheModel;
use \Model\ScolariteModel;
use \Model\ConnaissanceModel;
use \Model\CommentaireModel;

class DetailsetudiantController extends Controller
{
		public function details($id) {

		$detailsetudiantModel = new RechercheModel();
		$etudiant = $detailsetudiantModel->searchResultById($id);
	    /*debug($etudiant);*/
		/*$newConnaissance = new ConnaissanceModel();
        $connaissance = $newConnaissance->find($id);                
		$newScolariteMin = new ScolariteModel();
		$scolarite_min = $newScolariteMin->search(['id_s' => $connaissance['id_s_min']]);
		$newScolariteMax = new ScolariteModel();
		$scolarite_max = $newScolariteMax->search(['id_s' => $connaissance['id_s_max']]);*/

		$newCommentaire = new CommentaireModel();
		$commentaire = $newCommentaire->findComs($id);
		/*debug($commentaire);*/
		/*$avg = $newCommentaire->avgNoteEtudiant($_SESSION['user']['id_u']);*/
		$this->show('Detailsetudiant/Detailsetudiant', ['etudiant' => $etudiant[0], 'commentaire' => $commentaire/*, 'connaissance' => $connaissance, 'scolarite_min' => $scolarite_min, 'scolarite_max' => $scolarite_max*//*, 'avg' => $avg, 'commentaire' =>$commentaite*/]);
		
	}


}