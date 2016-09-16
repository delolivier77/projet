<?php
namespace Model;
use \W\Model\Model;

class ScolariteModel extends Model 
{

	public function findAllScolarite()
	{	
		$scolarite = Model::findAll($orderBy = 'id_s', $orderDir = 'ASC', $limit = null, $offset = null);
		return $scolarite;
	}
}

?>