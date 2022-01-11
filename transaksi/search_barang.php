<?php 
include('../koneksi/koneksi.php');
$cari=$_POST['cari_id_brg'];
$query_barang="SELECT * FROM barang,jenis_barang WHERE barang.id_jenis=jenis_barang.id_jenis AND barang.id_barang='$cari'";
$sql_barang=mysql_query($query_barang);
$count=mysql_num_rows($sql_barang);
if($count>0) {
	$row = mysql_fetch_assoc($sql_barang);
	$pesan = "1";
	} 
else {
	$pesan = "0";
	$row="";
	}
	$response = array('pesan'=>$pesan,'data'=>$row);
	echo json_encode($response);
?>