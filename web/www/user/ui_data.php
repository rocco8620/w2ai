<?php
session_start();
include("../includes/verify_auth.php");
verify_user();
include("../../db_connect.txt"); // $conn : puntatore alla connessione
/* TODO: inserire connessione al database */
?>