<?php 
include('../../koneksi/koneksi.php');
$rs = mysql_query("SELECT COUNT(*) FROM supplier");
$row = mysql_fetch_row($rs);
$rs = mysql_query("SELECT * FROM supplier");
$supplier = array();
while($row = mysql_fetch_object($rs)){
	array_push($supplier, $row);
	}
echo json_encode($supplier);
?>