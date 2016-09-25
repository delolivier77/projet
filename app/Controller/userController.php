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
use \Model\AdminModel;
use \W\Security\AuthentificationModel;
use \Controller\BaseController;


class UserController extends BaseController
{

	// permet garder dans le formulaire d'inscription de l'etudiant les données saisis par l'utlisateur en cas d"erreur
	public function verifPostEtudiant()
	{

		extract($_POST);
		$assignedDatas = array();

	    $assignedDatas['photo'] = (isset($_FILES['photo']['name'])) ? $_FILES['photo']['name'] : "";
	    $assignedDatas['civilite_h'] = (!isset($civilite) || (isset($civilite)) && $civilite == "M.") ? 'checked' : "";  
	    $assignedDatas['civilite_f'] = (isset($civilite) && $civilite == "Mme") ? 'checked' : "";  
	    $assignedDatas['nom'] = (isset($nom)) ? $nom : "";
	    $assignedDatas['prenom'] = (isset($prenom)) ? $prenom : "";
	    $assignedDatas['email'] = (isset($email)) ? $email : "";
	    $assignedDatas['mdp'] = (isset($mdp)) ? $mdp : "";
	    $assignedDatas['date_naissance'] = (isset($date_naissance)) ? $date_naissance : "";
	    $assignedDatas['tel'] = (isset($tel)) ? $tel : "";
	    $assignedDatas['adresse'] = (isset($adresse)) ? $adresse : "";
	    $assignedDatas['cp'] = (isset($cp)) ? $cp : "";
	    $assignedDatas['ville'] = (isset($ville)) ? $ville : "";

	    $assignedDatas['b1'] = ""; $assignedDatas['b2'] = "" ; $assignedDatas['b3'] = "" ; $assignedDatas['b4'] = "" ; $assignedDatas['b5'] = "";
	    if (isset($niveau_etude))
	    {
	      switch ($niveau_etude)
	      {
	        case 'Bac +1':
	          $assignedDatas['b1'] = "selected";
	          break;
	        case 'Bac +2':
	          $assignedDatas['b2'] = "selected";
	          break;
	        case 'Bac +3':
	          $assignedDatas['b3'] = "selected";
	          break;
	        case 'Bac +4':
	          $assignedDatas['b4'] = "selected";
	          break;
	        case 'Bac +5 (ou +)':
	          $assignedDatas['b5'] = "selected";
	          break;
	      }
	    }

	    $assignedDatas['num_etudiant'] = (isset($num_etudiant)) ? $num_etudiant : "";

	    $assignedDatas['rdv_ff'] = (!isset($type_rdv) || (isset($type_rdv)) && $type_rdv == "faceface") ? 'checked' : "";  
	    $assignedDatas['rdv_w'] = (isset($type_rdv) && $type_rdv == "webcam") ? 'checked' : "";
	    $assignedDatas['rdv_2'] = (isset($type_rdv) && $type_rdv == "both") ? 'checked' : "";

	    $assignedDatas['description'] = (isset($description)) ? $description : "";
	    $assignedDatas['detail_dispo'] = (isset($detail_dispo)) ? $detail_dispo : "";
	    $assignedDatas['tarif'] = (isset($tarif)) ? $tarif : "";

	    $assignedDatas['matiere'] = (isset($matiere)) ? $matiere : "";
	    $assignedDatas['classe_debut'] = (isset($classe_debut)) ? $classe_debut : "";
	    $assignedDatas['classe_fin'] = (isset($classe_fin)) ? $classe_fin : "";
	    
		return $assignedDatas;
	}


