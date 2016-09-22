<?php 
namespace Model;
use \W\Model\Model;

class StudentModel extends Model 
{


	public function getLastStudents($limit = 3)
	{

		// 2 . Requête SQL pour récupérer les commentaires associés au film
		$statementLastStudents = $this->dbh->prepare("SELECT e.photo, u.nom, u.prenom, m.nom as matiere, e.ville, u.date_inscription
		FROM etudiant as e, user as u, connaissance as c, matiere as m		
		WHERE  u.id_u = e.id_et AND e.id_et = c.id_et AND c.id_m = m.id_m
		ORDER BY u.date_inscription DESC LIMIT $limit");

		$statementLastStudents->execute();

		// 3 . Nous retournons les données compactées dans un seul array avec array_merge()
		return $statementLastStudents->fetchAll();
	}



}