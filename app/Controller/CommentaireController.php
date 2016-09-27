<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\CommentaireModel;
use \Controller\BaseController;


class CommentaireController extends BaseController
{

	// suppression d'un commentaire par le particulier
	public function deleteCommentaire($id)
	{

		$commentaireTable = new CommentaireModel();
		$commentaireTable->delete($id);
		$this->getFlashMessenger() -> success('Le commentaire à été supprimé', null, true);
		$this->redirectToRoute('user_profil_particulier');

	}

	// recuperation d'un commentaire par son ID puis envoie de celui dans le formulaire de modification
	public function formCommentaire($id)
	{
		$commentaireTable = new CommentaireModel();
		$commentaire = $commentaireTable->findCommentsById($id);
		
		$this->show('commentaire/form_commentaire', ['commentaire' => $commentaire]);
	}

	// mise a jour d'un commentaire modifié par le particulier
	public function updateCommentaire()
	{
		$commentaireTable = new CommentaireModel();
		$newCommentaire = array('note' => $_POST['note'], 'commentaire' => $_POST['commentaire']);
	
		$commentaireTable->update($newCommentaire, $_POST['id_co']);

		$this->getFlashMessenger() -> success('Le commentaire a été mis à jour', null, true);
		$this->redirectToRoute('user_profil_particulier');
	}

	
	/**
	* Permet de faire une requête complexe
	* @param $sql Requête a effectué
	* */
	public function query($sql)
	{
		$sth = $this->dbh->prepare($sql);

		if(!$sth->execute()){
		return false;
		}

		return $sth->fetchAll(); 
	}


	public function addCom()
	{
			
		$addcom = new CommentaireModel();
		
		$addcommentaire = array(

			'id_p' => $_SESSION['user']['id_u'], 
			'commentaire' => $_POST['commentaire'], 
			'id_et' => $_GET['id_et'],
			'date_commentaire' => date('Y-m-d h:i:s')

			);
		$newCommentaire = $addcom->insert($addcommentaire);
		$this->show('addcom/addcom', ['comm'=>$newCommentaire]);
		}

}