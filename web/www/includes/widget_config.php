<?php

function encodeUserUi($user_data, $widget_usati) {
	$array = array($user_data, $widget_usati);
}

function encodeUserData($nome, $ip) {
	$array = array($nome, $ip);
	return $array;
}

function encodeWidget($id, $nome, $indice, $max_temp=null, $min_temp=null, $freq_agg=null, $max_temp_action=null, $min_temp_action=null)
{
	$id = intval($id);
	switch ($id) {
		case 1: // temperatura 1

		break;

	}

}


function encodeWidgetTemperaturaV2($nome, $indice, $max_temp, $min_temp, $freq_agg, $max_temp_action, $min_temp_action) {
	$array = array(2, $nome, $indice, $max_temp, $min_temp, $freq_agg, $max_temp_action, $min_temp_action);
	return $array;
}
    

?>

