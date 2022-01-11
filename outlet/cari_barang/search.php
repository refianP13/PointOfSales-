<?php
session_start();
include('../../koneksi/koneksi.php');
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ($page-1)*$rows;
$result = array();
$q = $_REQUEST['q'];
$tb = $_REQUEST['tb'];
$id_outlet = $_SESSION['id_outlet'];
if($tb=="gudang"){
	$rs = mysql_query("SELECT COUNT(*) FROM barang, jenis_barang
	WHERE barang.id_jenis=jenis_barang.id_jenis AND barang.nm_barang LIKE '%$q%'");
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	$rs = mysql_query("SELECT * FROM barang, jenis_barang 
	WHERE barang.id_jenis=jenis_barang.id_jenis  
	AND barang.nm_barang LIKE '%$q%' LIMIT $offset,$rows");
}
else if($tb=="outlet"){
	$rs = mysql_query("SELECT COUNT(*) FROM barang_outlet, barang, jenis_barang WHERE 
	barang.id_jenis=jenis_barang.id_jenis AND barang_outlet.id_barang=barang.id_barang 
	AND barang_outlet.id_outlet='$id_outlet' AND barang_outlet.id_outlet='$id_outlet' 
	AND barang.nm_barang LIKE '%$q%'");
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	$rs = mysql_query("SELECT *, barang_outlet.stok as jml_stok FROM barang_outlet, 
	barang, jenis_barang WHERE barang.id_jenis=jenis_barang.id_jenis AND 
	barang_outlet.id_barang=barang.id_barang AND barang_outlet.id_outlet='$id_outlet' 
	AND barang_outlet.id_outlet='$id_outlet' 
	AND barang.nm_barang LIKE '%$q%' LIMIT $offset,$rows");
}
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);
?>