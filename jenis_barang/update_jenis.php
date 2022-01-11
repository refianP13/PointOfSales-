<?php
$id_jenis = $_REQUEST['id_jenis'];
$nm_jenis = $_REQUEST['nm_jenis'];

include('../../koneksi/koneksi.php');

$sql = "UPDATE jenis_barang SET nm_jenis='$nm_jenis' WHERE id_jenis='$id_jenis'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>