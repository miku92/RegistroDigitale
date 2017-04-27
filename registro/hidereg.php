<?php
session_start(); // dive essere la prima cosa nella pagina, aprire la sessione
include("db_con.php"); // includo il file di connessione al database
if($_POST["username"] != "" && $_POST["password"]!= "" && $_POST["cognome"] != "" && $_POST["nome"] != ""){  // se i parametri iscritto non sono vuoti non sono vuote
	$query_registrazione = mysql_query("INSERT INTO Corpo_Docente (ImprontaID,Nome,Cognome,Username,Password) VALUES (201,'".$_POST["nome"]."','".$_POST["cognome"]."','".$_POST["username"]."','".$_POST["password"]."')") // scrivo sul DB questi valori
	or die ("query di registrazione non riuscita".mysql_error()); // se la query fallisce mostrami questo errore
}
else{
	header('location:registrazione.php?action=registration&errore=Non hai compilato tutti i campi obbligatori'); // se le prime condizioni non vanno bene entra in questo ramo else
}
if(isset($query_registrazione)){ //se la reg è andata a buon fine
	$_SESSION["logged"]=true; //restituisci vero alla chiave logged in SESSION 
        $command = "sudo python /home/pi/Desktop/serial/registrazione.py ".$_POST["nome"]." ".$_POST["cognome"]." ".$_POST["username"]." &";
        exec($command);
	header("location:logamm.php");
}
else{
	echo "non ti sei registrato con successo"; // altrimenti esce scritta a video questa stringa
}
?>
