<?php
$id_user = $_REQUEST['id_user'];

include('../../koneksi/koneksi.php');

$sql = "DELETE FROM user WHERE id_user='$id_user'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>