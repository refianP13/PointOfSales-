<?php
$result = array();
include('../../koneksi/koneksi.php');
$tgl_awal = $_REQUEST['tgl_awal'];
$tgl_akhir = $_REQUEST['tgl_akhir'];
$rs = mysql_query("SELECT COUNT(*) FROM barang_keluar");
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];
$rs = mysql_query("SELECT * FROM barang_keluar, detail_barang_keluar WHERE barang_keluar.id_keluar = detail_barang_keluar.id_keluar AND tgl_keluar BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY detail_barang_keluar.time ASC");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);
?>