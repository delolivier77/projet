<?php
	
	$w_routes = array(
		/* PAGE D'ACCUEIL */
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/contact', 'Default#contact', 'contact'],
		['GET', '/cgu', 'Default#cgu', 'cgu'],

		/* ETUDIANTS */
		// ['GET', '/etudiant/[:id]', 'Detailsetudiant#details', 'detailsetudiant_detailsetudiant'],




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

		
	);