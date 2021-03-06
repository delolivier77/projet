<?php
namespace Model;
use \W\Model\Model;

class EtudiantModel extends Model 
{
	public function __construct()
	{
		parent::__construct();
	    $this->setPrimaryKey('id_et');
	}

	// Requête SQL pour récupérer les derniers étudiants inscrits
	public function getLastStudents($limit = 8)
	{
		$statementLastStudents = $this->dbh->prepare("SELECT e.photo, u.nom, u.prenom, m.nom as matiere, e.ville, u.date_inscription
		FROM etudiant as e, user as u, connaissance as c, matiere as m		
		WHERE  u.id_u = e.id_et AND e.id_et = c.id_et AND c.id_m = m.id_m
		ORDER BY u.date_inscription DESC LIMIT $limit");

		$statementLastStudents->execute();

		return $statementLastStudents->fetchAll();
	}
	
}
?>