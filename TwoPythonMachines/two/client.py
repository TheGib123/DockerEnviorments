import socket

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect(("192.168.0.3", 1234))

while True:
    msg = s.recv(1024)
    print(msg.decode("utf-8"))
    send_msg = input("                                                ")
    s.sendto(send_msg.encode("utf-8"), ("192.168.0.2", 1234))