<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
session_start();
$_POST["logout"]="true";
$_SESSION=$_POST;
header("location:./index.php"); //to redirect back to "index.php" after logging out
exit();
?>
