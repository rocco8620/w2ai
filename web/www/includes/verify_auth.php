<?php

function verify_user(){
	if (($_SESSION['logged'] == true) and ($_SESSION['admin'] !== true)) return null;
	else {
		echo "x";
		exit();
	}
}

function verify_admin(){
	if (($_SESSION['logged'] == true) and ($_SESSION['admin'] == true)) return null;
	else {
		echo "x";
		exit();
	}
}


?>