<?php
include('../../koneksi/koneksi.php');
$rs = mysql_query("SELECT COUNT(*) FROM barang");
$row = mysql_fetch_row($rs);
$rs = mysql_query("SELECT * FROM barang, jenis_barang 
WHERE barang.id_jenis = jenis_barang.id_jenis ORDER BY barang.id_barang ASC");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result = array();
$result["rows"] = $items;
echo json_encode($result);
?>