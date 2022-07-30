<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/monProjet.css" />
        <title>Défi nature "Fleuves"</title>
    </head>
<body>
<script LANGUAGE="JavaScript" src="script/script.js"></script>
<?php

// include database and object files
include_once 'config/database.php';
include_once 'classes/fleuve_repo.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$fleuve_repo = new Fleuve_repo($db);

// query fleuve_repos
if(isset($_GET['colonne'])==false or $_GET['colonne']=='nom'){
	$colonne = 'nom';
	$ordre = 'ASC';
}
else{
	$colonne = $_GET['colonne'];
	$ordre = 'DESC';

}
$stmt = $fleuve_repo->readAllOrderBy($colonne,$ordre);

?>
<header>
<h1>Base de données défi nature<br /></h1>
</header>

<div id="conteneur">

	<!-- Formulaire ajout fleuve -->
	<div class="formulaire">
		<p>
			<form name="ajoutFleuve" method="post" onsubmit="return verifFormulaire()" action="php/post_new_fleuve.php">
				<h2>Ajouter un fleuve<br /></h2>
				<label for="nom">Nom du fleuve : </label>
				<input type="text" name="nom" /><br />
				
				<label for="longueur">Longueur : </label>
				<input type="text" name="longueur" /><br />
				
				<label for="debit">Débit : </label>
				<input type="text" name="debit"/><br />
				
				<label for="altitude">Altitude source : </label>
				<input type="text" name="altitude" /><br />
				
				<label for="bassin">Bassin versant : </label>
				<input type="text" name="bassin" /><br />
				
				<label for="pastille">Pastille : </label>
				<select name="pastille">
				<option value="">-- Choisir une couleur --</option>
				<option value="verte" style="background:#21AF37">Verte</option>
				<option value="jaune" class="custom" style="background:#FFFF00">Jaune</option>
				<option value="orange" class="custom" style="background:#FFC300">Orange</option>
				<option value="rouge" class="custom" style="background:#FF0000">Rouge</option>
				</select><br />

				<textarea name="description" rows="10" cols="50" placeholder="Description..."></textarea><br />
				<input type="submit" value="Valider" name="Valider" />
			</form>
		</p>
	</div>
	
	<!-- Image de fleuve -->
	<div class="image">
	    <img src="images/image_fleuve_mini.jpg"/>
	</div>

	<!-- Tableau des fleuves -->
	<div class="tableau">
		<table>
			<caption id="sectionTableau">Liste des <?php echo $fleuve_repo->nb_fleuves()?> fleuves </caption>
			<thead>
				<tr>
					<th><a href="index.php?colonne=nom#sectionTableau">Nom</a></th>
					<th><a href="index.php?colonne=longueur#sectionTableau">Longueur</a></th>
					<th><a href="index.php?colonne=debit#sectionTableau">Débit</a></th>
					<th><a href="index.php?colonne=altitude#sectionTableau">Altitude source</a></th>
					<th><a href="index.php?colonne=bassin#sectionTableau">Bassin versant</a></th>
					<th><a href="index.php?colonne=pastille#sectionTableau">Pastille</a></th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
			<?php
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				extract($row);
				?>				
				<tr>				
					<th><?php echo $row['nom']; ?></td>
					<td><?php echo $row['longueur']; ?></td>
					<td><?php echo $row['debit']; ?></td>
					<td><?php echo $row['altitude']; ?></td>
					<td><?php echo $row['bassin']; ?></td>
					<td><?php echo $row['pastille']; ?></td>
					<td><?php echo $row['description']; ?></td>
					<td>
					<form method="post" id="modifier" action="php/dnf_edit.php"></form>
					<form method="post" id="delete" action="php/delete_fleuve.php"></form>
					<button form="modifier" type="submit" name="id" value="<?php echo $row['id']?>">Modifier</button><br />
					<button form="delete" type="submit" name="id" value="<?php echo $row['id']?>" onClick="return confirmSuppr()">Supprimer</button>
					</td>
				</tr>
				
			<?php
			}
			?>
			</tbody>
			<tfoot>
				<tr>
				  <th scope="row" colspan="2">Total fleuves</th>
				  <td colspan="2"><?php echo $fleuve_repo->nb_fleuves()?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
</body>


