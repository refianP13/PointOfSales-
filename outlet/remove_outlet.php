<?php 
$id_outlet = $_REQUEST['id_outlet'];
include('../../koneksi/koneksi.php');
$sql = "DELETE FROM outlet WHERE id_outlet='$id_outlet'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>