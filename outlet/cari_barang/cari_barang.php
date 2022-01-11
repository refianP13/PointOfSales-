<?php
$tb = $_GET['tb'];
$url="search.php?q='+q+'&tb=$tb";
?>
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
#header{
	margin-bottom: 30px;
}
#search{
	height: 100px;
	width: 500px;
	margin-top: 20px;
}
#data{
	height: 300px;
	margin-right: 20px;
	margin-left: 20px;
}
.title{
	font-size: 14pt;
	font-weight: bold;
	color: #000;
	margin-bottom: 30px;
	text-transform:uppercase;
}
body{
	background-image: url(../../mycss/images/bg.jpg);
}
</style>
<script type="text/javascript">
function cari(){
var q=$('#q').val();
$('#dg').datagrid({
url:'<?php echo $url; ?>'});
}
</script>
</head>

<body>
<div id="header">
<img src="../../mycss/images/logo.png" width="490" height="120" />
</div>
<div id="search">
<div class="tip icon-tip">&nbsp;</div>
		<div style="margin-bottom:20px; font-weight:bold;">Ketik nama barang pada field pencarian.</div>
<form method="post" id="fmCari">
  Cari Barang : 
    <input name="q" type="text" id="q"/>
  <a href="#" class="easyui-linkbutton" iconCls="icon-search" onclick="cari()">Cari</a>
</form>
</div>
<div id="data">
<table id="dg" title="DATA BARANG" class="easyui-datagrid" style="height:300px"
		 pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
            	<th field="id_barang" width="50">ID BARANG</th>
				<th field="nm_barang" width="70">NAMA BARANG</th>
				<th field="nm_jenis" width="30">JENIS</th>
                <th field="jml_stok" width="20">STOK</th>
                <th field="hrg_jual" width="50">HARGA JUAL</th>
			</tr>
		</thead>
	</table>
</div>
</body>
</html>