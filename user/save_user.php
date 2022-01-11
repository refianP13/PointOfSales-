<?php 
$id_user = $_REQUEST['id_user'];
$nm_user = $_REQUEST['nm_user'];
$level = $_REQUEST['level'];
$pass = $_REQUEST['password'];

include('../../koneksi/koneksi.php');

$sql = "INSERT INTO user(id_user,nm_user,password,level) VALUES('$id_user','$nm_user','$pass','$level')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>