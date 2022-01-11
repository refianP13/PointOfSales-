<?php
$id_outlet = $_REQUEST['id_outlet'];
$nm_outlet = $_REQUEST['nm_outlet'];
$almt = $_REQUEST['almt_outlet'];
$tlp = $_REQUEST['tlp_outlet'];
$pass = $_REQUEST['password'];

include('../../koneksi/koneksi.php');

$sql = "UPDATE outlet SET nm_outlet='$nm_outlet', almt_outlet='$almt', tlp_outlet='$tlp', password='$pass' WHERE id_outlet='$id_outlet'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>