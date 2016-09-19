<?php
namespace Model;
use \W\Model\Model;

class ParticulierModel extends Model 
{
	public function __construct()
	{
		parent::__construct();
	    $this->setPrimaryKey('id_p');
	}
	
}
?>