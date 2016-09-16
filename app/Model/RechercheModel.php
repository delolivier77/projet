<?php 
namespace Model;
use \W\Model\Model;

class RechercheModel extends Model
{
	public function searchResult($ville, $id_matiere, $id_scolarite)
	{
		$recherches = $this->dbh->prepare("SELECT u.nom, u.prenom, ville, id_s_min, id_s_max, description, tarif, photo, type_rdv, note

			FROM user as u, matiere as m, connaissance as c, etudiant as e LEFT JOIN commentaire as co ON e.id_et = co.id_et
			WHERE u.id_et = e.id_et
			AND e.id_et = c.id_et
			AND c.id_m = m.id_m
			AND ville = :ville
			AND c.id_m = :id_matiere
			AND id_s_min <= :id_scolarite
			AND id_s_max >= :id_scolarite");
		
		 	$recherches->execute(array('ville' => $ville, 'id_matiere' => $id_matiere, 'id_scolarite' => $id_scolarite));

		 	$result = $recherches->fetchAll();
		 	return $result;
	}
}



/*SELECT  u.nom, u.prenom, m.nom, ville, id_s_min, id_s_max

FROM user as u, etudiant as e, matiere as m, connaissance as c

WHERE u.id_et = e.id_et

AND e.id_et = c.id_et

AND c.id_m = m.id_m

AND ville = "Bordeaux"

AND m.id_m = 2

AND id_s_min <= 7

AND id_s_max >= 7*/