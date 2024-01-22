<?php
$host = "localhost";
$user = "root";
$pass = "user";
$name = "baturaden";

$conn = mysqli_connect('localhost','root','user','baturaden') or die("Koneksi ke database gagal!");
mysqli_select_db($conn, $name) or die("Tidak ada database yang dipilih!");
?>