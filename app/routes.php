<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		
		['GET', '/inscription_etudiant', 'User#inscriptionEtudiant', 'user_inscription_etudiant'],
		['POST', '/adduser_etudiant', 'User#addUserEtudiant', 'user_add_user_etudiant'],

		['GET', '/inscription_particulier', 'User#inscriptionParticulier', 'user_inscription_particulier'],
		['POST', '/adduser_particulier', 'User#addUserParticulier', 'user_add_user_particulier'],	
		['POST', '/update_particulier', 'User#updateParticulier', 'user_update_particulier'],	

		
		['GET', '/login', 'User#loginForm', 'user_login_form'],
		['POST', '/login', 'User#login', 'user_login'],
		['GET', '/profil_etudiant', 'User#profilEtudiant', 'user_profil_etudiant'],
		['GET', '/profil_particulier', 'User#profilParticulier', 'user_profil_particulier'],
		['GET', '/logout', 'User#logout', 'user_logout'],	

		['GET', '/form_profil_particulier', 'User#formProfilParticulier', 'user_form_profil_particulier'],



	);