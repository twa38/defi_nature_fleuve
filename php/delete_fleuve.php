<?php
session_start();

// include database and object files
include_once '../config/database.php';
include_once '../classes/fleuve_repo.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object Fleuve_repo
$fleuve_repo = new Fleuve_repo($db);
// query products
$fleuve_repo->delete($_POST['id']);

header('Location: ../index.php');
