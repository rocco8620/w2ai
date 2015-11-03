<?php
session_start();
include("../includes/verify_auth.php"); 
verify_admin();
include("../includes/db_connect.php"); // $conn : puntatore alla connessione
/* TODO: inserire connessione al database */
?>