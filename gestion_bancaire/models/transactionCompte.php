<?php
Class TransactionCompte{
    private int $id;
    private float $solde;
    private Compte $compte;
    private Transaction $transaction;



    private $db;
	
    public function __construct() {
        $this->db = new Database();
		$this->compte = new Compte();
		$this->transaction= new Transaction();
    }

	public function addTransactionCompte($idTransaction) {
		try {
			
			$idCompte = $this->compte->getId();
			$connexion = $this->db->getConnection();
			$query = "INSERT INTO transactioncompte(compte,transactionc, solde) VALUES (:compte,:transactionc, :solde)";
			$statement = $connexion->prepare($query);
			$statement->bindParam("solde", $this->solde);
			$statement->bindParam("compte", $idCompte);
			$statement->bindParam("transactionc", $idTransaction);
			$statement->execute();
			$this->id = $connexion->lastInsertId();
		} catch(Exception $e) {
			echo "Erreur : ".$e->getMessage();
		}
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
	
	/**
	 * @return float
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
	 * @return Transaction
	 */
	public function getTransaction(): Transaction {
		return $this->transaction;
	}
	
	/**
	 * @param Transaction $transaction 
	 * @return self
	 */
	public function setTransaction(Transaction $transaction): self {
		$this->transaction = $transaction;
		return $this;
	}
} {

}