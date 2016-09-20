<?php
	
	$w_routes = array(
		
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/recherche', 'Recherche#recherche', 'recherche_recherche'],
		['POST', '/searchresult', 'Recherche#result', 'recherche_result'],
		['GET', '/etudiant/[id_et]', 'Recherche#ficheetudiant', 'ficheetudiant_ficheetudiant'],
	);