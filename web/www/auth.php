<?php

/*
if (isset($_POST['username'])) $user = $_POST['username']; else exit();
if (isset($_POST['password'])) $user = $_POST['password']; else exit(); */

$user = "prova";
$pass = "provina";

$pass = substr(sha1(sha1($pass)), 2, 30);

/* TODO: codice per determinare se l'utente è remoto o locale basandosi sull'ip */

if (substr($_SERVER['REMOTE_ADDR'], 0, 8) == "127.0.0.2") $remoto = false;
else $remoto = true;

include("../db_connect.txt"); // $conn : puntatore alla connessione

$stmt = mysqli_prepare($conn, "SELECT id,attivo,privs,esterno,ip FROM utenti WHERE username = ? AND password = ?");

mysqli_stmt_bind_param($stmt, "ss", $user, $pass); 

mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $id, $attivo, $privs, $esterno, $ip);

mysqli_stmt_fetch($stmt);

function giveAdminPrivs() {
	$_SESSION['logged'] = true;
	$_SESSION['admin'] = true;
}

function giveUserPrivs($ip) {
	$_SESSION['ipArduino'] = $ip;
	$_SESSION['logged'] = true;
	$_SESSION['admin'] = false;
}




if ($id == null) echo "0|0|0|0"; // login ok | utente attivo | accessibile esterno | privilegi admin 
else {
	if ($attivo == true) {
		if ($esterno == true) {
			if ($privs == true) {
				echo "1|1|1|1";
				giveAdminPrivs();
			} else {
				echo "1|1|1|0";
				giveUserPrivs($ip);
			}
		}
		else {		
			if ($remoto == true) echo "1|1|0|0";
			else {
				if ($privs == true) {
					echo "1|1|1|1";
					giveAdminPrivs();
				} else {
					echo "1|1|1|0";
					giveUserPrivs($ip);
				}
			}
		}
	} else echo "1|0|0|0";


}

// echo $id."|".$attivo."|".$privs."|".$esterno."|".$ip; /* TODO: Rimuovere questa riga quando finito */

mysqli_stmt_close($stmt);

mysqli_close($conn);

?>
