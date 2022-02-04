<?php
$host = "sql6.freemysqlhosting.net";
$user = "sql6470314";
$pass = "TJkUCYL6kh";
$name = "sql6470314";

$koneksi = mysqli_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysqli_select_db($koneksi, $name) or die("Tidak ada database yang dipilih!");
