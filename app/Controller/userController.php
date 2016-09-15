<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \Model\MatiereModel;
use \Model\ScolariteModel;
use \W\Security\AuthentificationModel;


class UserController extends Controller
{


	public function inscriptionEtudiant()
	{
		$matiereModel = new MatiereModel();
		$matiere = $matiereModel->findAllMatiere();
		$scolariteModel = new ScolariteModel();
		$scolarite = $scolariteModel->findAllScolarite();
		$this->show('user/inscription_etudiant', ['matiere' => $matiere, 'scolarite' => $scolarite]);
	}

	public function addUserEtudiant()
	{
		// $userTable = new UsersModel();
		// $auth = new AuthentificationModel();
		// if ($userTable->usernameExists($_POST['username'])){
		// 	$auth->setFlash("Le login existe déjà", "error" );
		// 	$this->redirectToRoute('user_register_form');
		// }else if ($userTable->emailExists($_POST['email'])){
		// 	$auth->setFlash("L'émail existe déjà", "error");
		// 	$this->redirectToRoute('user_register_form');
		// }else{
		// 	$newUser = array('username' => htmlentities($_POST['username']),'password' => $auth->hashPassword($_POST['password']),'email' => $_POST['email']);
		// 	$userTable->insert($newUser);
		// 	$auth->setFlash("Votre inscription est validée", "success");
		// 	$this->redirectToRoute('movie_index');
		// }

		$userTable = new UsersModel();
		$auth = new AuthentificationModel();
		$actif = 'actif';
		$role = 'etudiant';

		$newUser = array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $_POST['email'], 'mdp' => $_POST['mdp'], 'statut' => $actif, 'role' => $role, 'date_inscription' => date("Y-m-d H:i:s"));
		
		debug($newUser);
		$userTable->insert($newUser);
		


		
	}
}


?>