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
		$sql = $this->dbh->prepare("SELECT ROUND(AVG(note),1) as 'avg' FROM commentaire where id_et = :id");
		$sql->execute(array('id' => $id));
		$result= $sql-> fetchAll();

		$sql2 = $this->dbh->prepare("SELECT COUNT(commentaire) as 'count' FROM commentaire as c where id_et = :id and c.commentaire != '' ");
		$sql2->execute(array('id' => $id));
		$result2= $sql2-> fetchAll();
	
		$res['avg'] = $result[0]['avg'];
		$res['count'] = $result2[0]['count'];

		return ($res);
	}


	public function findCommentsByParticulier($id)
	{
		$sql = $this->dbh->prepare("SELECT * FROM commentaire AS c, user as u where c.id_et = u.id_u AND c.id_p = :id");
		$sql->execute(array('id' => $id));
		$result= $sql-> fetchAll();
		return ($result);	
	}

	public function findCommentsById($id)
	{
		$sql = $this->dbh->prepare("SELECT * FROM commentaire AS c, user as u where c.id_et = u.id_u AND c.id_co = :id");
		$sql->execute(array('id' => $id));
		$result= $sql-> fetchAll();
		return ($result);	
	}


	public function findWhere(array $search, $operator = 'OR', $stripTags = true)
	{

		// Sécurisation de l'opérateur
		$operator = strtoupper($operator);
		if($operator != 'OR' && $operator != 'AND'){
			die('Error: invalid operator param');
		}

        $sql = 'SELECT * FROM ' . $this->table.' WHERE';
                
		foreach($search as $key => $value){
			$sql .= " $key = :$key ";
			$sql .= $operator;
		}
		// Supprime les caractères superflus en fin de requète
		if($operator == 'OR') {
			$sql = substr($sql, 0, -3);
		}
		elseif($operator == 'AND') {
			$sql = substr($sql, 0, -4);
		}

		$sth = $this->dbh->prepare($sql);
		
		foreach($search as $key => $value){
			$value = ($stripTags) ? strip_tags($value) : $value;
			$sth->bindValue(':'.$key, $value);
		}
		if(!$sth->execute()){
			return false;
		}
        return $sth->fetchAll();
	}
	
}
?>