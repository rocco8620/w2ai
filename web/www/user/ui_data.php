<?php
/* session_start();
include("../includes/functions.php");
verify_user(); //scrive "x" se l'utente non e' autenticato */ 
/* TODO: ricordarsi di togliere il commento alle righe sopra */
include("../includes/db_connect.php"); // $conn : puntatore alla connessione
include("../includes/widgets.php");

$own = 1;

$result = mysqli_query($conn, "SELECT * FROM widgets WHERE own = ".$own); /* sostituire con $_SESSION['own'] */

while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
	$widgets_list = addToList($widgets_list, encodeWidget($rows[1], $rows[2], $rows[3], $rows[4], $rows[5], $rows[6], $rows[7], $rows[8]));
}

$result = mysqli_query($conn, "SELECT username,ip FROM utenti WHERE own = ".$own); /* sostituire con $_SESSION['own'] */
$rows = mysqli_fetch_array($result, MYSQLI_NUM);

echo json_encode(encodeUi(encodeUserData($rows[0], $rows[1]), $widgets_list));

mysqli_free_result($result);

mysqli_close($conn);

?>


