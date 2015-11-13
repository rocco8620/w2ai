<?php
/* session_start();
include("../includes/functions.php"); 
verify_admin(); /* scrive "x" se l'utente non e' autenticato */
/* TODO: ricordarsi di togliere il commento alle righe sopra */
include("../includes/db_connect.php"); // $conn : puntatore alla connessione
include("../includes/encode_admin_ui.php");

$own = 1;
////// | own | username | password | attivo | privs | esterno |      ip      |
$result = mysqli_query($conn, "SELECT own,username,attivo,privs,esterno,ip FROM users");

while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $users_list = addToUsersList($users_list, encodeUsersSpecs($rows[1], $rows[2], $rows[3], $rows[4], $rows[5], $rows[6]));
}

/* TODO: quando deciso cosa visualizzare oltre i dati degli untenti nell'interfaccia amministratore aggiungerla qui */

// echo encodeUiAdmin(encodeUsers($rows[0], $rows[1]), $widgets_list);

mysqli_free_result($result);
mysqli_close($conn);

?>
