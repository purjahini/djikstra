<?php
$db_host 		= 'localhost';
$db_user 		= 'root';
$db_password 	= '';
$db_name 		= 'dbdijkstra';

$www 			='http://localhost/djikstra/';

$con = @mysqli_connect($db_host,$db_user,$db_password) or die('<center>Error ! Gagal koneksi ke server database</center>');
mysqli_select_db($con,$db_name) or die('<center>Error ! Database tidak ditemukan</center>');

// Koneksi dan memilih database di server
mysql_connect($db_host,$db_user,$db_password) or die("Koneksi gagal");
mysql_select_db($db_name) or die("Database tidak bisa dibuka");
?>