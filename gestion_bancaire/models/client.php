<?php
    Class Client extends User{
		private int $id;
        private String $nom;
        private String $prenom;
      
	
        public function __construct() {
            parent::__construct();
        }

		public function getClientByNom(string $nom, $prenom) {
			$connexion = $this->db->getConnection();
			$query = "SELECT * FROM client WHERE nom or prenom =:es";
			$stmt = $connexion->prepare($query);
			$stmt->bindParam("es", $nom,$prenom);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			return $result;
		}
		public function getAllClients() {
			// permet d'obtenir l'instance de la connexion a la base de donnees
			$connexion = $this->db->getConnection();
			// represente la requete sql
			$query = "SELECT * FROM client";
			// prepare la requete dans le cas d'une requete preparer
			$stmt = $connexion->prepare($query);
			// execute la requete
			$stmt->execute();
			// on recupere le resultat de la requete executer
			$result = $stmt->fetchAll();
			return $result;
		}
		public function addNewClient() {
			try {
				$connexion = $this->db->getConnection();
				$query = "INSERT INTO client(nom, prenom) VALUES (:nom, :prenom)";
				$statement = $connexion->prepare($query);
				$statement->bindParam("nom", $this->nom);
				$statement->bindParam("prenom", $this->prenom);
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
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
}

?>