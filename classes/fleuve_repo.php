<?php



class Fleuve_repo{
	
    // database connection and table name
    private $conn;
    private $table_name = "fleuve";
	
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read all products
	function readAll(){
	  
		// select all query
		$query = "SELECT * FROM " . $this->table_name;
	  
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	  
		// execute query
		$stmt->execute();
	  
		return $stmt;
	}
	
	// add a product
	function add($fleuve){
		
		$query = 'INSERT INTO ' . $this->table_name . ' (nom, longueur, debit, altitude, bassin, pastille, description) '
			. 'VALUES (:nom, :longueur, :debit, :altitude, :bassin, :pastille, :description)';
		$stmt = $this->conn->prepare($query);
		$stmt->execute($fleuve->get_data());
	}
	// modifie a fleuve
	function update($fleuve,$id){
		$query = 'UPDATE ' . $this->table_name . ' SET nom = :nom, longueur = :longueur, debit = :debit, altitude = :altitude, bassin = :bassin, pastille = :pastille, description = :description WHERE id = '. $id;
		$stmt = $this->conn->prepare($query);
		$stmt->execute($fleuve->get_data());
	}
	
	// Compter les fleuves
	function nb_fleuves(){
		$query = 'SELECT COUNT(*) as nb FROM ' . $this->table_name;
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$nb = $stmt->fetch(PDO::FETCH_ASSOC);
		return $nb['nb'];
	}
	
	// delete a fleuve
	function delete($id){
	$stmt = $this->conn->prepare('DELETE FROM '. $this->table_name . ' WHERE id = :id');
	$stmt->execute(['id' => $id,]) or die(print_r($this->conn->errorInfo()));
	$stmt->closeCursor();
	}

	function get_data($id){
		// select all query
		$query = "SELECT * FROM " . $this->table_name . " WHERE id=" . $id;
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		// execute query
		$stmt->execute();
		return $stmt;
	}
	
	// read one products
	function readOne(){
	  
		// select all query
		$query = "SELECT * FROM " . $this->table_name . " WHERE id=" . $this->id;
		//echo $query;
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	  
		// execute query
		$stmt->execute();

		// read data
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		$this->nom = $row->nom;
		$this->prenom = $row->prenom;
	}

	// create product
	function create(){
	  
		// query to insert record
		$query = "INSERT INTO
					" . $this->table_name . "
				SET
					nom=:nom, prenom=:prenom";
	  
		// prepare query
		$stmt = $this->conn->prepare($query);
	  
		// sanitize
		$this->nom=htmlspecialchars(strip_tags($this->nom));
		$this->prenom=htmlspecialchars(strip_tags($this->prenom));

		// bind values
		$stmt->bindParam(":nom", $this->nom);
		$stmt->bindParam(":prenom", $this->prenom);

		// execute query
		if($stmt->execute()){
			return true;
		}
	  
		return false;
		  
	}
}
?>