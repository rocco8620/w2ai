<?php

function encodeUiUser($user_data, $widget_usati) {
	return json_encode(array($user_data, $widget_usati));
}

function encodeUserData($nome, $ip) {
	return array($nome, $ip);
}

function addToWidgetsList($list, $widget) {
	if (!is_array($widget)) return false;
	if (!isset($list)) $list = array();
	return array_pad($list, count($list) + 1, $widget);
}

function encodeWidget($id) {
	$id = intval($id);	
	$arg_list = func_get_args();

	switch($id) {

		case 1: //temperatura 1
			if (func_num_args() < 4) return array(0);
			return array(	$arg_list[0], //id
					$arg_list[1], //indice
					$arg_list[2], //nome
					$arg_list[3], //frequenza aggiornamento
				); 
		break;
		
		case 2: //temperatura 2
			if (func_num_args() < 8) return array(0);
			return array(	$arg_list[0], //id
					$arg_list[1], //indice
					$arg_list[2], //nome
					$arg_list[3], //frequenza aggiornamento
					$arg_list[4], //temperatura massima
					$arg_list[5], //temperatura minima
					$arg_list[6], //azione temperatura massima
					$arg_list[7], //azione temperatura minima
				); 
		break;
	
	}
	return array(0);
}

?>

