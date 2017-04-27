<?php
session_start();
include("db_con.php");
$username=$_SESSION["username"];
if ($username != "capo"){
	header("location:index.php");
}

$dda = $_POST["datada"];
$datada= date("Y-m-d", strtotime($dda));
$da = $_POST["dataa"];
$dataa = date("Y-m-d", strtotime($da));

$nome=$_POST["nome"];
$cognome=$_POST["cognome"];
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
			<h3 class="text-center">
				Conta Giorni
			</h3>
			<div class="row">
				<div class="col-md-4">
					<h4>
						Questi sono i giorni con gli orari selezionati
					</h4>
				</div>
				<div class="col-md-4">
			<table class="table">
				<thead>
					<tr>
						<th>
							N.
						</th>
						<th>
							Giorno
						</th>
						<th>
							Ora
						</th>
					</tr>
				</thead>
				<tbody>
				
<?php
//cerco i giorni e gli orari dei prof
$query = mysql_query();
$q ="SELECT bp.Data,bp.Ora FROM Badge_prof AS bp INNER JOIN Corpo_Docente AS cd ON bp.improntaid = cd.ImprontaID and cd.Nome='".$nome."' and cd.Cognome='".$cognome."' and bp.Data>='".$datada."' and bp.Data<='".$dataa."' ORDER BY bp.Data";
//echo $q;
$query = mysql_query($q);

$cont=1;
while($row = mysql_fetch_assoc($query)) {
        $giorno=$row["Data"];
        $ngiorno = date("d-m-Y", strtotime($giorno));
        if($cont%2==0){
        	echo "<tr><td> " . $cont. "</td><td> " . $ngiorno. "</td><td>". $row["Ora"]."</td></tr>";
	}
	else{
		echo "<tr class=\"active\"><td> " . $cont. "</td><td> " . $ngiorno. "</td><td>". $row["Ora"]."</td></tr>";
	}
	$cont++;
    }

?>
				</tbody>
			</table>
				</div>
				<div class="col-md-4">
					 
          				<a href="./logamm.php"       class="btn btn-default btn-block">Indietro</a>
					<a href="./logout.php"       class="btn btn-danger btn-block">Logout</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
