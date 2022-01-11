<?php
include('../../koneksi/koneksi.php');
$rs = mysql_query("SELECT COUNT(*) FROM outlet");
$row = mysql_fetch_row($rs);
$rs = mysql_query("SELECT * FROM outlet");
$outlet = array();
while($row = mysql_fetch_object($rs)){
	array_push($outlet, $row);
}
echo json_encode($outlet);
?>