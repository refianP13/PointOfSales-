<?php 
$id_jenis = $_REQUEST['id_jenis'];
$nm_jenis = $_REQUEST['nm_jenis'];

include('../../koneksi/koneksi.php');

$sql = "INSERT INTO jenis_barang(id_jenis,nm_jenis) VALUES('$id_jenis','$nm_jenis')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>