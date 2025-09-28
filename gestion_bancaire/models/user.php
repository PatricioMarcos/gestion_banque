<?php
    Class User{
        protected $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function ToDelete($codC,$table="client"){
            try {
               
                $connexion = $this->db->getConnection();
                $query = "DELETE FROM $table WHERE codC=:codC";
                $statement = $connexion->prepare($query);
                $statement->bindParam("codC",$codC);
                $statement->execute();
                return $connexion->lastInsertId();
            } catch(Exception $e) {
                echo "Erreur : ".$e->getMessage();
            }
        }
        public function ToUPDATE($codC,$nom,$prenom,$table="client"){
            try {
               
                $connexion = $this->db->getConnection();
                $query = "UPDATE $table SET nom=:nom, prenom=:prenom WHERE codC=:codC";
                $statement = $connexion->prepare($query);
                $statement->bindParam("codC",$codC);
                $statement->bindParam("nom",$nom);
                $statement->bindParam("prenom",$prenom);
                $statement->execute();
                return $connexion->lastInsertId();
            } catch(Exception $e) {
                echo "Erreur : ".$e->getMessage();
            }
        }
        public function ToDeleteGes($id,$table="gestionnaire"){
            try {
               
                $connexion = $this->db->getConnection();
                $query = "DELETE FROM $table WHERE id=:id";
                $statement = $connexion->prepare($query);
                $statement->bindParam("id",$id);
                $statement->execute();
                return $connexion->lastInsertId();
            } catch(Exception $e) {
                echo "Erreur : ".$e->getMessage();
            }
        }
        public function ToUPDATEGES($id,$nom,$prenom,$adresse,$telephone,$table="gestionaire"){
            try {
               
                $connexion = $this->db->getConnection();
                $query = "UPDATE $table SET nom=:nom, prenom=:prenom, adresse=:adresse, telephone=:telephone WHERE id=:id";
                $statement = $connexion->prepare($query);
                $statement->bindParam("id",$id);
                $statement->bindParam("nom",$nom);
                $statement->bindParam("prenom",$prenom);
                $statement->bindParam("adresse",$adresse);
                $statement->bindParam("telephone",$telephone);
                $statement->execute();
                return $connexion->lastInsertId();
            } catch(Exception $e) {
                echo "Erreur : ".$e->getMessage();
            }
        }
}

?>