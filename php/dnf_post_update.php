<?php
session_start();

// si click sur bouton valider on update la base
if (isset($_POST['valider'])) {

	// include database and object files
	include_once '../config/database.php';
	include_once '../classes/fleuve.php';
	include_once '../classes/fleuve_repo.php';

	// initialize object Fleuve
	$data = $_POST;
	$id = $_POST['id'];
	$fleuve = new Fleuve($data);

	// instantiate database and product object
	$database = new Database();
	$db = $database->getConnection();

	// initialize object Fleuve_repo
	$fleuve_repo = new Fleuve_repo($db);
	// query products
	$fleuve_repo->update($fleuve,$id);
}

header('Location: ../index.php#sectionTableau');
