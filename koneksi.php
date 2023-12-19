<?php
## Author : M. Nasirul Umam
## Tanggal : 25 juli 2023
    // medeklarasi  xmpp database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'upt_blk';

    // membuat koneksi
    $koneksi = new mysqli($host, $user, $password, $database);
    // memerikasa koneksi
    if ($koneksi->connect_error) {
        die("Connection failed:" . $koneksi->connect_error);
    }
    
?>