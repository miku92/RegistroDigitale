<?php
session_start();
if($_SESSION["logged"]==false && $_SESSION["username"]!="capo"){
	$_POST["connesso"]="false";
        $_SESSION=$_POST;
        header("location:./index.php");
}
?>
<?php
if($_GET["action"]=="registration" && $_GET["errore"]="Non hai compilato tutti i campi obbligatori"){
	echo "<div class=\"alert alert-danger\">  <strong>Attrenzione</strong> Tutti i campi sono obbligatori</div>";
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
				Inserimento nuovo docente
			</h3>
		</div>
	</div>
	<div class="row formNuovoD">
    <form class="form-horizontal" role="form" action="./hidereg.php" method="POST" id="form1">
		<div class="col-md-6">
				<div class="form-group">

					<label for="inputEmail3" class="col-sm-2 control-label">
						Nome
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nome" name="nome" />
					</div>
				</div>
				<div class="form-group">

					<label for="inputPassword3" class="col-sm-2 control-label">
						Cognome
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="cognome" name="cognome" />
					</div>
				</div>
		</div>
		<div class="col-md-6">
				<div class="form-group">

					<label for="inputEmail3" class="col-sm-2 control-label">
						Username
					</label>
					<div class="col-sm-10">
						<input type="text" name="username" class="form-control" id="username" />
					</div>
				</div>
				<div class="form-group">

					<label for="inputPassword3" class="col-sm-2 control-label">
						Password
					</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="pass" name="password" />
					</div>
				</div>
		</div>
    <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-lg btn-block btn-default" form="form1" value="Submit">
            Continua registrazione su lettore
          </button>
        </div>

        <div class="col-md-4">
        </div>
      </div>
    </div>
	</div>
</form>
	</div>
</div>
</body>
</html>
