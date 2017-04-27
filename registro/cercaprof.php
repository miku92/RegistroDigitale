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
    <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootst/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootst/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">
				Cerca Prof.
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h4>
				Qui puoi cercare dov'è il professore, tramite il nome
			</h4>
		</div>
		<div class="col-md-6">
<form action="./dove.php"  method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Nome</label>
    <input type="text" class="form-control" name="nome" id="nome" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Cognome</label>
    <input type="text" class="form-control" name="cognome" id="cognome" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-default">Cerca</button>

</form>
</div>
	</div>
</div>
</body>
</html>
