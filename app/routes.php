<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		/* inscription utilisateur dans la BDD*/
		['GET', '/inscription_etudiant', 'User#inscriptionEtudiant', 'user_inscription_etudiant'],
		['POST', '/adduser', 'User#addUserEtudiant', 'user_add_user_etudiant'],
	);