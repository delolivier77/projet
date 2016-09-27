<?php
	
	$w_routes = array(
		
		/* page d'acceuil*/
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/contact', 'Default#contact', 'default_contact'],
		['GET', '/cgu', 'Default#cgu', 'default_cgu'],


		/*  gestion Etudiant */
		['GET', '/inscription_etudiant', 'User#inscriptionEtudiant', 'user_inscription_etudiant'],
		['POST', '/adduser_etudiant', 'User#addUserEtudiant', 'user_add_user_etudiant'],
		['POST', '/update_etudiant', 'User#updateEtudiant', 'user_update_etudiant'],	
		['GET', '/form_profil_etudiant', 'User#formProfilEtudiant', 'user_form_profil_etudiant'],

		/* gestion Particulier */
		['GET', '/inscription_particulier', 'User#inscriptionParticulier', 'user_inscription_particulier'],
		['POST', '/adduser_particulier', 'User#addUserParticulier', 'user_add_user_particulier'],	
		['POST', '/update_particulier', 'User#updateParticulier', 'user_update_particulier'],	
		['GET', '/form_profil_particulier', 'User#formProfilParticulier', 'user_form_profil_particulier'],
		
		/* connexion */
		['GET', '/login', 'User#loginForm', 'user_login_form'],
		['POST', '/login', 'User#login', 'user_login'],
		['GET', '/profil_etudiant', 'User#profilEtudiant', 'user_profil_etudiant'],
		['GET', '/profil_particulier', 'User#profilParticulier', 'user_profil_particulier'],
		['GET', '/logout', 'User#logout', 'user_logout'],	

		/* gestion d'un commentaire par le particulier */
		['GET', '/form_commentaire/[:id]', 'Commentaire#formCommentaire', 'commentaire_form_commentaire'],
		['POST', '/update_commentaire', 'Commentaire#updateCommentaire', 'commentaire_update_commentaire'],
		['GET', '/delete_commentaire/[:id]', 'Commentaire#deleteCommentaire', 'commentaire_delete_commentaire'],


		/* PARTIE ADMINISTRATEUR DU SITE */

		// COMMENTAIRES
		['GET', '/admin', 'Admin#findAllCommentaire', 'admin_find_all_commentaire'],
		['GET', '/admin/commentaire/[:id]', 'Admin#findAllCommentaire', 'admin_find_all_commentaire_edit'],
		['GET', '/admin/commentaire/delete/[:id]', 'Admin#deleteCommentaire', 'admin_delete_commentaire'],

		// MATIERES
		['GET', '/admin/matiere', 'Admin#findAllMatiere', 'admin_find_all_matiere'],
		['GET', '/admin/matiere/[:id]', 'Admin#findAllMatiere', 'admin_find_all_matiere_edit'],
		['GET', '/admin/matiere/delete/[:id]', 'Admin#deleteMatiere', 'admin_delete_matiere'],
		['GET|POST', '/admin/matiere/save/[:id]', 'Admin#saveMatiere', 'admin_save_matiere'],

		// SCOLARITE
		['GET', '/admin/scolarite', 'Admin#findAllScolarite', 'admin_find_all_scolarite'],
		['GET', '/admin/scolarite/[:id]', 'Admin#findAllScolarite', 'admin_find_all_scolarite_edit'],
		['GET|POST', '/admin/scolarite/save/[:id]', 'Admin#saveScolarite', 'admin_save_scolarite'],

		// USER
		['GET', '/admin/user', 'Admin#findAllUser', 'admin_find_all_user'],
		['GET', '/admin/user/[:id]', 'Admin#findAllUser', 'admin_find_all_user_edit'],
		['GET', '/admin/user/delete/[:id]', 'Admin#deleteUser', 'admin_delete_user'],
		['GET|POST', '/admin/user/save/[:id]', 'Admin#saveUser', 'admin_save_user'],
		['POST', '/admin/user/adduser', 'Admin#addUser', 'admin_add_user'],


		/* gestion des recherches*/
		['GET', '/recherche', 'Recherche#recherche', 'recherche_recherche'],
		['POST', '/searchresult', 'Recherche#result', 'recherche_result'],
		['GET', '/etudiant/[:id]', 'Detailsetudiant#details', 'detailsetudiant_detailsetudiant'],
		['POST', '/addcom', 'Commentaire#addCom','add_commentaire']	


	);