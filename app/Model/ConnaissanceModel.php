<?php
namespace Model;
use \W\Model\Model;

class ConnaissanceModel extends Model 
{
	public function __construct()
	{
		parent::__construct();
	    $this->setPrimaryKey('id_cn');
	}
	
}
?>