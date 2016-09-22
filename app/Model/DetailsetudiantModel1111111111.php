<?php
namespace Model;
use \W\Model\Model;

class DetailsetudiantModel extends Model 
{	
	public function ficheDetailsEtudiant($id)
	{

		$etudiant = Model::find($id);

		$detailsetudiant = $this->dbh->prepare("SELECT u.id_et, u.nom, u.prenom, ville, id_s_min, id_s_max, description, tarif, photo, type_rdv, ROUND(AVG(note), 1) as moyenne, COUNT(note) as nbrdevote

			FROM user as u, matiere as m, connaissance as c, etudiant as e LEFT JOIN commentaire as co ON e.id_et = co.id_et
			WHERE u.id_et = e.id_et
			AND e.id_et = c.id_et
			AND c.id_m = m.id_m
			AND ville = :ville
			AND c.id_m = :id_matiere
			AND id_s_min <= :id_scolarite
			AND id_s_max >= :id_scolarite
			GROUP BY u.id_et");
		
		 	$detailsetudiant->execute(array('ville' => $ville, 'id_matiere' => $id_matiere, 'id_scolarite' => $id_scolarite));

		 	$result = $detailsetudiant->fetchAll();
		 	return $result;

	}

}
