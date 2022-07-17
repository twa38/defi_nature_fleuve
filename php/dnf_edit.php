<?php
session_start();

// include database and object files
include_once '../config/database.php';
include_once '../classes/fleuve_repo.php';
include_once '../classes/fleuve.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object Fleuve_repo
$fleuve_repo = new Fleuve_repo($db);
// query products
$data = $fleuve_repo->get_data($_POST['id']);
$row = $data->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/monProjet.css" />
        <title>Défi nature "Fleuves"</title>
    </head>
<body>
<h2>Modifier un fleuve</h2>
	<p>
		<form method="post" action="dnf_post_update.php">
			<label for="nom">Nom du fleuve : </label>
			<input type="text" name="nom" value="<?php echo $row->nom ?>" /><br />
			
			<label for="longueur">Longueur : </label>
			<input type="text" name="longueur" value="<?php echo $row->longueur ?>" /><br />
			
			<label for="debit">Débit : </label>
			<input type="text" name="debit" value="<?php echo $row->debit ?>"/><br />
			
			<label for="altitude">Altitude source : </label>
			<input type="text" name="altitude" value="<?php echo $row->altitude ?>" /><br />
			
			<label for="bassin">Bassin versant : </label>
			<input type="text" name="bassin" value="<?php echo $row->bassin ?>" /><br />
			
			<label for="pastille">Pastille : </label>
			<select name="pastille">
			<option value="<?php echo $row->pastille ?>"><?php echo $row->pastille ?></option>
			<option value="verte" class="custom" style="background:#21AF37">Verte</option>
			<option value="jaune" class="custom" style="background:#FFFF00">Jaune</option>
			<option value="orange" class="custom" style="background:#FFC300">Orange</option>
			<option value="rouge" class="custom" style="background:#FF0000">Rouge</option>
			</select><br />

			<textarea name="description" rows="10" cols="50" value="<?php echo $row->description ?>"><?php echo $row->description ?></textarea><br />
			<input type="hidden" name="id" value="<?php echo $row->id ?>" />
			<input type="submit" name="valider" value="Valider" />
			<input type="submit" value="Annuler" />
		</form>
	</p>
</body>
