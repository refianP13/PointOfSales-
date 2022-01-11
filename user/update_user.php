<?php 
$id_user = $_REQUEST['id_user'];
$nm_user = $_REQUEST['nm_user'];
$pass = $_REQUEST['password'];
$level = $_REQUEST['level'];

include('../../koneksi/koneksi.php');

$sql = "UPDATE user SET nm_user='$nm_user',password='$pass',level='$level' WHERE id_user='$id_user'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>