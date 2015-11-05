<?php

function encodeUserUi($user_data, $widget_usati) {
	$array = array($user_data, $widget_usati);
}

function encodeUserData($nome, $ip) {
	$array = array($nome, $ip);
	return $array;
}

function encodeWidgetTemperaturaV1($nome, $indice, $freq_agg) {
	$array = array(1, $nome, $indice, $freq_agg); // array da 4 elementi
	return $array;
}

function encodeWidgetTemperaturaV2($nome, $indice, $max_temp, $min_temp, $freq_agg, $max_temp_action, $min_temp_action) {
	$array = array(2, $nome, $indice, $max_temp, $min_temp, $freq_agg, $max_temp_action, $min_temp_action);
	return $array;
}
    

?>

