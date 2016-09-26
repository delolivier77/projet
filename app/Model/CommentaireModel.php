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
        $recherches = $this->dbh->prepare("SELECT id_co, c.id_p, id_et, note, commentaire, date_commentaire, p.id_p, u.id_u, u.prenom 
            FROM commentaire as c, particulier as p, user as u 
            WHERE c.id_p = p.id_p 
            AND p.id_p = u.id_u
            AND c.id_et = :id");
        
            $recherches->execute(array('id' => $id_et));

            $result = $recherches->fetchAll();
            return $result;
    }
/*    public function insert()
    {
        $addcom = Model::insert()
        return $addcom;
    }*/
}
?>