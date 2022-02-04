# Linux-DMZ
De-militarized zone atau biasa disingkat DMZ adalah mekanisme melindungi area Internal dari ancaman internet. terkadang ketika hacker dapat menguasai sisi internal dari target, masalah baru pun terjadi. sebelum insiden yang lebih buruk terjadi, alangkah baik nya kita mencegahnya terlebih dahulu.
### Abstrak
keamanan jaringan merupakan aspek pertama dalam keamanan suatu jaringan komputer, kerentanan-kerentanan pada jaringan komputer perlu mendapat perhatian lebih, sebagai upaya dalam perlindungan jaringan komputer dibuatlah mekanisme yang bernama DMZ (De-Militarized Zone), mekanisme ini merupakan metode firewall dengan cara mengelompokkan terhadap server sehingga lalu lintas data yang lewat bisa diatur sedemikian rupa.
<br />
![111 53 2 23](https://user-images.githubusercontent.com/92193431/152504229-71cb9171-6877-4f81-89f3-86d30bee7d63.png)
pada topologi diatas merupakan gambaran sederhana Administrator yang menerapkan mekanisme DMZ pada jaringannya. ia melakukan konfigurasi pada Linux Routernya sebagai pemeta rute, yang digunakan yaitu Linux Ubuntu 20.04 focal fossa, dengan konfigurasi.
<br />
buatlah file konfigurasi pada directory network.<br />
#> touch /etc/network/if-up.d/iptables-dmz <br />
#> nano /etc/network/if-up.d/iptables-dmz <br />
masukkan perintah dibawah pada konfigurasi dmz. <br />
iptables -A FORWARD -m state –state NEW,ESTABLISHED,RELATED -j ACCEPT <br />
iptables -A OUTPUT -m state –state NEW,ESTABLISHED,RELATED -j ACCEPT <br />


 
 
  
