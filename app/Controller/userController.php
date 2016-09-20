<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \Model\MatiereModel;
use \Model\ScolariteModel;
use \Model\EtudiantModel;
use \Model\ParticulierModel;
use \Model\EnfantModel;
use \W\Security\AuthentificationModel;


class UserController extends Controller
{


	public function inscriptionEtudiant()
	{
		$matiereModel = new MatiereModel();
		$matiere = $matiereModel->findAllMatiere();
		$scolariteModel = new ScolariteModel();
		$scolarite = $scolariteModel->findAllScolarite();
		$this->show('user/inscription_etudiant', ['matiere_list' => $matiere, 'scolarite_list' => $scolarite]);
	}


	public function addUserEtudiant()
	{
		
		
		$message = "";
		$actif = 'actif';
		
		$userTable = new UsersModel();
		$etudiantTable = new EtudiantModel();
		$auth = new AuthentificationModel();
		$matiereModel = new MatiereModel();
		$matiere = $matiereModel->findAllMatiere();
		$scolariteModel = new ScolariteModel();
		$scolarite = $scolariteModel->findAllScolarite();
		




		if(empty($_POST['civilite']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mdp']) || empty($_POST['date_naissance']) || empty($_POST['tel']) || empty($_POST['adresse']) || empty($_POST['cp']) || empty($_POST['ville']) || empty($_POST['niveau_etude']) || empty($_POST['num_etudiant']) || empty($_POST['matiere']) || empty($_POST['classe_debut']) || empty($_POST['classe_fin']) || empty($_POST['description']) || empty($_POST['description']) || empty($_POST['type_rdv']) || empty($_POST['tarif']))
		{
			$message = "Tous les champs sont obligatoires <br>";
		}


		if (empty($_FILES['photo']['name']))
		{
			$message .= "Une photo doit être inserée";
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

		if (!empty($_POST['tarif']) && !preg_match("#^[0-9]+[,]?[0-9]*$#", $_POST['tarif']))
		{
			$message .= "Le tarif est incorrect !<br>";
		}	

		
		if (empty($message))
		{
			
			$email = htmlentities($_POST['email']);
			$mdp = $auth->hashPassword($_POST['mdp']);
			$date_naissance = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date_naissance'])));
			$tarif = str_replace(",", ".", $_POST['tarif']);


			$newUser = array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $email, 'mdp' => $mdp, 'statut' => $actif, 'date_inscription' => date("Y-m-d H:i:s"));
				
			debug($newUser);
			$id_user = $userTable->insert($newUser);
			debug($id_user['id_u']);

			$newEtudiant = array('id_et' => $id_user['id_u'],'photo' => $_FILES['photo']['name'], 'civilite' => $_POST['civilite'], 'date_naissance' => $date_naissance, 'num_etudiant' => $_POST['num_etudiant'], 'adresse' => $_POST['adresse'], 'cp' => $_POST['cp'], 'ville' => $_POST['ville'], 'tel' => $_POST['tel'], 'detail_dispo' => $_POST['detail_dispo'], 'description' => $_POST['description'], 'niveau_etude' => $_POST['niveau_etude'], 'tarif' => $tarif, 'type_rdv' => $_POST['type_rdv']);
	
			debug($newEtudiant);
			$etudiantTable->insert($newEtudiant);

			

			// $this->redirectToRoute('user_inscription_etudiant');
			
		}
		else
		{
			$this->show('user/inscription_etudiant', ['matiere_list' => $matiere, 'scolarite_list' => $scolarite, 'message' => $message]);
		}
		
	}




	public function inscriptionParticulier()
	{
		$matiereModel = new MatiereModel();
		$matiere = $matiereModel->findAllMatiere();
		$scolariteModel = new ScolariteModel();
		$scolarite = $scolariteModel->findAllScolarite();
		$this->show('user/inscription_particulier', ['scolarite_list' => $scolarite]);
	}


	public function addUserParticulier()
	{
		
		
		$message = "";
		$actif = 'actif';
		$role = 'particulier';

		$userTable = new UsersModel();
		$particulierTable = new ParticulierModel();
		$enfantTable = new EnfantModel();
		$auth = new AuthentificationModel();
		$scolariteModel = new ScolariteModel();
		$scolarite = $scolariteModel->findAllScolarite();
		

		if(empty($_POST['civilite']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mdp']) || empty($_POST['mdp']) || empty($_POST['adresse']) || empty($_POST['cp']) || empty($_POST['ville']) || empty($_POST['prenom_enfant']) || empty($_POST['date_naissance']) || empty($_POST['classe']))
		{
			$message = "Tous les champs sont obligatoires <br>";
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

			
		if (empty($message))
		{
			
			$email = htmlentities($_POST['email']);
			$mdp = $auth->hashPassword($_POST['mdp']);
			$date_naissance = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date_naissance'])));
			




			$newUser = array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $email, 'mdp' => $mdp, 'statut' => $actif , 'date_inscription' => date("Y-m-d H:i:s"));
				
			debug($newUser);
			$id_user = $userTable->insert($newUser);
			debug($id_user['id_u']);


			$newParticulier = array('id_p' => $id_user['id_u'], 'civilite' => $_POST['civilite'], 'adresse' => $_POST['adresse'], 'cp' => $_POST['cp'], 'ville' => $_POST['ville'], 'tel' => $_POST['tel']);
			debug($newParticulier);
			$id_particulier = $particulierTable->insert($newParticulier);

			
			$newEnfant = array('id_p' => $id_user['id_u'], 'id_s' => $_POST['classe'], 'prenom' => $_POST['prenom'], 'date_naissance' => $date_naissance);
			debug($newEnfant);
			$enfantTable->insert($newEnfant);




			// $this->redirectToRoute('user_inscription_etudiant');
			
		}
		else
		{
			$this->show('user/inscription_particulier', ['scolarite_list' => $scolarite, 'message' => $message]);
		}
		
	}













	//--------------------------------------------------------------------------------------


	public function loginForm(){
		$this->show('user/login');
	}


	public function login(){

		
		$auth = new AuthentificationModel();
			
		if ($auth->isValidLoginInfo($_POST['email'], $_POST['mdp']))
		{	
			$user = new UsersModel();
			$dataUser = $user->getUserByUsernameOrEmail($_POST['email']);
			$auth->logUserIn($dataUser);
					
			$newEtudiant = new EtudiantModel();
			$etudiant = $newEtudiant->find($_SESSION['user']['id_u']);

	
			if (!empty($etudiant))
			{
				$this->show('user/profil_etudiant', ['etudiant' => $etudiant]);
			}
			else 
			{
				$newParticulier = new ParticulierModel();
				$particulier = $newParticulier->find($_SESSION['user']['id_u']);
				if (!empty($particulier))
				{
					$this->show('user/profil_particulier', ['particulier' => $particulier]);	
				}
			}


		}else{
			$this->redirectToRoute('user_login');
		}

	}


}












?>