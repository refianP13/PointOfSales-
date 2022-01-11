<?php 
$id_barang = $_REQUEST['id_barang'];
include('../../koneksi/koneksi.php');
$sql = "DELETE FROM barang WHERE id_barang='$id_barang'";
$result = @mysql_query($sql);
if ($result){
echo json_encode(array('success'=>true));
} else {
echo json_encode(array('msg'=>'Some errors occured.'));
}
?>