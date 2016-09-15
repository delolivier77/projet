<?php
namespace Model;
use \W\Model\Model;

class ScolariteModel extends Model 
{

	public function findAllScolarite()
	{	
		$scolarite = Model::findAll($orderBy = 'name', $orderDir = 'ASC', $limit = null, $offset = null);
		return $scolarite;
	}
}

?>