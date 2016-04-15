<?php
	include("inc/inc.header.php");

	$sql = "SELECT * FROM spelers";
	$result = $conn->query($sql);
?>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Overzicht</h3>
						</div>
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Merk</th>
									<th>Model</th>
									<th>Capaciteit</th>
									<th>Prijs</th>
								</tr>
							</thead>
							<tbody>
<?php	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
?>
								<tr>
									<td><?= $row['id'] ?></td>
									<td><?= $row['merk'] ?></td>
									<td><?= $row['model'] ?></td>
									<td><?= $row['opslag'] ?> MB</td>
									<td>&euro; <?= $row['prijs'] ?></td>									
								</tr>
<?php			
		}
	}			
?>
							</tbody>
						</table>
					</div>
<?php			

			
	include("inc/inc.footer.php");	
?>