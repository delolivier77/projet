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
	

	public function findAllScolarite()
	{	
		$scolarite = Model::findAll($orderBy = 'id_s', $orderDir = 'ASC', $limit = null, $offset = null);
		return $scolarite;
	}
}

?>