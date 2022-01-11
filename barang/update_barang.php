<?php 
$id_barang = $_REQUEST['id_barang'];
$id_jenis = $_REQUEST['id_jenis'];
$nm_barang = $_REQUEST['nm_barang'];
$stok = $_REQUEST['stok'];
$hrg_beli = $_REQUEST['hrg_beli'];
$hrg_jual = $_REQUEST['hrg_jual'];
include('../../koneksi/koneksi.php');
$sql = "UPDATE barang SET nm_barang='$nm_barang', id_jenis='$id_jenis', nm_barang='$nm_barang', stok='$stok', hrg_beli='$hrg_beli', hrg_jual='$hrg_jual' WHERE id_barang='$id_barang'";
$result = @mysql_query($sql);
if ($result){
echo json_encode(array('success'=>true));
} else {
echo json_encode(array('msg'=>'Some errors occured.'));
}
?>