<?php
session_start();
$id_trx=$_SESSION['id_trx_masuk'];
$id_barang = $_REQUEST['id_barang'];
$jml_masuk = $_REQUEST['jml'];
$hrg = $_REQUEST['hrg'];
$sub_total=$jml_masuk * $hrg;
include('../../koneksi/koneksi.php');

$sql = "UPDATE temp_barang SET jml='$jml_masuk', sub_total='$sub_total' WHERE id_barang='$id_barang' AND id_trx='$id_trx'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>