<?php

/*
if (isset($_POST['username'])) $user = $_POST['username']; else exit();
if (isset($_POST['password'])) $user = $_POST['password']; else exit(); */
/* TODO: ricordarsi di togliere il commento alle righe sopra */
$user = "prova";
$pass = "provina";

$pass = substr(sha1(sha1($pass)), 2, 30);

include ("includes/functions.php");
$remoto = isUserRemote();

include("includes/db_connect.php"); // $conn : puntatore alla connessione

$stmt = mysqli_prepare($conn, "SELECT id,attivo,privs,esterno,ip,own FROM utenti WHERE username = ? AND password = ?");

mysqli_stmt_bind_param($stmt, "ss", $user, $pass); 

mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $id, $attivo, $privs, $esterno, $ip, $own);

mysqli_stmt_fetch($stmt);

function giveAdminPrivs() {
	$_SESSION['logged'] = true;
	$_SESSION['admin'] = true;
}

function giveUserPrivs($ip, $own) {
	$_SESSION['ipArduino'] = $ip;
	$_SESSION['own'] = $own;
	$_SESSION['logged'] = true;
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
				giveUserPrivs($ip, $own);
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
					giveUserPrivs($ip, $own);
				}
			}
		}
	} else echo "1|0|0|0";


}

// echo $id."|".$attivo."|".$privs."|".$esterno."|".$ip; /* TODO: Rimuovere questa riga quando finito */

mysqli_stmt_close($stmt);

mysqli_close($conn);

?>
