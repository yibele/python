#!/usr/bin/env python

from socket import *

HOST='172.19.208.253'
PORT=21567
BUFSIZE = 1024
ADDR=(HOST,PORT)

tcpCliSock = socket(AF_INET,SOCK_STREAM)
tcpCliSock.connect(ADDR)

while True:
    data = input("> ")
    print(data)
    break
    if not data:
        break
    tcpCliSock.send(data)
    data = tcpCliSock.recv(BUFSIZE)
    if not data:
        break
    print(data.decode('utf-8'))

tcpCliSock.close()



