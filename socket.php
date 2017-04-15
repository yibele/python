<?php

#Php 中的socket 的实现

$host = '172.19.208.253';
$port = 21567;
set_time_limit(0); // 允许脚本运行的超时间 ,比如 如果设置为30 , 那么30秒之后就抛出错误, 设置为 0 的话没有限制; 最好是在cli 模式下运行,保证服务不会超市,  
//创建socket

$socket = new socket_create(AF_INET,SOCK_STREAM,0) or die('could not create socket');
//绑定socket到指定的地址端口

$res = socket_bind($socket, $host,$port) or die('could not bind the socket to host');

//开始监听连接

$result = socket_listen($socket,3) or die("could not set up socket listener");

//接受一个socket请求,并调用另一个socket处理客户端---服务器间的信心
//有点想 Python 中的   tcpClisock , addr = s.accept()
$spawn = $socket_accept($socket) or die('Could not accpet incomming connetcion\n');

//读取客户端信息

$input = $socket_read($spawn,1024) or die("could not read input \n");

//clean up input string 

$input = trim($input);

//翻转客户端信息 然后返回
$output = strrev($input)."\n";
$socket_write($spawn,$output,strlen($output));
//关闭
socket_close($spawn);
socket_close($socket);