	// test si les differentes données saisies par l'utilisateur lors de l'inscription ou la modification d'un etudiant
	// si $test vaut 0 la verification se fait pour l'inscription, si il vaut 1 on test pour la modification d'un etudiant
	public function verifEtudiant($test)
	{
		$error = 0;

		$userTable = new UsersModel();
		
		// test si il y a des champs vides
		if(empty($_POST['civilite']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['date_naissance']) || empty($_POST['tel']) || empty($_POST['adresse']) || empty($_POST['cp']) || empty($_POST['ville']) || empty($_POST['niveau_etude']) || empty($_POST['num_etudiant']) || empty($_POST['matiere']) || empty($_POST['classe_debut']) || empty($_POST['classe_fin']) || empty($_POST['description']) || empty($_POST['description']) || empty($_POST['type_rdv']) || empty($_POST['tarif']) || ($test == 0 && empty($_POST['mdp'])))
		{
			$error = 1;
			$this->getFlashMessenger() -> warning('Tous les champs sont obligatoires ', null, true);
		}

		// test si une photo a été ajouté
		if (!empty($_FILES['photo']['name']))
		{
			$pos = explode('.', $_FILES['photo']['name']);
			$size = sizeof($pos);
			$extention = strtolower($pos[$size-1]);
			if ($extention != 'jpg' && $extention != 'jpeg' && $extention != 'bmp' && $extention != 'png')
			{
				$error = 1;
				$this->getFlashMessenger() -> error('Le format de la photo est invalide ', null, true);
			}
		}

		// test si l'email saisie existe déja
		if (!empty($_POST['email']) && $userTable->emailExists($_POST['email']) && $test == 0 )
		{
			$error = "1";
			$this->getFlashMessenger() -> error('L\'email est déjà utilisé ! Veuillez en saisir un nouveau', null, true);
		}
			// test la valeur saisie est bien au bon format
		else if(!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
		{
			$error = "1";
			$this->getFlashMessenger() -> error('L\'émail est invalide ! Veuillez en saisir un nouveau', null, true);
		}	


		$auth = new AuthentificationModel();
		// en cas de modification de mot verification que l'ancien mot de passe est valide
		if (!empty($_POST['ancien_mdp']))
		{
			if (!($auth->isValidLoginInfo($_POST['email'], $_POST['ancien_mdp'])) && $test == 1 && !empty($_POST['ancien_mdp']))
			{
				$error = "1";
				$this->getFlashMessenger() -> error('L\'ancien mot de passe est invalide !', null, true);
			}
		}

		// test si le code postal à 5 chiffres
		if (!empty($_POST['cp']) && !preg_match("#^[0-9]{5}$#", $_POST['cp']))
		{
			$error = 1;
			$this->getFlashMessenger() -> error('Le code postal est incorrect', null, true);
		}	

		// test si le numéro de téléphone est bien sur 10 chiffres
		if (!empty($_POST['tel']) && !preg_match("#^0[1-9][0-9]{8}$#", $_POST['tel']))
		{
			$error = 1;
			$this->getFlashMessenger() -> error('Le numéro de téléphone est incorrect', null, true);
		}	

		// test si la date de naissance est au bon format 
		if (!empty($_POST['date_naissance']) && !preg_match("#^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4}))$#", $_POST['date_naissance']))
		{
			$error = 1;
			$this->getFlashMessenger() -> error('Le format de la date de naissance est incorrect', null, true);
		}	

		return ($error);
	}


	// ouvre le formulaire d'inscription pour l'etudiant
	public function inscriptionEtudiant()
	{
		$matiereModel = new MatiereModel();
		$matiere = $matiereModel->findAllMatiere();
		$scolariteModel = new ScolariteModel();
		$scolarite = $scolariteModel->findAllScolarite();

		$assignedDatas = $this->verifPostEtudiant();

		$this->show('user/inscription_etudiant', ['matiere_list' => $matiere, 'scolarite_list' => $scolarite, 'assignedDatas' => $assignedDatas]);
	}


	// ajoute un nouvel etudiant dans la BDD
	public function addUserEtudiant()
	{
		// par defaut un etudiant a son compte actif
		$actif = 'actif';
		$userTable = new UsersModel();
		$auth = new AuthentificationModel();
		$etudiantTable = new EtudiantModel();
		$matiereModel = new MatiereModel();
		$matiere = $matiereModel->findAllMatiere();
		$scolariteModel = new ScolariteModel();
		$scolarite = $scolariteModel->findAllScolarite();
		$connaissanceTable = new ConnaissanceModel();

		// verification du contenu du formulaire
		$error = $this->verifEtudiant(0);
	
		// si aucune erreur a été detecté alors inscription dans la BDD
		if ($error == 0)
		{

			$email = htmlentities($_POST['email']);
			$mdp = $auth->hashPassword($_POST['mdp']);
		
			$date_naissance = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date_naissance'])));
			
			// insertion dans la table 'user'
			$newUser = array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $email, 'mdp' => $mdp, 'statut' => $actif, 'date_inscription' => date("Y-m-d H:i:s"));
			$id_user = $userTable->insert($newUser);
		
			// recuperation et reecriture du nom de la photo a inserer
			$pos = explode('.', $_FILES['photo']['name']);
			$size = sizeof($pos);
			$extention = strtolower($pos[$size-1]);
			$new_name_photo = $id_user['id_u'] . '-etudiant.' . $extention;
			$url_photo = 'assets/img/photos/'. $new_name_photo;
			
			// copie de la photo dans le repertoire photos
			copy($_FILES['photo']['tmp_name'], $url_photo);
	
			// insertion dans la table 'etudiant'
			$newEtudiant = array('id_et' => $id_user['id_u'],'photo' => $new_name_photo, 'civilite' => $_POST['civilite'], 'date_naissance' => $date_naissance, 'num_etudiant' => $_POST['num_etudiant'], 'adresse' => $_POST['adresse'], 'cp' => $_POST['cp'], 'ville' => $_POST['ville'], 'tel' => $_POST['tel'], 'detail_dispo' => $_POST['detail_dispo'], 'description' => $_POST['description'], 'niveau_etude' => $_POST['niveau_etude'], 'tarif' => $tarif, 'type_rdv' => $_POST['type_rdv']);
			$etudiantTable->insert($newEtudiant);

			// insertion dans la table 'connaissance'
			$newConnaissance = array('id_m' => $_POST['matiere'], 'id_et' => $id_user['id_u'], 'id_s_min' => $_POST['classe_debut'], 'id_s_max' => $_POST['classe_fin'] );
			debug($newConnaissance);
			$connaissanceTable->insert($newConnaissance);

			// renvoie sur la page login
			$this->getFlashMessenger() -> success('Votre compte a été créé. Vous pouvez maintenant vous connecter', null, true);
			$this->redirectToRoute('user_login');
		}
		else
		{
			// si il y a une erreur retour sur le formulaire d'inscription
			$assignedDatas = $this->verifPostEtudiant();
			$this->show('user/inscription_etudiant', ['matiere_list' => $matiere, 'scolarite_list' => $scolarite, 'assignedDatas' => $assignedDatas]);
		}
	}


