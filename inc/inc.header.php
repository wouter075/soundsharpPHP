<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mp3";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Steffan</title>
		
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>SoundSharp</h1>
					<div class="panel panel-success">
						<div class="panel-body text-center">
							<div class="btn-group" role="group" aria-label="...">
								<a href="index.php" type="button" class="btn btn-default">SoundSharp</a>
								<a href="overzicht.php" type="button" class="btn btn-default">Overzicht</a>
								<a href="voorraad.php" type="button" class="btn btn-default">Voorraad</a>
								<a href="muteren.php" type="button" class="btn btn-default">Muteren</a>
								<a href="toevoegen.php" type="button" class="btn btn-default">Toevoegen</a>
								<a href="statistieken.php" type="button" class="btn btn-default">Statistieken</a>	
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">