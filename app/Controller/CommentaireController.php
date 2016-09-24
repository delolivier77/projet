<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\CommentaireModel;
use \Controller\BaseController;


class CommentaireController extends BaseController
{

	public function deleteCommentaire($id)
	{

		$commentaireTable = new CommentaireModel();
		$commentaireTable->delete($id);
		$this->getFlashMessenger() -> success('Le commentaire à été supprimé', null, true);
		$this->redirectToRoute('user_profil_particulier');

	}


	public function formCommentaire($id)
	{
		$commentaireTable = new CommentaireModel();
		$commentaire = $commentaireTable->findCommentsById($id);
		
		$this->show('commentaire/form_commentaire', ['commentaire' => $commentaire]);
	}


	public function updateCommentaire()
	{
		$commentaireTable = new CommentaireModel();
		$newCommentaire = array('note' => $_POST['note'], 'commentaire' => $_POST['commentaire']);
	
		$commentaireTable->update($newCommentaire, $_POST['id_co']);

		$this->getFlashMessenger() -> success('Le commentaire a été mis à jour', null, true);
		$this->redirectToRoute('user_profil_particulier');
	}

}