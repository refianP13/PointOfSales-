<?php
session_start();
include('../../koneksi/koneksi.php');
$cari=$_POST['cari_id_brg'];
$id_outlet=$_SESSION['id_outlet'];
$tb=$_GET['tb'];
if($tb=="gudang"){
	$query_barang="SELECT barang.*,jenis_barang.*, barang.stok as my_stok 
	FROM barang,jenis_barang WHERE barang.id_jenis=jenis_barang.id_jenis 
	AND barang.id_barang='$cari'";
}
else if($tb=="outlet"){
	$query_barang="SELECT barang.*,barang_outlet.stok as my_stok,jenis_barang.* 
	FROM barang_outlet,barang,jenis_barang WHERE barang.id_jenis=jenis_barang.id_jenis 
	AND barang.id_barang=barang_outlet.id_barang AND barang.id_barang='$cari' 
	AND barang_outlet.id_outlet='$id_outlet'";
}
$sql_barang=mysql_query($query_barang);
$count=mysql_num_rows($sql_barang);
if($count>0) {
	$row = mysql_fetch_assoc($sql_barang);
	$pesan = 1;
	} 
else {
	$pesan = 0;
	$row="";
	}
	$response = array('pesan'=>$pesan,'data'=>$row);
	echo json_encode($response);
?>