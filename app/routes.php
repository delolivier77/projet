<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		/* inscription utilisateur dans la BDD*/
		['GET', '/inscription_etudiant', 'User#inscriptionEtudiant', 'user_inscription_etudiant'],
		['POST', '/adduser_etudiant', 'User#addUserEtudiant', 'user_add_user_etudiant'],

		['GET', '/inscription_particulier', 'User#inscriptionParticulier', 'user_inscription_particulier'],
		['POST', '/adduser_particulier', 'User#addUserParticulier', 'user_add_user_particulier'],	

		/* connexion un utilisateur*/
		['GET', '/login', 'User#loginForm', 'user_login_form'],
		['POST', '/login', 'User#login', 'user_login'],
		['GET', '/profil_etudiant', 'User#profilEtudiant', 'user_profil_etudiant'],
		['GET', '/profil_particulier', 'User#profilParticulier', 'user_profil_particulier'],
		['GET', '/logout', 'User#logout', 'user_logout'],	

	);