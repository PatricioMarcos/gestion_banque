<?php
   Class Transaction{
	private int $id;
	private String $date;
	private float $montant;
    private Compte $compte;
	private $db;
	
    public function __construct() {
        $this->db = new Database();
		$this->compte = new Compte();
		
    }

	public function addTransaction() {
		try {
			$idCompte = $this->compte->getId();
			$connexion = $this->db->getConnection();
			$query = "INSERT INTO transactionc(date_trans, montant,compte) VALUES (:date_trans, :montant,:compte)";
			$statement = $connexion->prepare($query);
			$statement->bindParam("date_trans", $this->date);
			$statement->bindParam("montant", $this->montant);
			$statement->bindParam("compte", $idCompte);
			$statement->execute();
			return $connexion->lastInsertId();
		} catch(Exception $e) {
			echo "Erreur : ".$e->getMessage();
		}
	}
   
	/**
	 * @return float
	 */

	
	/**
	 * @return Compte
	 */
	public function getCompte(): Compte {
		return $this->compte;
	}
	
	/**
	 * @param Compte $compte 
	 * @return self
	 */
	public function setCompte(Compte $compte): self {
		$this->compte = $compte;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDate(): string {
		return $this->date;
	}
	
	/**
	 * @param string $date 
	 * @return self
	 */
	public function setDateTransac(string $date): self {
		$this->date = $date;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getMontant(): float {
		return $this->montant;
	}
	
	/**
	 * @param float $montant 
	 * @return self
	 */
	public function setMontant(float $montant): self {
		$this->montant = $montant;
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