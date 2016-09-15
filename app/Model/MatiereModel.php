<?php
namespace Model;
use \W\Model\Model;

class MatiereModel extends Model 
{
	public function findAllNames()
	{	
		$recherches = $this->dbh->prepare("SELECT nom from matiere");
		$recherches->execute();
		$result = $recherches->fetchAll();
		/*$this->setTable('matiere');
		$recherches = Model::findAll($orderBy = 'id', $orderDir = 'ASC', $limit = null, $offset = null);*/
		return $result;
	}
	public function findByName($name)
	{
		$matiere = Model::search($name);
		return $matiere;
	}
}
?>