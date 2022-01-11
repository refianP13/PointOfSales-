<?php
session_start();
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ($page-1)*$rows;
$result = array();
$id_trx=$_SESSION['id_penjualan'];
include('../../koneksi/koneksi.php');
$rs = mysql_query("SELECT COUNT(*) FROM temp_barang WHERE temp_barang.id_trx='$id_trx'");
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];
$rs = mysql_query("SELECT * FROM temp_barang,barang,jenis_barang WHERE temp_barang.id_barang=barang.id_barang AND barang.id_jenis=jenis_barang.id_jenis AND temp_barang.id_trx='$id_trx' LIMIT $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);
?>