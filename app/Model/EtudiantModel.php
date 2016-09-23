<?php 
namespace Model;
use \W\Model\Model;

class EtudiantModel extends Model 
{
	public function __construct();
	{
		parent::__construct();
		$this->setPrimaryKey('id_et');
	}
}
?>
