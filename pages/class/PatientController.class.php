<?php

class PatientController
{

  private $_db;

   public function __construct($db)
   {
       $this->_db=$db;
   }

   public function ajouter(Patient $Patient)
   {
     $sql=$this->_db->prepare("INSERT INTO Patient SET nom=:nom, prenom=:prenom, genre=:genre, telephone=:telephone, adresse=:adresse, age=:age, 
     g_sanguin=:g_sanguin, m_actuelle=:m_actuelle, antecedant=:antecedant");
     $sql->bindValue(":nom",$Patient->getNom());
     $sql->bindValue(":prenom",$Patient->getPrenom());
     $sql->bindValue(":genre",$Patient->getGenre());
     $sql->bindValue(":telephone",$Patient->getTelephone());
     $sql->bindValue(":adresse",$Patient->getAdresse());
     $sql->bindValue(":age",$Patient->getAge());
     $sql->bindValue(":g_sanguin",$Patient->getG_sanguin());
     $sql->bindValue(":m_actuelle",$Patient->getM_actuelle());
     $sql->bindValue(":antecedant",$Patient->getAntecedant());
     $sql->execute();
   }

   public function get($id)
   {
     $sql=$this->_db->query("SELECT * FROM Patient WHERE id=".$id);
     $row=$sql->fetch();
     $sql->closeCursor();
     $p=new Patient($row);
     return $p;
   }

   public function supprimer($id)
   {
     $sql=$this->_db->exec("DELETE  FROM Patient WHERE id=".$id);
     return $sql>0;
   }
   
   public function afficher_list()
   {
     $Patient=[];
     $sql=$this->_db->query("SELECT * FROM Patient ORDER BY nom, prenom ASC");
     $rows=$sql->fetchAll();
     $sql->closeCursor();
     
     foreach ($rows as $row) {

     $Patient[]=new Patient($row);
     }
     return $Patient;
   }

 public function modifier(Patient $Patient)
   {
    //echo $patient->getId();
     try{ 
            $sql=$this->_db->prepare("UPDATE  Patient SET nom=:nom, prenom=:prenom, genre=:genre, telephone=:telephone, adresse=:adresse, age=:age, 
            g_sanguin=:g_sanguin, m_actuelle=:m_actuelle, antecedant=:antecedant WHERE id=:id");
            $d=$sql->execute(array('nom'=>$Patient->getNom(),
            'prenom'=>$Patient->getPrenom(),
            'genre'=>$Patient->getGenre(),
            'telephone'=>$Patient->getTelephone(),
            'adresse'=>$Patient->getAdresse(),
            'age'=>$Patient->getAge(),
            'groupeSanguin'=>$Patient->getGroupeSanguin(),
            'm_actuelle'=>$Patient->getM_actuelle(),
            'antecedant'=>$Patient->getAntecedant(),
            'id'=>$Patient->getId()
          ));  
     } catch (Exception $ex) {
         echo $ex->getMessage();
     }
   }
}
