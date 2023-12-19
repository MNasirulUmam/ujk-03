<?php
## Author : M. Nasirul Umam
## Tanggal : 25 juli 2023
  session_start(); // Reset session
  session_destroy(); // Destroy session
    header("Location: index.php"); // menuju ke halaman login
?>