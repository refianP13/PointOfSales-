<?php
session_start();
include('../../koneksi/koneksi.php');
$id_trx=$_SESSION['id_penjualan'];
$id_barang=$_POST['id_barang'];
$jumlah=$_POST['jumlah'];
$hrg_jual=$_POST['hrg_jual'];
$sub_total=$jumlah*$hrg_jual;
$query_insert=sprintf("INSERT INTO temp_barang
VALUES('','%s','%s','%s','%s','%s',NULL)",
$id_trx,$id_barang,$jumlah,$hrg_jual,$sub_total);
$sql_insert=mysql_query($query_insert);
?>