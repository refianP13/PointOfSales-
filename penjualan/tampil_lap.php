<?php
include('../../koneksi/koneksi.php');
$tgl_awal = $_REQUEST['tgl_awal'];
$tgl_akhir = $_REQUEST['tgl_akhir'];
$rs = mysql_query("SELECT COUNT(*) FROM penjualan");
$row = mysql_fetch_row($rs);
$result = array();
$result["total"] = $row[0];
$rs = mysql_query("SELECT * FROM penjualan WHERE tgl_jual BETWEEN '$tgl_awal' AND '$tgl_akhir'");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);
?>