<?php
session_start();
include("../includes/functions.php"); 
verify_admin();

if (isset($_GET['a'])) $action = $_GET['a']; else exit(); // a: azione // 1:aggiungi utente | 2:rimuovi utente | 3:modifica utente

include("../includes/db_connect.php"); // $conn : puntatore alla connessione

// parametri ok | operazione ok 

/* TODO: lavorare sul file il 12/11/15 correggendo e aggiornando il sistema di gestione utenti */

switch ($action) {
	case "1": // aggiungi utente
		if (isset($_POST['us'])) $username = $_POST['us']; else { echo "0|0"; exit(); }
		if (isset($_POST['pa'])) { $password = $_POST['pa']; $password =  substr(sha1(sha1($pass)), 2, 30); }else { echo "0|0"; exit(); }
		if (isset($_POST['at'])) $attivo = filter_var($_POST['at'], FILTER_VALIDATE_BOOLEAN); else { echo "0|0"; exit(); }
		if (isset($_POST['pr'])) $privs = filter_var($_POST['pr'], FILTER_VALIDATE_BOOLEAN); else { echo "0|0"; exit(); }
		if (isset($_POST['es'])) $esterno = filter_var($_POST['es'], FILTER_VALIDATE_BOOLEAN); else { echo "0|0"; exit(); }
		if (isIpValid($_POST['ip'])) $ip = $_POST['ip']; else { echo "0|0"; exit(); }
		
		$stmt = mysqli_prepare($conn, "INSERT INTO utenti (username,password,attivo,privs,esterno,ip) VALUES (?,?,?,?,?,?)");
		mysqli_stmt_bind_param($stmt, "ssiiis", $username, $password, $attivo, $privs, $esterno, $ip); 
		$result = mysqli_stmt_execute($stmt);
		if ($result == false) echo "1|0";
		else echo "1|1";
		break;
	case "2": // rimuovi utente
		if (isset($_POST['own'])) $own = $_POST['own']; else { echo "0|0"; exit(); }
		
		$stmt = mysqli_prepare($conn, "DELETE * FROM utenti WHERE own = ? LIMIT 1");
		mysqli_stmt_bind_param($stmt, "i", $own);
		$result = mysqli_stmt_execute($stmt);
		if ($result == false) echo "1|0";
		else echo "1|1";
		break;
	case "3": // modifica utente
		if (isset($_POST['own'])) $own = $_POST['own']; else { echo "0|0"; exit(); }
		if (isset($_POST['us'])) $username = $_POST['us']; else { echo "0|0"; exit(); }
		if (isset($_POST['pa'])) { $password = $_POST['pa']; $password =  substr(sha1(sha1($pass)), 2, 30); }else { echo "0|0"; exit(); }
		if (isset($_POST['at'])) $attivo = filter_var($_POST['at'], FILTER_VALIDATE_BOOLEAN); else { echo "0|0"; exit(); }
		if (isset($_POST['pr'])) $privs = filter_var($_POST['pr'], FILTER_VALIDATE_BOOLEAN); else { echo "0|0"; exit(); }
		if (isset($_POST['es'])) $esterno = filter_var($_POST['es'], FILTER_VALIDATE_BOOLEAN); else { echo "0|0"; exit(); }
		if (isIpValid($_POST['ip'])) $ip = $_POST['ip']; else { echo "0|0"; exit(); }

		$stmt = mysqli_prepare($conn, "UPDATE utenti SET username = ?, password = ?, attivo = ?, privs = ?, esterno = ?, ip = ? WHERE own = ?");
		mysqli_stmt_bind_param($stmt, "ssiiisi", $username, $password, $attivo, $privs, $esterno, $ip, $own);
		$result = mysqli_stmt_execute($stmt);
		if ($result == false) echo "1|0";
		else echo "1|1";
		/* TODO: controllare che il codice sia corretto */
		break;
}

if ($stmt != null) mysqli_stmt_close($stmt);
if ($conn != null) mysqli_close($conn);

?>
