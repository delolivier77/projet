<?php
namespace Model;
use \W\Model\Model;

class MatiereModel extends Model 
{

	public function findAllMatiere()
	{	
		$matiere = Model::findAll($orderBy = 'nom', $orderDir = 'ASC', $limit = null, $offset = null);
		return $matiere;
	}
}

?>