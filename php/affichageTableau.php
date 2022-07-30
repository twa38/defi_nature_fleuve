<?php

// include database and object files
include_once '../config/database.php';
include_once '../classes/fleuve_repo.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$fleuve_repo = new Fleuve_repo($db);

// query fleuve_repos
$stmt = $fleuve_repo->readAll();

?>
<table>
	<caption id="sectionTableau">Liste des <?php echo $fleuve_repo->nb_fleuves()?> fleuves </caption>
	<thead>
		<tr>
			<th>Nom</th>
			<th><a href="#sectionTableau">Longueur</a></th>
			<th>Débit</th>
			<th>Altitude source</th>
			<th>Bassin versant</th>
			<th>Pastille</th>
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