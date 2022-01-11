<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Barang Keluar</title>

<link rel="stylesheet" type="text/css" href="../../jquery_easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="../../jquery_easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="../../jquery_easyui/themes/style.css" />
<script type="text/javascript" src="../../jquery_easyui/jquery.min.js"></script>
<script type="text/javascript" src="../../jquery_easyui/jquery.easyui.min.js"></script>

</head>

<body>
<h2>LAPORAN STOK BARANG</h2>


<div id="tampil_lap">
<table id="dg" title="DATA STOK BARANG" class="easyui-datagrid" style="height:auto;"
url="tampil_lap.php"; rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
			  <th field="id_barang" width="50">ID BARANG</th>
			  <th field="nm_barang" width="70">NAMA BARANG</th>
              <th field="nm_jenis" width="50">JENIS</th>
              <th field="hrg_beli" width="30">HRG BELI</th>
              <th field="hrg_jual" width="30">HRG JUAL</th>
              <th field="stok" width="20">STOK</th>
			</tr>
		</thead>
  </table>
  <br />
  <a href="javascript:void(0);" class="easyui-linkbutton" iconCls="icon-pdf" plain="true" onclick="window.open('convert.php','Laporan Stok Barang','size=800,height=800,scrollbars=yes,resizeable=no')">PDF</a>
</div>
</body>
</html>
