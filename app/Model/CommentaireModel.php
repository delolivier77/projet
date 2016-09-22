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

	public function avgNoteEtudiant($id)
	{
		$sql = $this->dbh->prepare("SELECT ROUND(AVG(note),1) as 'avg', COUNT(id_et) as 'count' FROM `commentaire` where id_et = :id");
		$sql->execute(array('id' => $id));
		$result= $sql-> fetchAll();

		return ($result);
	}
	
}
?>