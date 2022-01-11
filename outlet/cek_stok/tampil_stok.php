<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../../jquery_easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="../../jquery_easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="../../jquery_easyui/themes/style.css">
<script type="text/javascript" src="../../jquery_easyui/jquery.min.js"></script>
<script type="text/javascript" src="../../jquery_easyui/jquery.easyui.min.js"></script>
<style type="text/css">
body {
	background-image: url(../../mycss/images/bg.jpg);
	font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>

<body>
<div id="header" style="margin-bottom:15px">
  <img src="../../mycss/images/logo.png" width="490" height="120" />
</div>
<table id="dg" title="DATA STOK BARANG GUDANG" class="easyui-datagrid" style="height:400px" url="<?php echo "get_item.php?id_jenis=".$_GET['id_jenis']."&tb=".$_GET['tb']; ?>"pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
            	<th field="id_barang" width="100">ID BARANG</th>
				<th field="nm_barang" width="100">NAMA BARANG</th>
				<th field="stok" width="50">STOK</th>
				<th field="hrg_jual" width="100">HARGA JUAL</th>
			</tr>
		</thead>
	</table>
</body>
</html>