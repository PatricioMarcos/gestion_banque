<?php
    Class Database{
        
    private $connection;

    // Create the class constructor
    public function __construct() {
        try {
            // $dsn = "mysql:host=localhost;dbname=banque" ;
            $this->connection = new PDO("mysql:host=localhost;dbname=banque", "root", "");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully to the database!";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    

	/**
	 * @return mixed
	 */
	public function getConnection() {
		return $this->connection;
	}
    }

?>