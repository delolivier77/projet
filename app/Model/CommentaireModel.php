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
        $result= $sql-> fetchAll();        return ($result);
    }
    public function findComs($id_et)
    {
        $recherches = $this->dbh->prepare("SELECT id_et, commentaire, date_commentaire FROM commentaire
            WHERE id_et = :id");
        
            $recherches->execute(array('id' => $id_et));

            $result = $recherches->fetchAll();
            return $result;
    }
    public function insert(!)
}
?>