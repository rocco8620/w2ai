<?php

include("config.php");

function getBefore2ndDot($ip) {
    if (substr_count($ip, '.') < 3) return false;
    $i = 0;
    $n = 0;
    do {
        $i = strpos($ip, ".", $i + 1);
        $n = $n + 1;
    } while ($n < 2);
    return substr($ip, 0, $i + 1);
}

function isIpValid($ip) {
    if ($ip == null) return false;
    if (substr_count($ip,'.') != 4) return false;
    if (strlen($ip) < 8) return false;
    if (substr_count($ip,' ') !== 0) return false;
    return true;
}

function verify_user() {
	if (($_SESSION['logged'] == true) and ($_SESSION['admin'] != true)) return null;
	else { echo "x"; exit(); }
}

function verify_admin() {
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
    if (getBefore2ndDot($_SERVER['REMOTE_ADDR']) == getBefore2ndDot($_SERVER['SERVER_ADDR'])) return false;
    else return true;
}

?>