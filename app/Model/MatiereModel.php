<?php
namespace Model;
use \W\Model\Model;

class MatiereModel extends Model 
{

	public function findAllMatiere()
	{	
		$movies = Model::findAll($orderBy = 'name', $orderDir = 'ASC', $limit = null, $offset = null);
		return $matiere;
	}
}

?>