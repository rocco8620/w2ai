<?php

/* FUNZIONI INTERFACCIA AMMINISTRATORE */

function encodeUiAdmin($users_data /* Da definire */) {

}

function encodeUsersSpecs($id, $user, $attivo, $privs, $esterno, $ip) {
	return array($id, $user, $attivo, $privs, $esterno, $ip);
}

function addToUsersList($list, $user) {
	if (!is_array($user)) return false;
	if (!isset($list)) $list = array();
	return array_pad($list, count($list) + 1, $user);
}

// --------------------------------------------------------------------------------------------------------------------------
/* FUNZIONI INTERFACCIA UTENTE */

function encodeUiUser($user_data, $widget_usati) {
	return array($user_data, $widget_usati);
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
	$arg_list = func_get_args(); // TODO: inserire controllo per evitare che siano passati meno valori di quelli richiesti
								// TODO: aggiungere il controllo del numero di parametri dentro il singolo case

	switch($id) {

		case 1: //temperatura 1
			return array(	$arg_list[0], //id
					$arg_list[1], //indice
					$arg_list[2], //nome
					$arg_list[3], //frequenza aggiornamento
				); 
		break;
		
		case 2: //temperatura 2
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

