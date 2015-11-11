<?php
session_start();
include("../includes/functions.php"); 
verify_admin(); /* scrive "x" se l'utente non e' autenticato */
include("../includes/db_connect.php"); // $conn : puntatore alla connessione

$own = 1;

$result = mysqli_query($conn, "SELECT * FROM users");

$rows = mysqli_fetch_array($result, MYSQLI_NUM);

/* TODO: quando specificato cosa visualizzare oltre i dati degli untenti nell'interfaccia amministratore aggiungerla qui */

// echo json_encode(encodeUiAdmin(encodeUsers($rows[0], $rows[1]), $widgets_list));

mysqli_free_result($result);
mysqli_close($conn);

?>
