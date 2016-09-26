<?php 
namespace Model;
use \W\Model\Model;

class RechercheModel extends Model
{
	public function searchResult($ville, $id_matiere, $id_scolarite)
	{
		$recherches = $this->dbh->prepare("SELECT u.id_u, u.nom, u.prenom, ville, id_s_min, id_s_max, description, tarif, photo, type_rdv, ROUND(AVG(note), 1) as moyenne, COUNT(note) as nbrdevote

			FROM user as u, matiere as m, connaissance as c, etudiant as e LEFT JOIN commentaire as co ON e.id_et = co.id_et
			WHERE u.id_u = e.id_et
			AND e.id_et = c.id_et
			AND c.id_m = m.id_m
			AND ville = :ville
			AND c.id_m = :id_matiere
			AND id_s_min <= :id_scolarite
			AND id_s_max >= :id_scolarite
			GROUP BY u.id_u");
		
		 	$recherches->execute(array('ville' => $ville, 'id_matiere' => $id_matiere, 'id_scolarite' => $id_scolarite));

		 	$result = $recherches->fetchAll();
		 	return $result;
	}

		public function searchResultById($id)
	{
		$recherches = $this->dbh->prepare("SELECT u.id_u, u.nom, u.prenom, ville, id_s_min, id_s_max, description, tarif, photo, type_rdv, tel, email, niveau_etude, detail_dispo, ROUND(AVG(note), 1) as moyenne, COUNT(note) as nbrdevote, m.nom as matiere, smin.nom as scolmin, smax.nom as scolmax
			
			FROM user as u, matiere as m, connaissance as c, scolarite as smin, scolarite as smax, etudiant as e LEFT JOIN commentaire as co ON e.id_et = co.id_et
			WHERE u.id_u = e.id_et
			AND u.id_u = c.id_et
			AND c.id_m = m.id_m
			AND c.id_s_min = smin.id_s
			AND c.id_s_max = smax.id_s
			AND e.id_et = :id
			GROUP BY e.id_et");
		
		 	$recherches->execute(array('id' => $id));

		 	$result = $recherches->fetchAll();
		 	return $result;
	}
		public function findComs($id)
	{
		$recherches = $this->dbh->prepare("SELECT id_et, commentaire, date_commentaire FROM commentaire
			WHERE id_et = :id");
		
		 	$recherches->execute(array('id' => $id));

		 	$result = $recherches->fetchAll();
		 	return $result;
	}









/*SELECT id_et, COUNT(note) AS nbrdevote FROM commentaire GROUP BY id_et*/
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