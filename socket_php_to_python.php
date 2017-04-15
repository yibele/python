<?php


$host = '172.19.208.253';
$port = 21567;
$timeout = 15;


$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or 
die ("cant create socket\n");

socket_set_nonblock($socket) or die('cant set the socket to no bolck \n');

$time = time();

whiel(!@socket_connect($socket, $host,$port)){
	$err = socket_last_error($socket);

	if($err==115 || $err ==114){
		if((time()-$time)> = $tmieout){
			socket_close($socket);
			die("Connection timed out\n");
		}

		sleep(1);
		continue;
	}
	die(socket_strerror($err).'\n');
}

$read = socket_read($socket, 1024) or die('');

socket_set_block($this->socket) or die();



