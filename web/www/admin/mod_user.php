<?php
session_start();
include("../includes/functions.php"); 
verify_admin();

$action = $_GET['a']; // a: azione // 1:aggiungi utente | 2:rimuovi utente | 3:modifica utente

include("../../db_connect.txt"); // $conn : puntatore alla connessione

// parametri ok | operazione ok 

switch ($action) {
	case "1": // aggiungi utente
		if (isset($_POST['us'])) $username = $_POST['us']; else { echo "0|0"; exit(); }

		if (isset($_POST['pa'])) { $password = $_POST['pa']; $password =  substr(sha1(sha1($pass)), 2, 30); }else { echo "0|0"; exit(); }
		if (isset($_POST['at'])) $attivo = filter_var($_POST['at'], FILTER_VALIDATE_BOOLEAN); else { echo "0|0"; exit(); }
		if (isset($_POST['pr'])) $privs = filter_var($_POST['pr'], FILTER_VALIDATE_BOOLEAN); else { echo "0|0"; exit(); }
		if (isset($_POST['es'])) $esterno = filter_var($_POST['es'], FILTER_VALIDATE_BOOLEAN); else { echo "0|0"; exit(); }
		if (isset($_POST['ip'])) $ip = $_POST['ip']; else { echo "0|0"; exit(); } /* TODO: verifcare che l'ip inserito sia valido */
		
		$stmt = mysqli_prepare($conn, "INSERT INTO utenti (username,password,attivo,privs,esterno,ip) VALUES (?,?,?,?,?,?)");
		mysqli_stmt_bind_param($stmt, "ssiiis", $username, $password, $attivo, $privs, $esterno, $ip); 
		$result = mysqli_stmt_execute($stmt);
		if ($result == false) echo "1|0";
		else echo "1|1";
		break;
	case "2": // rimuovi utente
		if (isset($_POST['id'])) $id = $_POST['id']; else { echo "0|0"; exit(); }
		
		$stmt = mysqli_prepare($conn, "DELETE * FROM utenti WHERE id = ? LIMIT 1");
		mysqli_stmt_bind_param($stmt, "i", $id); 
		$result = mysqli_stmt_execute($stmt);
		if ($result == false) echo "1|0";
		else echo "1|1";
		break;
	case "3": // modifica utente
		if (isset($_POST['id'])) $id = $_POST['id']; else { echo "0|0"; exit(); }
		/* TODO: codice per modificare l'utente e ritornare un risultato sull'esito dell'operazione */
		break;
}

if ($stmt !== null) mysqli_stmt_close($stmt);
if ($conn !== null) mysqli_close($conn);

?>