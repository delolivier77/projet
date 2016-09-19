<?php
namespace Model;
use \W\Model\Model;

class EnfantModel extends Model 
{
	public function __construct()
	{
		parent::__construct();
	    $this->setPrimaryKey('id_en');
	}
	
}
?>