<?php
namespace Controller;

use \W\Controller\Controller;
use \Controller\BaseController;

use \Model\CommentaireModel;
use \Model\MatiereModel;
use \Model\ScolariteModel;
use \Model\UserModel;


class AdminController extends BaseController {

// !!!!!!!!!!!!!!!!!!!!!! À DÉCOMMENTER LORSQU'ON AURA RASSEMBLÉ LES FICHIERS (LOGIN...) : !!!!!!!!!!!!!!!!!!!!!!!!!!!!!

/*	public function __construct(){
		parent::__construct();
		// Les fonctions de AdminController ne seront mises en oeuvre que si l'utilisateur est admin
		$this->allowTo('admin');
	}*/


// COMMENTAIRES-------------------------------

	/**
	* Fonction de recherche des commentaires
	*/
	public function findAllCommentaire() {

		$commentaireModel = new CommentaireModel();
		$commentaires = $commentaireModel -> query("SELECT c.id_co, CONCAT(c.id_p,' - ', up.nom,' ',up.prenom) as Particulier, CONCAT(c.id_et,' - ', ue.nom,' ',ue.prenom) as Etudiant, note, commentaire, DATE_FORMAT(date_commentaire,'%m-%d-%Y %h:%i') FROM commentaire as c, user as up, user as ue WHERE c.id_p = up.id_u AND c.id_et = ue.id_u");

		$this -> show('admin/commentaire', ['commentaires' => $commentaires]);
	}

	/**
	* Fonction de suppression d'un commentaire
	*/
	public function deleteCommentaire($id) {

		$commentaireModel = new CommentaireModel();
		$commentaire = $commentaireModel -> delete($id);
		$this->getFlashMessenger() -> success('La suppression a bien été effectuée.', null, true);
		$this -> redirectToRoute('admin_find_all_commentaire');
	}

// MATIERES-------------------------------

	/**
	* Fonction de recherche des matières
	*/
	public function findAllMatiere($id = null) {

		$matiereModel = new MatiereModel();
		$matieres = $matiereModel -> findAll();

		$datasForView = ['matieres' => $matieres];

		if($id){
			$matiereModel = new MatiereModel();
			$matiere = $matiereModel -> find($id);
			$datasForView['matiere'] = $matiere;
		}

		$this -> show('admin/matiere', $datasForView);
	}

	/**
	* Fonction de suppression d'une matière
	*/
	public function deleteMatiere($id) {

		$matiereModel = new MatiereModel();
		$matiere = $matiereModel -> delete($id);
		$this -> getFlashMessenger() -> success('La suppression a bien été effectuée.', null, true);
		$this -> redirectToRoute('admin_find_all_matiere');
	}

	/**
	* Fonction de modification/insertion d'une matière
	*/
	public function saveMatiere() {
		
		if(isset($_POST) && (isset($_POST['enregistrer']))){
			$matiereModel = new MatiereModel();
			// Modification
			if(isset($_POST['id_m']) && ($_POST['id_m'] != '')){
				// UPDATE matiere SET nom = $_POST['nom'] WHERE id_m = $_POST['id_m'];
				$matiereModel -> update(array ('nom' => $_POST['nom']), $_POST['id_m']);
				$this -> getFlashMessenger() -> success('La modification a bien été effectuée.', null, true);
				$this -> redirectToRoute('admin_find_all_matiere');
			} else {
				$newMatiere = array ('nom' => $_POST['nom']);
				// Recherche de doublon
				$matiere = $matiereModel -> search($newMatiere); 
				if(!empty($matiere)){ // La matière est déjà en BDD : affichage d'un message
					$this -> getFlashMessenger() -> warning('La matière existe déjà.', null, true);
				} else {
					// Insertion
					$matiere = $matiereModel -> insert($newMatiere);
					$this -> getFlashMessenger() -> success('La matière a bien été ajoutée.', null, true);
				}
				$this -> redirectToRoute('admin_find_all_matiere');
			}
		}	
	}

// SCOLARITE-------------------------------

	/**
	* Fonction de recherche des niveaux de scolarité
	*/
	public function findAllScolarite($id = null) {

		$scolariteModel = new ScolariteModel();
		$scolarites = $scolariteModel -> findAll();

		$datasForView = ['scolarites' => $scolarites];

		if($id){
			$scolariteModel = new ScolariteModel();
			$scolarite = $scolariteModel -> find($id);
			$datasForView['scolarite'] = $scolarite;
		}

		$this -> show('admin/scolarite', $datasForView);
	}

	/**
	* Fonction de modification d'un niveau de scolarité
	*/
	public function saveScolarite() {
		
		if(isset($_POST) && (isset($_POST['enregistrer']))){
			$scolariteModel = new ScolariteModel();
			// Modification
			if(isset($_POST['id_s']) && ($_POST['id_s'] != '')){
				$scolariteModel -> update(array ('nom' => $_POST['nom']), $_POST['id_s']);
				$this -> getFlashMessenger() -> success('La modification a bien été effectuée.', null, true);
				$this -> redirectToRoute('admin_find_all_scolarite');
			}
		}	
	}

// UTILISATEURS-------------------------------

	/**
	* Fonction de recherche des utilisateurs
	*/
	public function findAllUser($id = null) {

		$userModel = new UserModel();
		$users = $userModel -> findAll();

		$datasForView = ['users' => $users];

		if($id){
			$userModel = new UserModel();
			$user = $userModel -> find($id);
			$datasForView['user'] = $user;
		}

		$this -> show('admin/user', $datasForView);
	}

	/**
	* Fonction de suppression d'un utilisateur
	*/
	public function deleteUser($id) {
		$userModel = new UserModel();
		$user = $userModel -> delete($id);
		$this -> getFlashMessenger() -> success('La suppression a bien été effectuée.', null, true);
		$this -> redirectToRoute('admin_find_all_user');
	}

	/**
	* Fonction de modification d'un utilisateur
	*/
	public function saveUser() {
		
		if(isset($_POST) && (isset($_POST['enregistrer']))){
			$userModel = new UserModel();
			// Modification
			if(isset($_POST['id_u']) && ($_POST['id_u'] != '')){
				$userModel -> update(array ('nom' => $_POST['nom'],'prenom' => $_POST['prenom'],'email' => $_POST['email'],'statut' => $_POST['statut']), $_POST['id_u']);
				$this->getFlashMessenger() -> success('La modification a bien été effectuée.', null, true);
				$this -> redirectToRoute('admin_find_all_user');
/*			} else {
				$newUser = array ('nom' => $_POST['nom'],'prenom' => $_POST['prenom'],'email' => $_POST['email'],'mdp' => $_POST['mdp'],'date_insciption' => $_POST['date_insciption'],'statut' => $_POST['statut']), $_POST['id_u']);
				// Recherche de doublon
				$user = $userModel -> search($newUser);
				if(!empty($user)){ // L'utilisateur est déjà en BDD : affichage d'un message
					$this -> getFlashMessenger() -> warning('L\'utilisateur existe déjà.', null, true);
				} else {
					// Insertion
					$user = $userModel -> insert($newUser);
					$this -> getFlashMessenger() -> success('Le nouvel utilisateur a bien été ajouté.', null, true);
				}
				$this -> redirectToRoute('admin_find_all_user');*/
			}
		}
	}
}