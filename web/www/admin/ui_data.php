<?php
session_start();
include("../includes/functions.php"); 
verify_admin();
include("../includes/db_connect.php"); // $conn : puntatore alla connessione
/* TODO: inserire connessione al database */

$own = 1;

$result = mysqli_query($conn, "SELECT * FROM users");

$result = mysqli_query($conn, "SELECT username,ip FROM utenti WHERE own = ".$own);
$rows = mysqli_fetch_array($result, MYSQLI_NUM);

/* TODO: ROBA DA FINIRE */

echo json_encode(encodeUi(encodeUserData($rows[0], $rows[1]), $widgets_list));

mysqli_free_result($result);

mysqli_close($conn);

?>
