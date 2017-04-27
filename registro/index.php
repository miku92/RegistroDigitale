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

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Registro Digitale</a>
          </div>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="login.php">Login</a></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
     <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
        <div class="container-fluid">
	  <div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				 </div>
				   <div class="col-md-4">
					<h1 class="text-center testoCentrale"> Benvenuto</h1>
				   </div>
				 <div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
                                <div class="col-md-4">
                                </div>
                                        <div class="col-md-4">
                                                <p class="quantiprof text-center center-block">Al momento ci sono 12 prof.</p>
                                        </div>
                                <div class="col-md-4">
                                </div>
                        </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				</div>
				  <div class="col-md-4">
                			<a href="./cercaprof.php" class="btn btn-lg btn-default center-block" type="button">Cerca Prof</a>
			       	  </div>
				<span></span>
    				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>
<span></span>
<div class="row container">
                <div class="col-md-12">
                        <div class="row">
                                <div class="col-md-4">
                                </div>
                                  <div class="col-md-4">
<?php
session_start();
$_POST=$_SESSION;
if ($_POST['logout']=="true"){
        echo "<div class=\"alert alert-success\">  <strong>Ok!</strong> disconnessione riuscita</div>";
}
if ($_POST['connesso']=="false"){
        echo "<div class=\"alert alert-danger\">  <strong>Attrenzione</strong> devi essere loggato per accedere</div>";
}
session_destroy();
?>
</div>
                                <div class="col-md-4">
                                </div>
                        </div>
                </div>
        </div>
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
