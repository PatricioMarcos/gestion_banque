<?php
    Class Gestionaire extends User {
        private String $nom;
        private String $prenom;
        private String $telephone;
        private String $adresse;
        
	
        public function __construct() {
            parent::__construct();
        }
		public function getAllGestionaires() {
			// permet d'obtenir l'instance de la connexion a la base de donnees
			$connexion = $this->db->getConnection();
			// represente la requete sql
			$query = "SELECT * FROM gestionaire";
			// prepare la requete dans le cas d'une requete preparer
			$stmt = $connexion->prepare($query);
			// execute la requete
			$stmt->execute();
			// on recupere le resultat de la requete executer
			$result = $stmt->fetchAll();
			return $result;
		}
		public function addNewGestionaire() {
			try {
				$connexion = $this->db->getConnection();
				$query = "INSERT INTO gestionaire(nom, prenom,adresse,telephone) VALUES (:nom, :prenom,:adresse,:telephone)";
				$statement = $connexion->prepare($query);
				$statement->bindParam("nom", $this->nom);
				$statement->bindParam("prenom", $this->prenom);
                $statement->bindParam("adresse", $this->adresse);
                $statement->bindParam("telephone", $this->telephone);
				$statement->execute();
				return true;
			} catch(Exception $e) {
				echo "Erreur : ".$e->getMessage();
			}
		}
    
	/**
	 * @return string
	 */
	public function getNom(): string {
		return $this->nom;
	}
	
	/**
	 * @param string $nom 
	 * @return self
	 */
	public function setNom(string $nom): self {
		$this->nom = $nom;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getPrenom(): string {
		return $this->prenom;
	}
	
	/**
	 * @param string $prenom 
	 * @return self
	 */
	public function setPrenom(string $prenom): self {
		$this->prenom = $prenom;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getTelephone(): string {
		return $this->telephone;
	}
	
	/**
	 * @param string $telephone 
	 * @return self
	 */
	public function setTelephone(string $telephone): self {
		$this->telephone = $telephone;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getAdresse(): string {
		return $this->adresse;
	}
	
	/**
	 * @param string $adresse 
	 * @return self
	 */
	public function setAdresse(string $adresse): self {
		$this->adresse = $adresse;
		return $this;
	}
}

?>