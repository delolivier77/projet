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
		
		
		$message = "";
		$actif = 'actif';
		$role = 'etudiant';

		$userTable = new UsersModel();
		$etudiantTable = new EtudiantModel();
		$auth = new AuthentificationModel();
		$matiereModel = new MatiereModel();
		$matiere = $matiereModel->findAllMatiere();
		$scolariteModel = new ScolariteModel();
		$scolarite = $scolariteModel->findAllScolarite();
		

		if(empty($_POST['photo']) || empty($_POST['civilite']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mdp']) || empty($_POST['date_naissance']) || empty($_POST['tel']) || empty($_POST['adresse']) || empty($_POST['cp']) || empty($_POST['ville']) || empty($_POST['niveau_etude']) || empty($_POST['num_etudiant']) || empty($_POST['matiere']) || empty($_POST['classe_debut']) || empty($_POST['classe_fin']) || empty($_POST['description']) || empty($_POST['description']) || empty($_POST['type_rdv']) || empty($_POST['tarif']))
		{
			$message .= "Tous les champs sont obligatoires <br>";
			// $this->show('user/inscription_etudiant', ['matiere' => $matiere, 'scolarite' => $scolarite]);
		}


		if (!empty($_POST['email']) && $userTable->emailExists($_POST['email']))
		{
			$message .= "L'émail est déjà utilisé ! Veuillez en saisir un nouveau <br>";
		}
		else if(!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
		{
			$message .= "L'émail est invalide ! Veuillez en saisir un nouveau <br>";
		}	


		if (!empty($_POST['cp']) && !preg_match("#^[0-9]{5}$#", $_POST['cp']))
		{
			$message .= "Le code postal est incorrect !<br>";
		}	

		if (!empty($_POST['tel']) && !preg_match("#^0[1-9][0-9]{8}$#", $_POST['tel']))
		{
			$message .= "Le numéro de téléphone est incorrect !<br>";
		}	

		if (!empty($_POST['date_naissance']) && !preg_match("#^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4}))$#", $_POST['date_naissance']))
		{
			$message .= "La date de naissance est incorrect !<br>";
		}	


		debug ($message);

		if (empty($message))
		{

			$email = htmlentities($_POST['email']);
			$mdp = $auth->hashPassword($_POST['mdp']);
			$date_naissance = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date_naissance'])));

			$newEtudiant = array('civilite' => $_POST['civilite'], 'date_naissance' => $date_naissance, 'photo' => $_POST['photo'], 'num_etudiant' => $_POST['num_etudiant'], 'adresse' => $_POST['adresse'], 'cp' => $_POST['cp'], 'ville' => $_POST['ville'], 'tel' => $_POST['tel'], 'detail_dispo' => $_POST['detail_dispo'], 'description' => $_POST['description'], 'niveau_etude' => $_POST['niveau_etude'], 'tarif' => $_POST['tarif'], 'type_rdv' => $_POST['type_rdv']);
	
			debug($newEtudiant);
			$etudiantTable->setPrimaryKey('id_et');
			$etudiantTable->insert($newEtudiant);

			$id_etudiant = $etudiantTable->lastInsertId();
			debug($id_etudiant);

			$newUser = array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $email, 'mdp' => $mdp, 'statut' => $actif, 'role' => $role, 'date_inscription' => date("Y-m-d H:i:s"));
				
			debug($newUser);
			$userTable->setPrimaryKey('id_u');
			$userTable->insert($newUser);

		}

	
		
	}
}


?>