<?php

include("config.php");

function verify_user(){
	if (($_SESSION['logged'] == true) and ($_SESSION['admin'] !== true)) return null;
	else { echo "x"; exit(); }
}

function verify_admin(){
	if (($_SESSION['logged'] == true) and ($_SESSION['admin'] == true)) return null;
	else { echo "x"; exit(); }
}

function isInRangeRawPin($porta) {
    global $RANGE_RAW_PIN_START, $RANGE_RAW_PIN_END;
    if ($porta < $RANGE_RAW_PIN_START or $porta > $RANGE_RAW_PIN_END) return false;
    else return true;
}

function isInRangeTemperatura($porta) {
    global $RANGE_TEMPERATURA_START,  $RANGE_TEMPERATURA_END;
    if ($porta < $RANGE_TEMPERATURA_START or $porta > $RANGE_TEMPERATURA_END) return false;
    else return true;
}

function isInRangeUmidita($porta) {
    global $RANGE_UMIDITA_START, $RANGE_UMIDITA_END;
    if ($porta < $RANGE_UMIDITA_START or $porta > $RANGE_UMIDITA_END) return false;
    else return true;
}

function isInRangeLuce($porta) {
    global $RANGE_LUCE_START, $RANGE_LUCE_END;
    if ($porta < $RANGE_LUCE_START or $porta > $RANGE_LUCE_END) return false;
    else return true;
}


function isUserRemote() { // Assume che il server abbia un ip nella forma 192.168.xxx.xxx
    if (substr($_SERVER['REMOTE_ADDR'], 0, 8) == substr($_SERVER['SERVER_ADDR'], 0, 8)) return false;
    else return true; /* TODO: aggiungere nel file delle impostazioni la possibilità
                         TODO: di cambiare da formato ip 192.168.xxx.xxx a 10.0.0.xxx
                         TODO: e qui il controllo delle impostazioni*/
}



?>