<?php
namespace Model;
use \W\Model\Model;

class CommentaireModel extends Model 
{
	public function __construct()
	{
		parent::__construct();
	    $this->setPrimaryKey('id_co');
	}
	
}
?>