<?php
session_start();
$id_trx=$_SESSION['id_trx_masuk'];
$id_barang = $_REQUEST['id_barang'];

include('../../koneksi/koneksi.php');

$sql = "DELETE FROM temp_barang WHERE id_barang='$id_barang' AND id_trx='$id_trx' ";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>