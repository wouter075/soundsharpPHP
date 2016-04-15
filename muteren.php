<?php
	include("inc/inc.header.php");
	
	// Als er daadwerkelijk iemand op oplsaan heeft gedrukt, dan het formulier gaan verwerken.
	$id = "";
	$voorraad = "";
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		// Leeg fouten array aanmaken
		$fouten = array();
		
		// Variabelen ophalen
		$id = $_POST['id'];
		$voorraad = $_POST['voorraad'];
		
		// Controleren of ze numeriek zijn
		if (!is_numeric($id)) $fouten[] = "Het veld ID moet numeriek zijn!";
		if (!is_numeric($voorraad)) $fouten[] = "Het veld voorraad moet numeriek zijn!";
		
		// Controleren of het id daadwerkelijk bestaat:
		// Maar alleen als er nog geen fouten zijn:
		if (count($fouten) == 0) {
			$sql = "SELECT id FROM spelers WHERE id=" . $id;
			$result = $conn->query($sql);
			if ($result->num_rows == 0) $fouten[] = "Geen correct id opgegeven!";
		}			

		if (!count($fouten)) {
			// Hier gaan we updaten:
			$sql = "UPDATE spelers SET voorraad=" . $voorraad . " WHERE id=" . $id;

			if ($conn->query($sql) === TRUE) {
				echo '					<div class="alert alert-success" role="alert">' . PHP_EOL;
				echo "						De voorraad is aangepast!" . PHP_EOL;
				echo '					</div>' . PHP_EOL;
				
				// Leeg maken van variabelen
				$id = "";
				$voorraad = "";
			} else {
				// Fouten laten zien als het updaten niet gelukt is
				echo '					<div class="alert alert-danger" role="alert">' . PHP_EOL;
				echo "						Fout bij het updaten: " . $conn->error . PHP_EOL;
				echo '					</div>' . PHP_EOL;
			}

			
		} else {
			// Er zijn fouten.
			echo '					<div class="alert alert-warning" role="alert">' . PHP_EOL;
			foreach ($fouten as $fout) {
				echo "						". $fout . "<br />";
			}
			echo '					</div>' . PHP_EOL;
		}
	}
?>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Muteren</h3>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" method="post" action="muteren.php">
								<div class="form-group">
									<label for="id" class="col-sm-2 control-label">ID</label>
									<div class="col-sm-10">
										<input type="text" name="id" class="form-control" id="id" placeholder="ID" value="<?= $id ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="voorraad" class="col-sm-2 control-label">Voorraad</label>
									<div class="col-sm-10">
										<input type="text" name="voorraad" class="form-control" id="voorraad" placeholder="Voorraad" value="<?= $voorraad ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-default">Opslaan</button>
									</div>
								</div>								
							</form>							
						</div>
					</div>
<?php			
	include("inc/inc.footer.php");	
?>