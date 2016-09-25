<?php
namespace Model;
use \W\Model\Model;

class ScolariteModel extends Model{
	public function __construct() {
		parent::__construct();
		$this->setPrimaryKey('id_s');
	}
}