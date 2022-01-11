<?php 
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	include('../../koneksi/koneksi.php');
	
	$rs = mysql_query("SELECT COUNT(*) FROM barang, jenis_barang WHERE barang.id_jenis=jenis_barang.id_jenis");
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	$rs = mysql_query("SELECT * FROM barang, jenis_barang WHERE barang.id_jenis=jenis_barang.id_jenis LIMIT $offset,$rows");
	
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo json_encode($result);

?>