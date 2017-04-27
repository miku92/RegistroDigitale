<?php
session_start();// come sempre prima cosa, aprire la sessione 
include("db_con.php"); // includere la connessione al database
if($_GET['error']=="true"){
   echo "<script type='text/javascript'>alert('Username o password errata/e');</script>";
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
    <link href="bootst/css/registrazioneStile.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>


<style>

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-center"> Login</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
<form action="hidelogin.php" method="POST">

  <div class="container col-md-4">
    <label><b>Username</b></label>
    <input type="text" placeholder="Inserire Username" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Inserire Password" name="password" required>

    <button class= "col-md-4" type="submit">Entra</button>
  </div>
</form>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
</body>
</html>
