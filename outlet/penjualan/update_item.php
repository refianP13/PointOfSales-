<?php
session_start();
$id_barang = $_REQUEST['id_barang'];
$jml = $_REQUEST['jml'];
$hrg = $_REQUEST['hrg'];
$sub_total = $jml * $hrg;
$id_trx=$_SESSION['id_penjualan'];
include('../../koneksi/koneksi.php');
$sql = "UPDATE temp_barang SET jml='$jml', sub_total='$sub_total' WHERE id_trx='$id_trx' AND id_barang='$id_barang'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>