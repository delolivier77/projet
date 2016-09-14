<?php
namespace Model;
use \W\Model\Model;

class RechercheModel extends Model 
{

	public function findAllMatieres()
	{	
		$recherches = $this->dbh->prepare("SELECT nom from matiere");
		$recherches->execute();
		$result = $recherches->fetchAll();
		/*$this->setTable('matiere');
		$recherches = Model::findAll($orderBy = 'id', $orderDir = 'ASC', $limit = null, $offset = null);*/
		return $result;
	}
	
}
?>