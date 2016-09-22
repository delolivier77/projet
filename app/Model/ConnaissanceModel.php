<?php
namespace Model;
use \W\Model\Model;



class ConnaissanceModel extends Model 
{
	public function connaissance($id_u)
	{	
		$connaissances = $this->dbh->prepare("SELECT e.id_et, c.id_s_min, c.id_s_max, s.id_s, s.nom
			FROM user as u, etudiant as e, connaissance as c, scolarite as s
			WHERE u.id_u = e.id_et
			AND e.id_et = c.id_et
			AND c.id_s_min = s.id_s
			");
		$connaissances->execute(array('id_s_min' => $id_s_min, 'id_s_max' => $id_s_max));

		$result = $connaissances->fetchAll();
		return $result;
	}
}
?>