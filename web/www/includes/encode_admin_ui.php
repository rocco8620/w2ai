<?php

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

?>