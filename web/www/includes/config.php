<?php

/* GENERAL CONFIGURATION FILE */

/*
Qui si possono specificare i range di porte da dedicare a ciascuna classe di sensori/pin.
Tutti i range sono inclusivi.
*/

$RANGE_RAW_PIN_START = 1001;
$RANGE_RAW_PIN_END = 1050;

$RANGE_TEMPERATURA_START = 1051;
$RANGE_TEMPERATURA_END = 1070;

$RANGE_UMIDITA_START = 1071;
$RANGE_UMIDITA_END = 1090;

$RANGE_LUCE_START = 1091;
$RANGE_LUCE_END = 1110;

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

