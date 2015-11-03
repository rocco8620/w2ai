<?php
/* session_start(); */
include("../../../../includes/function.php"); 
verify_user(); 

// $ip = $_SESSION['ipArduino'];
$ip = "127.0.0.1";
if (isset($_GET['p'])) $porta = $_GET['p']; else exit();
$porta = intval($porta);
if (!isInRangeTemperatura($porta)) exit(); // Verifica che la porta cada nell'intervallo.


$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($socket, $ip, $porta);
$data = "temp".($porta);
socket_write($socket, $data, strlen($data));
$out = socket_read($socket, 32);
echo $out;
socket_close($socket);

// }


/*

set_time_limit(20);

*/


?>

