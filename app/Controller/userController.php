<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \Model\MatiereModel;
use \Model\ScolariteModel;
use \Model\EtudiantModel;
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


		if(empty($_POST['civilite']) || empty($_POST['date_naissance']) || empty($_POST['photo']) || empty($_POST['nom_etudiant']) || empty($_POST['adresse']) || empty($_POST['cp']) || empty($_POST['ville']) || empty($_POST['tel']) || empty($_POST['detail_dispo']) || empty($_POST['description']) || empty($_POST['detail_dispo']) || empty($_POST['description']) || empty($_POST['niveau_etude']) || empty($_POST['tarif']) || empty($_POST['type_rdv']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['niveau_etude']) || empty($_POST['email']) || empty($_POST['mdp']) || empty($_POST['statut']) || empty($_POST['role']) || empty($_POST['date_inscription']))
		{
			
		}


		$userTable = new UsersModel();
		$etudiantTable = new EtudiantModel();
		$auth = new AuthentificationModel();
		$actif = 'actif';
		$role = 'etudiant';


		$newEtudiant = array('civilite' => $_POST['civilite'], 'date_naissance' => $_POST['date_naissance'], 'photo' => $_POST['photo'], 'num_etudiant' => $_POST['num_etudiant'], 'adresse' => $_POST['adresse'], 'cp' => $_POST['cp'], 'ville' => $_POST['ville'], 'tel' => $_POST['tel'], 'detail_dispo' => $_POST['detail_dispo'], 'description' => $_POST['description'], 'niveau_etude' => $_POST['niveau_etude'], 'tarif' => $_POST['tarif'], 'type_rdv' => $_POST['type_rdv']);

		debug($newEtudiant);
		$etudiantTable->setPrimaryKey('id_et');
		$etudiantTable->insert($newEtudiant);

		$id_etudiant = $etudiantTable->lastInsertId();
		debug($id_etudiant);


		// $newUser = array('id_et' => $id_etudiant, 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $_POST['email'], 'mdp' => $_POST['mdp'], 'statut' => $actif, 'role' => $role, 'date_inscription' => date("Y-m-d H:i:s"));
		$newUser = array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $_POST['email'], 'mdp' => $_POST['mdp'], 'statut' => $actif, 'role' => $role, 'date_inscription' => date("Y-m-d H:i:s"));
		
		debug($newUser);
		$userTable->setPrimaryKey('id_u');
		$userTable->insert($newUser);
		
		
	}
}


?>