	// ouvre le formulaire pour moddifier un formulaire etudiant
	public function formProfilEtudiant()
	{
		// recuperation des information sur l'etudiant
		$newEtudiant = new EtudiantModel();
		$etudiant = $newEtudiant->find($_SESSION['user']['id_u']);

		// recuperation des informations sur la connaissance de l'etudiant
		$newConnaissance = new ConnaissanceModel();
		$connaissance = $newConnaissance->findWhere(['id_et' => $_SESSION['user']['id_u']]);
			
		// recuperation de toutes les scolarites pour la liste deroulante du formulaire		
		$newScolarite = new ScolariteModel();
		$scolarite_list = $newScolarite->findAllScolarite();

		// recuperation de toules les matieres pour la liste deroulante du formulaire
		$newMatiere = new MatiereModel();
		$matiere_list = $newMatiere->findAllMatiere();

		// ouverture du formulaire de modification du profil etudiant
		$this->show('user/form_profil_etudiant', ['etudiant' => $etudiant, 'connaissance' => $connaissance, 'scolarite_list' => $scolarite_list, 'matiere_list' => $matiere_list]);
	}


	// permet la MAJ d'un profil etudiant
	public function updateEtudiant()
	{

		$userTable = new UsersModel();
		$auth = new AuthentificationModel();
		$etudiantTable = new EtudiantModel();
		$connaissanceTable = new ConnaissanceModel();

		// verification du contenu du formulaire
		$error = $this->verifEtudiant(1);

		// si aucune erreur a été detecté alors MAJ  dans la BDD
		if ($error == 0)
		{

			$email = htmlentities($_POST['email']);
			$date_naissance = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date_naissance'])));
			
			//test si nouveau mot de passe a été saisie
			if (empty($_POST['ancien_mdp']))
			{
				$newUser = array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $email);

			}
			else
			{	
				$mdp = $auth->hashPassword($_POST['nouveau_mdp']);
				$newUser = array('mdp' => $mdp, 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $email);
			}
			
			// MAJ dans la table 'user'	
			$id_user = $userTable->update($newUser, $_SESSION['user']['id_u']);
			
			//test pour savoir si une nouvelle photo a été saisie
			if (!empty($_FILES['photo']['name']))
			{
				$pos = explode('.', $_FILES['photo']['name']);
				$size = sizeof($pos);
				$extention = strtolower($pos[$size-1]);
				$new_name_photo = $id_user['id_u'] . '-etudiant.' . $extention;

				$url_old_photo = 'assets/img/photos/'.$_POST['nom_photo'];
				unlink($url_old_photo);

				$url_photo = 'assets/img/photos/'. $new_name_photo;
				copy($_FILES['photo']['tmp_name'], $url_photo);

			}
			else
			{
				$new_name_photo = $_POST['nom_photo'];
			}
	
			//MAJ de la table "etudiant"
			$newEtudiant = array('photo' => $new_name_photo, 'civilite' => $_POST['civilite'], 'date_naissance' => $date_naissance, 'num_etudiant' => $_POST['num_etudiant'], 'adresse' => $_POST['adresse'], 'cp' => $_POST['cp'], 'ville' => $_POST['ville'], 'tel' => $_POST['tel'], 'detail_dispo' => $_POST['detail_dispo'], 'description' => $_POST['description'], 'niveau_etude' => $_POST['niveau_etude'], 'tarif' => $_POST['tarif'], 'type_rdv' => $_POST['type_rdv']);
			$etudiantTable->update($newEtudiant,$_SESSION['user']['id_u']);

			// MAJ de la table "connaissance"
			$newConnaissance = array('id_m' => $_POST['matiere'], 'id_s_min' => $_POST['classe_debut'], 'id_s_max' => $_POST['classe_fin'] );
			$connaissanceTable->update($newConnaissance, $_POST['id_cn']);

			//MAJ du fichier de session
			$_SESSION['user']['nom']= $_POST['nom'];
			$_SESSION['user']['prenom']=$_POST['prenom'];
			$_SESSION['user']['email']=$_POST['email'];

			// retour sur la page profil
			$this->getFlashMessenger() -> success('Votre profil a été mis à jour', null, true);
			$this->redirectToRoute('user_profil_etudiant');

		}
		else
		{
			// si il y a une erreur retour au formulaire de modification
			$this->redirectToRoute('user_form_profil_etudiant');
		}
	}


	// recupere pour afficher dans la page profil de l'etudiant
	public function profilEtudiant()
	{
		// recuperation des informations de l'etudiant
		$newEtudiant = new EtudiantModel();
		$etudiant = $newEtudiant->find($_SESSION['user']['id_u']);

		// recuperation de la connaissance de l'etudiant
		$newConnaissance = new ConnaissanceModel();
		$connaissance = $newConnaissance->findWhere(['id_et' => $_SESSION['user']['id_u']]);
		
		// recuperation des commentaires que l'etudiant a reçu
		$newCommentaire = new CommentaireModel();
		$commentaire = $newCommentaire->findWhere(['id_et' => $_SESSION['user']['id_u']]);
		$avg = $newCommentaire->avgNoteEtudiant($_SESSION['user']['id_u']);
				
		// recuperation du nom de la scolarite de debut
		$newScolariteMin = new ScolariteModel();
		$scolarite_min = $newScolariteMin->findWhere(['id_s' => $connaissance[0]['id_s_min']]);

		// recuperation du nom de la scolarite de fin
		$newScolariteMax = new ScolariteModel();
		$scolarite_max = $newScolariteMax->findWhere(['id_s' => $connaissance[0]['id_s_max']]);

		// recuperation du nom de la matiere enseigné
		$newMatiere = new MatiereModel();
		$matiere = $newMatiere->findWhere(['id_m' => $connaissance[0]['id_m']]);

		// ouverture de la page profil
		$this->show('user/profil_etudiant', ['etudiant' => $etudiant, 'connaissance' => $connaissance, 'scolarite_min' => $scolarite_min, 'scolarite_max' => $scolarite_max, 'matiere' => $matiere, 'commentaire' => $commentaire, 'avg' => $avg]);
	}


	//----------------------------------------------------------------------------------------------------------------------


	// permet garder dans le formulaire d'inscription du particulier les données saisis par l'utlisateur en cas d"erreur
	public function verifPostParticulier()
	{
		extract($_POST);
		$assignedDatas = array();

		$assignedDatas['civilite_h'] = (!isset($civilite) || (isset($civilite)) && $civilite == "M.") ? 'checked' : "";  
		$assignedDatas['civilite_f'] = (isset($civilite) && $civilite == "Mme") ? 'checked' : "";  
		$assignedDatas['nom'] = (isset($nom)) ? $nom : "";
		$assignedDatas['prenom'] = (isset($prenom)) ? $prenom : "";
		$assignedDatas['email'] = (isset($email)) ? $email : "";
		$assignedDatas['mdp'] = (isset($mdp)) ? $mdp : "";
		$assignedDatas['adresse'] = (isset($adresse)) ? $adresse : "";
		$assignedDatas['cp'] = (isset($cp)) ? $cp : "";
		$assignedDatas['ville'] = (isset($ville)) ? $ville : "";
		$assignedDatas['tel'] = (isset($tel)) ? $tel : "";
		$assignedDatas['prenom_enfant'] = (isset($prenom_enfant)) ? $prenom_enfant : "";
		$assignedDatas['date_naissance'] = (isset($date_naissance)) ? $date_naissance : "";
		$assignedDatas['classe'] = (isset($classe)) ? $classe : "";

		return $assignedDatas;
	}


	// test si les differentes données saisies par l'utilisateur lors de l'inscription ou la modification d'un particulier
	// si $test vaut 0 la verification se fait pour l'inscription, si il vaut 1 on test pour la modification d'un particulier
	public function verifparticullier($test)
	{
		$error = 0;
		$userTable = new UsersModel();

		// test si il y a des champs vides
		if(empty($_POST['civilite']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['adresse']) || empty($_POST['cp']) || empty($_POST['ville']) || empty($_POST['prenom_enfant']) || empty($_POST['date_naissance']) || empty($_POST['classe']) || ($test == 0 && empty($_POST['mdp'])))
		{
			$error = 1;
			$this->getFlashMessenger() -> warning('Tous les champs sont obligatoires', null, true);
		}

		
		// test si l'email saisie existe déja
		if (!empty($_POST['email']) && $userTable->emailExists($_POST['email']) && $test == 0 )
		{
			$error = 1;
			$this->getFlashMessenger() -> error('L\'email est déjà utilisé ! Veuillez en saisir un nouveau', null, true);
		}
		// test la valeur saisie est bien au bon format 
		else if(!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
		{
			$error = 1;
			$this->getFlashMessenger() -> error('L\'émail est invalide ! Veuillez en saisir un nouveau', null, true);
		}	



		$auth = new AuthentificationModel();
		// en cas de modification de mot verification que l'ancien mot de passe est valide
		if (!empty($_POST['ancien_mdp']))
		{
			if (!($auth->isValidLoginInfo($_POST['email'], $_POST['ancien_mdp'])) && $test == 1 && !empty($_POST['ancien_mdp']))
			{
				$error = "1";
				$this->getFlashMessenger() -> error('L\'ancien mot de passe est invalide !', null, true);
			}
		}


		// test si le code postal à 5 chiffres
		if (!empty($_POST['cp']) && !preg_match("#^[0-9]{5}$#", $_POST['cp']))
		{
			$error = 1;
			$this->getFlashMessenger() -> error('Le code postal est incorrect', null, true);
		}	

		// test si le numéro de téléphone est bien sur 10 chiffres
		if (!empty($_POST['tel']) && !preg_match("#^0[1-9][0-9]{8}$#", $_POST['tel']))
		{
			$error = 1;
			$this->getFlashMessenger() -> error('Le numéro de téléphone est incorrect !', null, true);
		}	

		// test si la date de naissance est au bon format 
		if (!empty($_POST['date_naissance']) && !preg_match("#^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4}))$#", $_POST['date_naissance']))
		{
			$error = 1;
			$this->getFlashMessenger() -> error('La date de naissance est incorrect', null, true);
		}	

		return ($error);
	}


	// ouvre le formulaire d'inscription pour le particulier
	public function inscriptionParticulier()
	{
		$matiereModel = new MatiereModel();
		$matiere = $matiereModel->findAllMatiere();
		$scolariteModel = new ScolariteModel();
		$scolarite = $scolariteModel->findAllScolarite();

		$assignedDatas = $this->verifPostParticulier();

		$this->show('user/inscription_particulier', ['scolarite_list' => $scolarite, 'assignedDatas' => $assignedDatas]);
	}


	// ajoute un particulier dans la BDD
	public function addUserParticulier()
	{
		
		// par defaut un particulier a son compte actif
		$actif = 'actif';
		$userTable = new UsersModel();
		$particulierTable = new ParticulierModel();
		$enfantTable = new EnfantModel();
		$auth = new AuthentificationModel();
		$scolariteModel = new ScolariteModel();
		$scolarite = $scolariteModel->findAllScolarite();
		
		// verification du contenu du formulaire
		$error = $this->verifparticullier(0);
				  
		// si aucune erreur a été detecté alors inscription dans la BDD
		if ($error == 0)
		{
			
			$email = htmlentities($_POST['email']);
			$mdp = $auth->hashPassword($_POST['mdp']);
			$date_naissance = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date_naissance'])));
		
			// insertion dans la table 'user'
			$newUser = array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $email, 'mdp' => $mdp, 'statut' => $actif , 'date_inscription' => date("Y-m-d H:i:s"));
			$id_user = $userTable->insert($newUser);
			

			// insertion dans la table 'particulier'
			$newParticulier = array('id_p' => $id_user['id_u'], 'civilite' => $_POST['civilite'], 'adresse' => $_POST['adresse'], 'cp' => $_POST['cp'], 'ville' => $_POST['ville'], 'tel' => $_POST['tel']);
			$id_particulier = $particulierTable->insert($newParticulier);

			//insertion dans la table 'enfant'
			$newEnfant = array('id_p' => $id_user['id_u'], 'id_s' => $_POST['classe'], 'prenom' => $_POST['prenom'], 'date_naissance' => $date_naissance);
			$enfantTable->insert($newEnfant);

			// renvoie sur la page login
			$this->getFlashMessenger() -> success('Votre compte a été créé. Vous pouvez maintenant vous connecter', null, true);
			$this->redirectToRoute('user_login');
			
		}
		else
		{
			// si il y a une erreur retour sur le formulaire d'inscription
			$assignedDatas	= $this->verifPostParticulier();
			$this->show('user/inscription_particulier', ['assignedDatas'=> $assignedDatas, 'scolarite_list' => $scolarite]);
		}
	}


	// ouvre le formulaire pour moddifier un formulaire particulier
	public function formProfilParticulier()
	{
		// recuperation des informations sur le particulier
		$newParticulier = new ParticulierModel();
		$particulier = $newParticulier->find($_SESSION['user']['id_u']);

		// recuperation des informations sur l'enfant du particulier
		$newEnfant = new EnfantModel();
		$enfant = $newEnfant->search(['id_p' => $_SESSION['user']['id_u']]);

		// recuperation de toules les matieres pour la liste deroulante du formulaire
		$newScolarite = new ScolariteModel();
		$scolarite_list = $newScolarite->findAllScolarite();

		// ouverture du formulaire de modification du profil etudiant
		$this->show('user/form_profil_particulier', ['particulier' => $particulier, 'enfant' => $enfant,  'scolarite_list' => $scolarite_list]);
	}


	// permet la MAJ d'un profil particulier
	public function updateParticulier()
	{
		$userTable = new UsersModel();
		$particulierTable = new ParticulierModel();
		$enfantTable = new EnfantModel();
		$auth = new AuthentificationModel();
			
		// verification du contenu du formulaire
		$error = $this->verifparticullier(1);
		
		// si aucune erreur a été detecté alors MAJ  dans la BDD
		if($error == 0)
		{
			$email = htmlentities($_POST['email']);
			
			$date_naissance = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date_naissance'])));
			
			//test si nouveau mot de passe a été saisie
			if (empty($_POST['ancien_mdp']))
			{
				$newUser = array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $email);
			}
			else
			{	
				$mdp = $auth->hashPassword($_POST['nouveau_mdp']);
				$newUser = array('mdp' => $mdp, 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $email);
			}
				
			// MAJ dans la table 'user'		
			$id_user = $userTable->update($newUser, $_SESSION['user']['id_u']);

			// MAJ dans la table 'particulier'	
			$newParticulier = array('civilite' => $_POST['civilite'], 'adresse' => $_POST['adresse'], 'cp' => $_POST['cp'], 'ville' => $_POST['ville'], 'tel' => $_POST['tel']);
			$particulierTable->update($newParticulier, $_SESSION['user']['id_u']);
				
			// MAJ dans la table 'enfant'	
			$newEnfant = array('id_s' => $_POST['classe'], 'prenom' => $_POST['prenom_enfant'], 'date_naissance' => $date_naissance);
			$enfantTable->update($newEnfant, $_POST['id_en']);

			//MAJ du fichier de session
			$_SESSION['user']['nom']= $_POST['nom'];
			$_SESSION['user']['prenom']=$_POST['prenom'];
			$_SESSION['user']['email']=$_POST['email'];
			
			// retour sur la page profil
			$this->getFlashMessenger() -> success('Votre profil a été mis à jour', null, true);
			$this->redirectToRoute('user_profil_particulier');
		}	
		else{
			// si il y a une erreur retour au formulaire de modification
			$this->redirectToRoute('user_form_profil_particulier');
		}
	}

	// recupere pour afficher dans la page profil de l'etudiant
	public function profilParticulier()
	{
		// recuperation des informations du particulier
		$newParticulier = new ParticulierModel();
		$particulier = $newParticulier->find($_SESSION['user']['id_u']);

		// recuperation des commentaires postés par le particulier
		$newCommentaire = new CommentaireModel();
		$commentaire = $newCommentaire->findCommentsByParticulier($_SESSION['user']['id_u']);
			
		// recuperation des informations concernant l'enfant du particulier
		$newEnfant = new EnfantModel();
		$enfant = $newEnfant->findWhere(['id_p' => $_SESSION['user']['id_u']]);

		// recuperation du nom de la scolarite suivi par l'enfant
		$newScolarite = new ScolariteModel();
		$scolarite = $newScolarite->find($enfant[0]['id_s']);

		// ouverture de la page profil
		$this->show('user/profil_particulier', ['particulier' => $particulier, 'enfant' => $enfant, 'scolarite' => $scolarite ,'commentaire' => $commentaire]);	
	}


	//---------------------------------------------------------------------------------------------------------------------

	// ouvre le formulaire de login
	public function loginForm()
	{
		$this->show('user/login');
	}

	// Test les valeurs de connexion du login


	public function login()
	{
		// test si le couple email/mot de passe est valide
		$auth = new AuthentificationModel();
		if ($auth->isValidLoginInfo($_POST['email'], $_POST['mdp']))
		{	
			// connexion
			$user = new UsersModel();
			$dataUser = $user->getUserByUsernameOrEmail($_POST['email']);
			$auth->logUserIn($dataUser);

			// test si le user est un etudiant
			$newEtudiant = new EtudiantModel();
			$etudiant = $newEtudiant->find($_SESSION['user']['id_u']);
			if (!empty($etudiant) && $_SESSION['user']['statut'] == 'actif')
			{
				$_SESSION['user']['role'] = 'etudiant';
				$this->getFlashMessenger() -> info('Bonjour '. $_SESSION['user']['prenom'] . " " . $_SESSION['user']['nom'], null, true);
				$this->redirectToRoute('user_profil_etudiant');
			}

			// test si le user est un particulier
			$newParticulier = new ParticulierModel();
			$particulier = $newParticulier->find($_SESSION['user']['id_u']);
			if (!empty($particulier) && $_SESSION['user']['statut'] == 'actif')
			{
				$_SESSION['user']['role'] = 'particulier';
				$this->getFlashMessenger() -> info('Bonjour '. $_SESSION['user']['prenom'] . " " . $_SESSION['user']['nom'], null, true);
				$this->redirectToRoute('user_profil_particulier');
			}

			// test si le user est un admin
			$newAdmin = new AdminModel();
			$admin = $newAdmin->find($_SESSION['user']['id_u']);
			if (!empty($admin) && $_SESSION['user']['statut'] == 'actif')
			{
				$_SESSION['user']['role'] = 'admin';
				$this->getFlashMessenger() -> info('admin', null, true);
				$this->show('user/login');
				// vers back
			}

			$this->getFlashMessenger() -> error('Le compte n\'exite pas', null, true);
			$this->show('user/login');
		}
		else
		{
			$this->getFlashMessenger() -> error('Mot de passe ou email incorrect', null, true);
			$this->show('user/login');
		}
	}

	// gestion de la deconnection
	public function logout(){
		$auth = new AuthentificationModel();
		$auth->logUserOut();
		$this->getFlashMessenger() -> info('Vous êtres deconnecté', null, true);
		$this->redirectToRoute('user_login');
	}




}


?>