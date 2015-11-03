<?php
session_start();
include("../includes/functions.php");
verify_user();
include("../includes/db_connect.php"); // $conn : puntatore alla connessione
/* TODO: inserire connessione al database */
echo "<user_ui>";
?>