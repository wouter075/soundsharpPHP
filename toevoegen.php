<?php
	include("inc/inc.header.php");
	
	// Als er daadwerkelijk iemand op oplsaan heeft gedrukt, dan het formulier gaan verwerken.
	$merk = "";
	$model = "";
	$opslag = "";
	$prijs = "";
	
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		// Leeg fouten array aanmaken
		$fouten = array();
		
		// Variabelen ophalen
		$merk = $_POST['merk'];
		$model = $_POST['model'];
		$opslag = $_POST['opslag'];
		$prijs = $_POST['prijs'];
		
		// Controleren of ze numeriek zijn
		if (strlen($merk) < 2) $fouten[] = "Het veld merk moet minimaal twee characters zijn";
		if (strlen($model) < 2) $fouten[] = "Het veld model moet minimaal twee characters zijn";
		if (!is_numeric($opslag)) $fouten[] = "Het veld capaciteit moet numeriek zijn!";
		if (!is_numeric($prijs)) $fouten[] = "Het veld prijs moet numeriek zijn!";
		

		if (!count($fouten)) {
			// Hier gaan we toevoegen:
			$sql = "INSERT INTO spelers (merk, model, opslag, prijs, voorraad) VALUES ('" . $merk . "', '" . $model . "', $opslag, $prijs, 500)";
			
			if ($conn->query($sql) === TRUE) {
				echo '					<div class="alert alert-success" role="alert">' . PHP_EOL;
				echo "						De mp3speler is toegevoegd!" . PHP_EOL;
				echo '					</div>' . PHP_EOL;
				
				// Leeg maken van variabelen
				$merk = "";
				$model = "";
				$opslag = "";
				$prijs = "";
			} else {
				// Fouten laten zien als het updaten niet gelukt is
				echo '					<div class="alert alert-danger" role="alert">' . PHP_EOL;
				echo "						Fout bij het toevoegen: " . $conn->error . PHP_EOL;
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
							<h3 class="panel-title">Toevoegen</h3>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" method="post" action="toevoegen.php">
								<div class="form-group">
									<label for="merk" class="col-sm-2 control-label">Merk</label>
									<div class="col-sm-10">
										<input type="text" name="merk" class="form-control" id="merk" placeholder="Merk" value="<?= $merk ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="model" class="col-sm-2 control-label">Model</label>
									<div class="col-sm-10">
										<input type="text" name="model" class="form-control" id="model" placeholder="Model" value="<?= $model ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="opslag" class="col-sm-2 control-label">Capaciteit</label>
									<div class="col-sm-10">
										<input type="text" name="opslag" class="form-control" id="opslag" placeholder="Capaciteit" value="<?= $opslag ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="prijs" class="col-sm-2 control-label">Prijs</label>
									<div class="col-sm-10">
										<input type="text" name="prijs" class="form-control" id="prijs" placeholder="Prijs" value="<?= $prijs ?>">
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