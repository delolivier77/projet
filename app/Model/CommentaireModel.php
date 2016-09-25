<?php
namespace Model;
use \W\Model\Model;

class CommentaireModel extends Model{

	public function __construct() {
		parent::__construct();
		$this->setPrimaryKey('id_co');
	}

	/**
	* Permet de faire une requête complexe
	* @param $sql Requête a effectué
	* */
	public function query($sql){
		$sth = $this->dbh->prepare($sql);

		if(!$sth->execute()){
		return false;
		}

		return $sth->fetchAll(); 
	}

}