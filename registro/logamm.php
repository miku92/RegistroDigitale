<?php
session_start();
if($_SESSION["logged"]==false){	
	$_POST["connesso"]="false";
	$_SESSION=$_POST;
	header("location:./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Registro Digitale</title>

    <!-- Bootstrap core CSS -->
    <link href="bootst/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootst/css/miostile.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="testoAmm text-center">
				Salve Amministratore 
			</h3>
		</div>
                <div class="row">
		<div class="col-md-12">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-4">
					 <a href="./registrazione.php"       class="btn btn-default btn-block">Registra Prof</a>
				</div>
				<div class="col-md-4">
					 
				<a href="./sceglidateeprof.php"       class="btn btn-default btn-block">Conta Giorni</a>
				</div>
				<div class="col-md-4">
					 
					<button type="button" class="btn btn-default btn-block">
						Elimina Prof
					</button>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-8">
				</div>
				<div class="col-md-4">
					 <a href="./logout.php"       class="btn btn-danger">Logout</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
