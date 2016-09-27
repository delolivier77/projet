<?php
namespace Model;
use \W\Model\Model;

class ScolariteModel extends Model 
{

	public function __construct()
	{
		parent::__construct();
	    $this->setPrimaryKey('id_s');
	}
	
	// permet tout le contenu de la table 'scolarite'
	public function findAllScolarite()
	{	
		$scolarite = Model::findAll($orderBy = 'id_s', $orderDir = 'ASC', $limit = null, $offset = null);
		return $scolarite;
	}

	// fonction de recherche dans la table utilise un '=' plutot qu'un 'like'
	public function findWhere(array $search, $operator = 'OR', $stripTags = true)
	{

		// Sécurisation de l'opérateur
		$operator = strtoupper($operator);
		if($operator != 'OR' && $operator != 'AND'){
			die('Error: invalid operator param');
		}

        $sql = 'SELECT * FROM ' . $this->table.' WHERE';
                
		foreach($search as $key => $value){
			$sql .= " $key = :$key ";
			$sql .= $operator;
		}
		// Supprime les caractères superflus en fin de requète
		if($operator == 'OR') {
			$sql = substr($sql, 0, -3);
		}
		elseif($operator == 'AND') {
			$sql = substr($sql, 0, -4);
		}

		$sth = $this->dbh->prepare($sql);
		
		foreach($search as $key => $value){
			$value = ($stripTags) ? strip_tags($value) : $value;
			$sth->bindValue(':'.$key, $value);
		}
		if(!$sth->execute()){
			return false;
		}
        return $sth->fetchAll();
	}

	public function findAllNames()
	{	
		$recherches = $this->dbh->prepare("SELECT nom from scolarite");
		$recherches->execute();
		$result = $recherches->fetchAll();
		/*$this->setTable('matiere');
		$recherches = Model::findAll($orderBy = 'id', $orderDir = 'ASC', $limit = null, $offset = null);*/
		return $result;
	}
	public function findByName($name)
	{
		$scolarite = Model::search($name);
		return $scolarite;
	}


}

?>