<?php
    Class Compte{
		private int $id;
        private int $numCompte;
        private float $solde;
        private String $dateO;
        private String $dateC;
		private $db;

        public function __construct() {
            $this->db = new Database();
        }

		public function getAllComptes() {
			// permet d'obtenir l'instance de la connexion a la base de donnees
			$connexion = $this->db->getConnection();
			// represente la requete sql
			$query = "SELECT * FROM compte";
			// prepare la requete dans le cas d'une requete preparer
			$stmt = $connexion->prepare($query);
			// execute la requete
			$stmt->execute();
			// on recupere le resultat de la requete executer
			$result = $stmt->fetchAll();
			return $result;
		}

		public function addNewCompte() {
			try {
				$connexion = $this->db->getConnection();
				$query = "INSERT INTO compte(numCompte, solde, dateO, dateC) VALUES (:numCompte, :solde, :dateO, :dateC)";
				$statement = $connexion->prepare($query);
				$statement->bindParam("numCompte", $this->numCompte);
				$statement->bindParam("solde", $this->solde);
				$statement->bindParam("dateO", $this->dateO);
				$statement->bindParam("dateC", $this->dateC);
				$statement->execute();
				return true;
			} catch(Exception $e) {
				echo "Erreur : ".$e->getMessage();
			}
		}

		public function getCompteById(int $id) {
			$connexion = $this->db->getConnection();
			$query = "SELECT * FROM compte WHERE id =:id";
			$stmt = $connexion->prepare($query);
			$stmt->bindParam("id", $id);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_OBJ);
			$this->id = $result->id;
			$this->numCompte= $result->numCompte;
			$this->solde = $result->solde;
			$this->dateO = $result->dateO;
			$this->dateC = $result->dateC;
		}
		public function getDepotRetrait(int $id,$montant){
			$connexion = $this->db->getConnection();
			$query = "UPDATE compte SET solde=:s WHERE id =:id";
			$stmt = $connexion->prepare($query);
			$stmt->bindParam("id", $id);
			$stmt->bindParam("s", $montant);
			$stmt->execute();
			return $connexion->lastInsertId();
			
		}
	

		/**
	 * @return 
	 */
	
	public function getNumCompte(): int {
		return $this->numCompte;
	}

	/**
	 * @param int $numCompte 
	 * @return self
	 */
	public function setNumCompte(int $numCompte): self {
		$this->numCompte = $numCompte;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getSolde(): float {
		return $this->solde;
	}
	
	/**
	 * @param float $solde 
	 * @return self
	 */
	public function setSolde(float $solde): self {
		$this->solde = $solde;
		return $this;
	}

	/**
	 * @return
	 */
	public function getDateO(): string {
		return $this->dateO;
	}
	
	/**
	 * @param string $dateO 
	 * @return self
	 */
	public function setDateO(string $dateO): self {
		$this->dateO = $dateO;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getDateC(): string {
		return $this->dateC;
	}
	
	/**
	 * @param string $dateC 
	 * @return self
	 */
	public function setDateC(string $dateC): self {
		$this->dateC = $dateC;
		return $this;
	}

	

	/**
	 * @return 
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