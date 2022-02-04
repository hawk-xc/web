# Linux-DMZ
De-militarized zone atau biasa disingkat DMZ adalah mekanisme melindungi area Internal dari ancaman internet. terkadang ketika hacker dapat menguasai sisi internal dari target, masalah baru pun terjadi. sebelum insiden yang lebih buruk terjadi, alangkah baik nya kita mencegahnya terlebih dahulu.
### Abstrak
keamanan jaringan merupakan aspek pertama dalam keamanan suatu jaringan komputer, kerentanan-kerentanan pada jaringan komputer perlu mendapat perhatian lebih, sebagai upaya dalam perlindungan jaringan komputer dibuatlah mekanisme yang bernama DMZ (De-Militarized Zone), mekanisme ini merupakan metode firewall dengan cara mengelompokkan terhadap server sehingga lalu lintas data yang lewat bisa diatur sedemikian rupa.
<br />
![111 53 2 23](https://user-images.githubusercontent.com/92193431/152504229-71cb9171-6877-4f81-89f3-86d30bee7d63.png)
pada topologi diatas merupakan gambaran sederhana Administrator yang menerapkan mekanisme DMZ pada jaringannya. ia melakukan konfigurasi pada Linux Routernya sebagai pemeta rute, yang digunakan yaitu Linux Ubuntu 20.04 focal fossa, dengan konfigurasi.
<br />
<br />
#> touch /etc/network/if-up.d/iptables-dmz <br />
#> nano /etc/network/if-up.d/iptables-dmz <br />
<br />
masukkan perintah dibawah pada konfigurasi dmz. <br />
<br />
############################################################################################
<br />
<br />
iptables -A FORWARD -m state –state NEW,ESTABLISHED,RELATED -j ACCEPT <br />
iptables -A OUTPUT -m state –state NEW,ESTABLISHED,RELATED -j ACCEPT <br />
<br />
<br />
iptables -A INPUT -p tcp -d 111.53.2.23 –dport 53 -j ACCEPT<br />
iptables -A FORWARD -p tcp -d 192.168.1.2 –dport 53 -j ACCEPT <br />
iptables -t nat -A PREROUTING -p tcp -d 200.100.1.1 –dport 53 -j DNAT –to 192.168.1.2:53<br />
<br /><br />
iptables -A INPUT -p udp -d 111.53.2.23 –dport 53 -j ACCEPT <br />
iptables -A FORWARD -p udp -d 192.168.1.2 –dport 53 -j ACCEPT <br />
iptables -t nat -A PREROUTING -p udp -d 200.100.1.1 –dport 53 -j DNAT –to 192.168.1.2:53 <br />
<br />
<br />
iptables -A INPUT -p tcp -d 111.53.2.23 –dport 80 -j ACCEPT <br />
iptables -A FORWARD -p tcp -d 192.168.1.3 –dport 80 -j ACCEPT <br />
iptables -t nat -A PREROUTING -p tcp -d 111.53.2.23 –dport 80 -j DNAT –to 192.168.1.3:80<br />
<br />
<br />
iptables -A INPUT -p tcp -d 111.53.2.23 –dport 21 -j ACCEPT <br />
iptables -A FORWARD -p tcp -d 192.168.1.4 –dport 21 -j ACCEPT <br />
iptables -t nat -A PREROUTING -p tcp -d 111.53.2.23 –dport 21 -j DNAT –to 192.168.1.4:21 <br />
<br />
<br />
iptables -A INPUT -p tcp -d 111.53.2.23 -dport 3306 -j ACCEPT <br />
iptables -A FORWARD -p tcp -d 192.168.1.5 -dport 3306 -j ACCEPT <br />
pitables -t nat -A PREROUTING -p tcp -d 111.53.2.23 -dport 3306 -j DNAT -to 192.168.1.5:3306 <br />
<br />
############################################################################################
 
 
  
