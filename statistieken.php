<?php
	include("inc/inc.header.php");

	$sql = "SELECT sum(voorraad) as voorraad, sum(voorraad * prijs) as waarde, round(avg(prijs),2) as gemiddelde FROM spelers";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
	$sql2 = "SELECT * FROM spelers";
	$result2 = $conn->query($sql2);
	
	$merk = "";
	$model = "";
	$opslag = "";
	$prijs = "";
	$prijsMB = 9999999;
	$prijsBest = 0;
	
	if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) {
			$prijsBest = $row2['prijs'] / $row2['opslag'];
			
			if ($prijsBest < $prijsMB) {
				$prijsBest = $prijsMB;
				$merk = $row2['merk'];
				$model = $row2['model'];
				$opslag = $row2['opslag'];
				$prijs = $row2['prijs'];
			}
		}
	}
		
?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Statistieken</h3>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" method="post" action="muteren.php">
								<div class="form-group">
									<label for="voorraad" class="col-sm-2 control-label">Voorraad</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="voorraad" value="<?= $row['voorraad'] ?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label for="waarde" class="col-sm-2 control-label">Waarde</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="waarde" value="&euro; <?= $row['waarde'] ?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label for="waarde" class="col-sm-2 control-label">Gemiddelde</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="waarde" value="&euro; <?= $row['gemiddelde'] ?>" disabled>
									</div>
								</div>
							</form>
							<p>Beste prijs per MB (prijs / capaciteit)</p>
							<form class="form-horizontal" method="post" action="muteren.php">
								<div class="form-group">
									<label for="voorraad" class="col-sm-2 control-label">Merk</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="voorraad" value="<?= $merk ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label for="voorraad" class="col-sm-2 control-label">Model</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="voorraad" value="<?= $model ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label for="voorraad" class="col-sm-2 control-label">Opslag</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="voorraad" value="<?= $opslag ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label for="voorraad" class="col-sm-2 control-label">Prijs</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="voorraad" value="&euro; <?= $prijs ?>" disabled>
									</div>
								</div>
							</form>							
						</div>
					</div>
<?php
	include("inc/inc.footer.php");	
?>