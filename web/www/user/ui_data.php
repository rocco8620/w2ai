<?php
session_start();
include("../includes/functions.php");
verify_user();
include("../includes/db_connect.php"); // $conn : puntatore alla connessione
/* TODO: inserire connessione al database */
/* TODO: inserire il recupero dei dati dal database e encoding per il json */
?>