<?php
session_start();
$_SESSION['logged'] = false;
$_SESSION['admin'] = false;
$_SESSION['ip'] = null;
session_end();
?>