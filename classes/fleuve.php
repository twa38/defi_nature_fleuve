<?php
class Fleuve{

    // object properties
    private $id;
    private $nom;
    private $longueur;
    private $debit;
    private $altitude;
    private $bassin;
    private $pastille;
    private $description;
	
	// constructor with $db as database connection
    public function __construct($data){
		$this->nom = $data['nom'];
		$this->longueur = (empty($data['longueur']) ? NULL : $data['longueur']);
		$this->debit = (empty($data['debit']) ? NULL : $data['debit']);
		$this->altitude = (empty($data['altitude']) ? NULL : $data['altitude']);
		$this->bassin = (empty($data['bassin']) ? NULL : $data['bassin']);
		$this->pastille = (empty($data['pastille']) ? NULL : $data['pastille']);
		$this->description = (empty($data['description']) ? NULL : $data['description']);
    }
	
	public function get_data(){
		return array(
			'nom' => $this->nom,
			'longueur' => $this->longueur,
			'debit' => $this->debit,
			'altitude' => $this->altitude,
			'bassin' => $this->bassin,
			'pastille' => $this->pastille,
			'description' => $this->description
			);

	}
}
