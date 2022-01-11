<?php 
$id_supplier = $_REQUEST['id_supplier'];
$nm_supplier = $_REQUEST['nm_supplier'];
$almt = $_REQUEST['almt_supplier'];
$tlp = $_REQUEST['tlp_supplier'];

include('../../koneksi/koneksi.php');

$sql = "UPDATE supplier SET nm_supplier='$nm_supplier', almt_supplier='$almt', tlp_supplier='$tlp' WHERE id_supplier='$id_supplier'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>