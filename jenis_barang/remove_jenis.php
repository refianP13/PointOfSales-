<?php 
$id_jenis = $_REQUEST['id_jenis'];

include('../../koneksi/koneksi.php');

$sql = "DELETE FROM jenis_barang WHERE id_jenis='$id_jenis'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>