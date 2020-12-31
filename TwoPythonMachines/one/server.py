import socket

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.bind((socket.gethostname(), 1234))
s.listen(5)


clientsocket, address = s.accept()
print("connection has been established ")
while True:
    send_msg = input("                                                ")
    clientsocket.send(bytes(send_msg, "utf-8"))
    msg = clientsocket.recv(1024)
    print(msg.decode("utf-8"))  

clientsocket.close()

