<?php
	include("inc/inc.header.php");

	$sql = "SELECT id, voorraad FROM spelers";
	$result = $conn->query($sql);
?>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Voorraad</h3>
						</div>
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Voorraad</th>
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
									<td><?= $row['voorraad'] ?></td>									
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