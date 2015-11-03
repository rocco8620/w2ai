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





?>