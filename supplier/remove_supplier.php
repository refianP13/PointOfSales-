<?php 
$id_supplier = $_REQUEST['id_supplier'];
include('../../koneksi/koneksi.php');
$sql = "DELETE FROM supplier WHERE id_supplier='$id_supplier'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>