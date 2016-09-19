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
		$role = 'etudiant';

		$userTable = new UsersModel();
		$etudiantTable = new EtudiantModel();
		$auth = new AuthentificationModel();
		$matiereModel = new MatiereModel();
		$matiere = $matiereModel->findAllMatiere();
		$scolariteModel = new ScolariteModel();
		$scolarite = $scolariteModel->findAllScolarite();
		






		$civilite_h = (!isset($_POST['civilite']) || (isset($_POST['civilite'])) && $_POST['civilite'] == "M.") ? 'checked' : "";  
		$civilite_f = (isset($_POST['civilite']) && $_POST['civilite'] == "Mme") ? 'checked' : "";  
		$nom = (isset($_POST['nom'])) ? $_POST['nom'] : "";
		$prenom = (isset($_POST['prenom'])) ? $_POST['prenom'] : "";
		$email = (isset($_POST['email'])) ? $_POST['email'] : "";
		$mdp = (isset($_POST['mdp'])) ? $_POST['mdp'] : "";
		$date_naissance = (isset($_POST['date_naissance'])) ? $_POST['date_naissance'] : "";
		$tel = (isset($_POST['tel'])) ? $_POST['tel'] : "";
		$adresse = (isset($_POST['adresse'])) ? $_POST['adresse'] : "";
		$cp = (isset($_POST['cp'])) ? $_POST['cp'] : "";
		$ville = (isset($_POST['ville'])) ? $_POST['ville'] : "";


		$b1 = ""; $b2 = "" ; $b3 = "" ; $b4 = "" ; $b5 = "";
		if (isset($_POST['niveau_etude']))
		{
			switch ($_POST['niveau_etude'])
		    {
		      case 'Bac +1':
		        $b1 = "selected";
		        break;
		      case 'Bac +2':
		        $b2 = "selected";
		        break;
		      case 'Bac +3':
		        $b3 = "selected";
		        break;
		      case 'Bac +4':
		        $b4 = "selected";
		        break;
		      case 'Bac +5 (ou +)':
		        $b5 = "selected";
		        break;
		    }
		}

		$num_etudiant = (isset($_POST['num_etudiant'])) ? $_POST['num_etudiant'] : "";

		$rdv_ff = (!isset($_POST['type_rdv']) || (isset($_POST['type_rdv'])) && $_POST['type_rdv'] == "faceface") ? 'checked' : "";  
		$rdv_w = (isset($_POST['type_rdv']) && $_POST['type_rdv'] == "webcam") ? 'checked' : "";
		$rdv_2 = (isset($_POST['type_rdv']) && $_POST['type_rdv'] == "both") ? 'checked' : "";

		$description = (isset($_POST['description'])) ? $_POST['description'] : "";
		$detail_dispo = (isset($_POST['detail_dispo'])) ? $_POST['detail_dispo'] : "";
		$tarif = (isset($_POST['tarif'])) ? $_POST['tarif'] : "";



		$tab = array('civilite_h' => $civilite_h, 'civilite_f' => $civilite_f, 'nom' => $nom, 'prenom' => $prenom);

		debug ($tab);

















		if(empty($_POST['photo']) || empty($_POST['civilite']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mdp']) || empty($_POST['date_naissance']) || empty($_POST['tel']) || empty($_POST['adresse']) || empty($_POST['cp']) || empty($_POST['ville']) || empty($_POST['niveau_etude']) || empty($_POST['num_etudiant']) || empty($_POST['matiere']) || empty($_POST['classe_debut']) || empty($_POST['classe_fin']) || empty($_POST['description']) || empty($_POST['description']) || empty($_POST['type_rdv']) || empty($_POST['tarif']))
		{
			$message .= "Tous les champs sont obligatoires <br>";
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

			$newEtudiant = array('civilite' => $_POST['civilite'], 'date_naissance' => $date_naissance, 'photo' => $_POST['photo'], 'num_etudiant' => $_POST['num_etudiant'], 'adresse' => $_POST['adresse'], 'cp' => $_POST['cp'], 'ville' => $_POST['ville'], 'tel' => $_POST['tel'], 'detail_dispo' => $_POST['detail_dispo'], 'description' => $_POST['description'], 'niveau_etude' => $_POST['niveau_etude'], 'tarif' => $tarif, 'type_rdv' => $_POST['type_rdv']);
	
			debug($newEtudiant);
			$id_etudiant = $etudiantTable->insert($newEtudiant);

			debug($id_etudiant['id_et']);

			$newUser = array('id_et' => $id_etudiant['id_et'], 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $email, 'mdp' => $mdp, 'statut' => $actif, 'role' => $role, 'date_inscription' => date("Y-m-d H:i:s"));
				
			debug($newUser);
			// $userTable->setPrimaryKey('id_u');
			$userTable->insert($newUser);
			// $this->redirectToRoute('user_inscription_etudiant');
			
		}
		else
		{
			$this->show('user/inscription_etudiant', ['matiere_list' => $matiere, 'scolarite_list' => $scolarite, 'message' => $message, 'tab' => $tab]);
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
			$message .= "Tous les champs sont obligatoires <br>";
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
			
			$newParticulier = array('civilite' => $_POST['civilite'], 'adresse' => $_POST['adresse'], 'cp' => $_POST['cp'], 'ville' => $_POST['ville'], 'tel' => $_POST['tel']);
	
			debug($newParticulier);
			$id_particulier = $particulierTable->insert($newParticulier);

			debug($id_particulier['id_p']);


			$newEnfant = array('id_p' => $id_particulier['id_p'], 'id_s' => $_POST['classe'], 'prenom' => $_POST['prenom'], 'date_naissance' => $date_naissance);
			debug($newEnfant);
			$enfantTable->insert($newEnfant);


			$newUser = array('id_p' => $id_particulier['id_p'], 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $email, 'mdp' => $mdp, 'statut' => $actif, 'role' => $role, 'date_inscription' => date("Y-m-d H:i:s"));
				
			debug($newUser);
			// $userTable->setPrimaryKey('id_u');
			$userTable->insert($newUser);
			// $this->redirectToRoute('user_inscription_etudiant');
			
		}
		else
		{
			$this->show('user/inscription_particulier', ['matiere_list' => $matiere, 'scolarite_list' => $scolarite, 'message' => $message]);
		}
		
	}


	
}


?>