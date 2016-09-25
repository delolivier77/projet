<?php
	
	$w_routes = array(
		/* page d'acceuil*/
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/contact', 'Default#contact', 'contact'],
		['GET', '/cgu', 'Default#cgu', 'cgu'],


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

	);