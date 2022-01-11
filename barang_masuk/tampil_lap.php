<?php
include('../../koneksi/koneksi.php');
$tgl_awal = $_REQUEST['tgl_awal'];
$tgl_akhir = $_REQUEST['tgl_akhir'];
$rs = mysql_query("SELECT COUNT(*) FROM barang_masuk");
$row = mysql_fetch_row($rs);
$result = array();
$result["total"] = $row[0];
$rs = mysql_query("SELECT * FROM barang_masuk, detail_barang_masuk WHERE barang_masuk.id_masuk = detail_barang_masuk.id_masuk AND tgl_masuk BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY detail_barang_masuk.time ASC");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);
?>