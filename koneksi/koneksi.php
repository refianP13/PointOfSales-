<?php
$user_db="root";
$pass_db="";
$server_db="localhost";
$nama_db="inventory";
$koneksi=mysql_connect($server_db,$user_db,$pass_db) or die(mysql_error());
$pilih_db=mysql_select_db($nama_db);
?>