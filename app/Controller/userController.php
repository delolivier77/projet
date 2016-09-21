<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \Model\MatiereModel;
use \Model\ScolariteModel;
use \Model\EtudiantModel;
use \Model\ParticulierModel;
use \Model\EnfantModel;
use \Model\ConnaissanceModel;
use \Model\CommentaireModel;
use \W\Security\AuthentificationModel;
use \Controller\BaseController;


class UserController extends BaseController
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
		
		$error = 0;
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
			$error = 1;
			$this->getFlashMessenger() -> warning('Tous les champs sont obligatoires ', null, true);
		}


		if (empty($_FILES['photo']['name']))
		{
			$error = 1;
			$this->getFlashMessenger() -> warning('Une photo doit être inserée', null, true);
		}	


		if (!empty($_POST['email']) && $userTable->emailExists($_POST['email']))
		{
			$error = 1;
			$this->getFlashMessenger() -> warning('L\'email est déjà utilisé ! Veuillez en saisir un nouveau ', null, true);
		}
		else if(!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
		{
			$error = 1;
			$this->getFlashMessenger() -> warning('L\'email est invalide ! Veuillez en saisir un nouveau', null, true);
		}	


		if (!empty($_POST['cp']) && !preg_match("#^[0-9]{5}$#", $_POST['cp']))
		{
			$error = 1;
			$this->getFlashMessenger() -> warning('Le code postal est incorrect', null, true);
		}	

		if (!empty($_POST['tel']) && !preg_match("#^0[1-9][0-9]{8}$#", $_POST['tel']))
		{
			$error = 1;
			$this->getFlashMessenger() -> warning('Le numéro de téléphone est incorrect', null, true);
		}	

		if (!empty($_POST['date_naissance']) && !preg_match("#^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4}))$#", $_POST['date_naissance']))
		{
			$error = 1;
			$this->getFlashMessenger() -> warning('Le format de la date de naissance est incorrect', null, true);
		}	

	
		if ($error = 0)
		{
			$email = htmlentities($_POST['email']);
			$mdp = $auth->hashPassword($_POST['mdp']);
			$date_naissance = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date_naissance'])));
			$tarif = str_replace(",", ".", $_POST['tarif']);

			$newUser = array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $email, 'mdp' => $mdp, 'statut' => $actif, 'date_inscription' => date("Y-m-d H:i:s"));
				
			debug($newUser);
			$id_user = $userTable->insert($newUser);
			debug($id_user['id_u']);

			$pos = explode('.', $_FILES['photo']['name']);
			$size = sizeof($pos);
			$new_name_photo = $id_user['id_u'] . '-etudiant.' . $pos[$size-1];
			$url_photo = 'assets/img/photos/'. $new_name_photo;
			
			copy($_FILES['photo']['tmp_name'], $url_photo);
	

			$newEtudiant = array('id_et' => $id_user['id_u'],'photo' => $new_name_photo, 'civilite' => $_POST['civilite'], 'date_naissance' => $date_naissance, 'num_etudiant' => $_POST['num_etudiant'], 'adresse' => $_POST['adresse'], 'cp' => $_POST['cp'], 'ville' => $_POST['ville'], 'tel' => $_POST['tel'], 'detail_dispo' => $_POST['detail_dispo'], 'description' => $_POST['description'], 'niveau_etude' => $_POST['niveau_etude'], 'tarif' => $tarif, 'type_rdv' => $_POST['type_rdv']);
	
			debug($newEtudiant);
			$etudiantTable->insert($newEtudiant);

			// $this->redirectToRoute('user_inscription_etudiant');
		}
		else
		{
			$this->show('user/inscription_etudiant', ['matiere_list' => $matiere, 'scolarite_list' => $scolarite]);
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
		
		
		$error = 0;
		$actif = 'actif';
		
		$userTable = new UsersModel();
		$particulierTable = new ParticulierModel();
		$enfantTable = new EnfantModel();
		$auth = new AuthentificationModel();
		$scolariteModel = new ScolariteModel();
		$scolarite = $scolariteModel->findAllScolarite();
		







		if(empty($_POST['civilite']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mdp']) || empty($_POST['mdp']) || empty($_POST['adresse']) || empty($_POST['cp']) || empty($_POST['ville']) || empty($_POST['prenom_enfant']) || empty($_POST['date_naissance']) || empty($_POST['classe']))
		{
			$error = "1";
			$this->getFlashMessenger() -> warning('Tous les champs sont obligatoires', null, true);
		}

		if (!empty($_POST['email']) && $userTable->emailExists($_POST['email']))
		{
			$error = "1";
			$this->getFlashMessenger() -> warning('L\'email est déjà utilisé ! Veuillez en saisir un nouveau', null, true);
		}
		else if(!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
		{
			$error = "1";
			$this->getFlashMessenger() -> warning('L\'émail est invalide ! Veuillez en saisir un nouveau', null, true);
		}	


		if (!empty($_POST['cp']) && !preg_match("#^[0-9]{5}$#", $_POST['cp']))
		{
			$error = "1";
			$this->getFlashMessenger() -> warning('Le code postal est incorrect', null, true);
		}	

		if (!empty($_POST['tel']) && !preg_match("#^0[1-9][0-9]{8}$#", $_POST['tel']))
		{
			$error = "1";
			$this->getFlashMessenger() -> warning('Le numéro de téléphone est incorrect !', null, true);
		}	

		if (!empty($_POST['date_naissance']) && !preg_match("#^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4}))$#", $_POST['date_naissance']))
		{
			$error = "1";
			$this->getFlashMessenger() -> warning('La date de naissance est incorrect', null, true);
		}	


		  extract($_POST);
		  $civilite_h = (!isset($civilite) || (isset($civilite)) && $civilite == "M.") ? 'checked' : "";  
		  $civilite_f = (isset($civilite) && $civilite == "Mme") ? 'checked' : "";  
		  $nom = (isset($nom)) ? $nom : "";
		  $prenom = (isset($prenom)) ? $prenom : "";
		  $email = (isset($email)) ? $email : "";
		  $mdp = (isset($mdp)) ? $mdp : "";
		  $adresse = (isset($adresse)) ? $adresse : "";
		  $cp = (isset($cp)) ? $cp : "";
		  $ville = (isset($ville)) ? $ville : "";
		  $tel = (isset($tel)) ? $tel : "";

		  $prenom_enfant = (isset($prenom_enfant)) ? $prenom_enfant : "";
		  $date_naissance = (isset($date_naissance)) ? $date_naissance : "";

		  $assignedDatas = array();

		  foreach ($_POST as $key => $value) {
		  	// si $key = 'nom' alors $$key sera $nom
		  	
		  	if ($key == 'civilite')
		  	{
		  		$assignedDatas['civilite_h'] = $civilite_h;
		  		$assignedDatas['civilite_f'] = $civilite_f;
		  	}
		  	else
		  	{
		  		$assignedDatas[$key] = ${$key};	
		  	}

		  	
		  }

		  

			
		if ($error = 0)
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
			$this->show('user/inscription_particulier', ['assignedDatas'=> $assignedDatas, 'scolarite_list' => $scolarite]);
		}
		
	}













	//--------------------------------------------------------------------------------------


	public function loginForm(){
		$this->show('user/login');
	}


	public function login()
	{
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
				$newConnaissance = new ConnaissanceModel();
				$connaissance = $newConnaissance->find($_SESSION['user']['id_u']);

				$newCommentaire = new CommentaireModel();
				$commentaire = $newCommentaire->search(['id_et' =>$_SESSION['user']['id_u']]);
				$avg = $newCommentaire->avgNoteEtudiant($_SESSION['user']['id_u']);
				
				$newScolariteMin = new ScolariteModel();
				$scolarite_min = $newScolariteMin->search(['id_s' => $connaissance['id_s_min']]);

				$newScolariteMax = new ScolariteModel();
				$scolarite_max = $newScolariteMax->search(['id_s' => $connaissance['id_s_max']]);

				$newMatiere = new MatiereModel();
				$matiere = $newMatiere->search(['id_m' => $connaissance['id_m']]);
					
				$etudiant = $newEtudiant->find($_SESSION['user']['id_u']);
				$this->show('user/profil_etudiant', ['etudiant' => $etudiant, 'connaissance' => $connaissance, 'scolarite_min' => $scolarite_min, 'scolarite_max' => $scolarite_max, 'matiere' => $matiere, 'commentaire' => $commentaire, 'avg' => $avg]);
			}
			else 
			{
				$newParticulier = new ParticulierModel();
				$particulier = $newParticulier->find($_SESSION['user']['id_u']);
				if (!empty($particulier))
				{

					$newCommentaire = new CommentaireModel();
					$commentaire = $newCommentaire->search(['id_p' => $_SESSION['user']['id_u']]);

					$newEnfant = new EnfantModel();
					$enfant = $newEnfant->search(['id_p' => $_SESSION['user']['id_u']]);

					$newScolarite = new ScolariteModel();
					$scolarite = $newScolarite->find($enfant[0]['id_s']);

					$this->show('user/profil_particulier', ['particulier' => $particulier, 'enfant' => $enfant, 'scolarite' => $scolarite ,'commentaire' => $commentaire]);	
				}
			}


		}else{
			$this->redirectToRoute('user_login');
		}

	}


}












?>