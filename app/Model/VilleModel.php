<?php
namespace Model;
use \W\Model\Model;

class VilleModel extends Model 
{
	public function findByName($name)
	{
		$ville = Model::search([$name]);
		return $ville;
	}
}
?>