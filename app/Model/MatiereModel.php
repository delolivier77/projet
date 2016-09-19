<?php
namespace Model;
use \W\Model\Model;

class MatiereModel extends Model 
{

	public function __construct()
	{
		parent::__construct();
	    $this->setPrimaryKey('id_m');
	}
	

	public function findAllMatiere()
	{	
		$matiere = Model::findAll($orderBy = 'nom', $orderDir = 'ASC', $limit = null, $offset = null);
		return $matiere;
	}
}

?>