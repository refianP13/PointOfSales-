<?php
session_start();
include('../../koneksi/koneksi.php');
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ($page-1)*$rows;
$result = array();
$id_jenis = $_REQUEST['id_jenis'];
$tb = $_REQUEST['tb'];
$id_outlet=$_SESSION['id_outlet'];
if($tb=="gudang"){
	$rs = mysql_query("SELECT COUNT(*) FROM barang WHERE id_jenis='$id_jenis'");
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	$rs = mysql_query("SELECT * FROM barang WHERE id_jenis='$id_jenis' LIMIT $offset,$rows");
}
else if($tb=="outlet"){
	$rs = mysql_query("SELECT COUNT(*) FROM barang, barang_outlet
	WHERE barang.id_barang = barang_outlet.id_barang  
	AND barang_outlet.id_outlet='$id_outlet'");
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	$rs = mysql_query("SELECT * FROM barang, barang_outlet 
	WHERE barang.id_barang = barang_outlet.id_barang AND barang.id_jenis='$id_jenis'  
	AND barang_outlet.id_outlet='$id_outlet' LIMIT $offset,$rows");
}
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);
?>