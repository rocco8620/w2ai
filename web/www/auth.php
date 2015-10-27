<?php

/*
if (isset($_POST['username'])) $user = $_POST['username']; else exit();
if (isset($_POST['password'])) $user = $_POST['password']; else exit(); */

$user = "admin";
$pass = "admin";

/* TODO: codice per determinare se l'utente è remoto o locale basandosi sull'ip */

include("../db_connect.txt"); // $conn : puntatore alla connessione

$stmt = mysqli_prepare($conn, "SELECT id,attivo,privs,esterno,ip FROM utenti WHERE username = ? AND password = ?");

mysqli_stmt_bind_param($stmt, "ss", $user, $pass); 

mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $id, $attivo, $privs, $esterno, $ip);

mysqli_stmt_fetch($stmt);

function givePrivs() {
$_SESSION['ipArduino'] = $ip;
$_SESSION['logged'] = true;
$_SESSION['admin'] = $privs;
}

if ($id == null) echo "0|0|0|0"; // login ok | utente attivo | accessibile esterno | privilegi admin 
else {
	if ($attivo == true) {
		if ($esterno == true) { echo "1|1|1|".$privs; givePrivs(); }
		else {		
			if ($remoto == true) echo "1|1|0|0";
			else {echo  "1|1|1|0".$privs; givePrivs(); }
		}
	} else echo "1|0|0|0";
}

echo $id."|".$attivo."|".$privs."|".$esterno; /* TODO: Rimuovere questa riga quando finito*/

mysqli_stmt_close($stmt);

mysqli_close($conn);

?>
