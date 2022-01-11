<?php 
include('../../koneksi/koneksi.php');
$rs = mysql_query("SELECT COUNT(*) FROM jenis_barang");
$row = mysql_fetch_row($rs);
$rs = mysql_query("SELECT * FROM jenis_barang");
$jenis = array();
while($row = mysql_fetch_object($rs)){
array_push($jenis, $row);
}
echo json_encode($jenis);
?>