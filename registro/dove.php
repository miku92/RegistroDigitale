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
			<h3 class="text-center">
				Cerca il Prof.
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">

<?php
include("db_con.php");
$dow=date("w");
$nome=$_POST["nome"];
$cognome=$_POST["cognome"];
//cerco i giorni e gli orari dei prof
$query = mysql_query("SELECT od.* FROM Orario_Docenti AS od INNER JOIN Corpo_Docente AS cd ON od.username = cd.username and cd.Nome='".$nome."' and cd.Cognome='".$cognome."' and od.Giorno=".$dow);
//echo "CIAO";
$cont=1;
$ora=date("H");
$minuti=date("i");
while($row = mysql_fetch_assoc($query)) {
	if($ora<8 && $minuti<30){
		$out = "non c'è nessuno";
	} 
        else if($ora<9 && $minuti<30){
		$out = $row["PrimaOra"];
	}
	else if($ora<10 && $minuti<30){
		$out = $row["SecondaOra"];
	}
	else if($ora<11 && $minuti<30){
                $out = $row["TerzaOra"];
        }
	else if($ora<12 && $minuti<30){
                $out = $row["QuartaOra"];
        }
	else if($ora<13 && $minuti<30){
                $out = $row["QuintaOra"];
        }
	else if($ora>13 && $minuti>30){
                $out = "Siamo a casa";
        }
	$out=$row["TerzaOra"];
	//echo $row["PrimaOra"];
        $cont++;
        echo "<h4 class=\"text-center\">Il Prof. è in ".$out."</h4>";
}
//echo $_POST["nome"];
//echo $_POST["cognome"];


?>
</div>
		<div class="col-md-4">
		</div>
</div>
	<div class="row">
		<div class="col-md-4">
                </div>
                <div class="col-md-4">
	 	<a class="btn btn-default btn-block" href="./cercaprof.php">Nuova Ricerca</a>
                <a class="btn btn-default btn-block" href="./">Home</a>
		</div>
                <div class="col-md-4">
                </div>	
	</div>
</div>
</body>
</html>
