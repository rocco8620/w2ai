<?php
session_start();
$_SESSION['logged'] = false;
$_SESSION['admin'] = false;
$_SESSION['ip'] = null;
$_SESSION['own'] = null;
session_end();
?>