<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/recherche', 'Recherche#recherche', 'recherche_recherche'],
		['POST', '/searchresult', 'Recherche#result', 'recherche_result']
	);