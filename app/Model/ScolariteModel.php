<?php
namespace Model;
use \W\Model\Model;

class ScolariteModel extends Model 
{
	public function findAllNames()
	{	
		$recherches = $this->dbh->prepare("SELECT nom from scolarite");
		$recherches->execute();
		$result = $recherches->fetchAll();
		/*$this->setTable('matiere');
		$recherches = Model::findAll($orderBy = 'id', $orderDir = 'ASC', $limit = null, $offset = null);*/
		return $result;
	}
}
?> 