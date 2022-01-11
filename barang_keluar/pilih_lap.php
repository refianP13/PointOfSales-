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
<script type="text/javascript">
		function myformatter(date){
			var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
		}
		function myparser(s){
			if (!s) return new Date();
			var ss = (s.split('-'));
			var y = parseInt(ss[0],10);
			var m = parseInt(ss[1],10);
			var d = parseInt(ss[2],10);
			if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
				return new Date(y,m-1,d);
			} else {
				return new Date();
			}
		}
	</script>
</head>

<body>
<h2>LAPORAN BARANG KELUAR</h2>
<div class="info" style="margin-bottom:10px">
		<div class="tip icon-tip">&nbsp;</div>
		<div>Pilih periode tanggal laporan melalui datebox.</div>
</div>
    
<div style="margin:10px 0;"></div>
<form action="pilih_lap.php" id="fmFilter" method="post" novalidate>
Tanggal Awal: 
<input name="tgl_awal" class="easyui-datebox" id="tgl_awal" data-options="formatter:myformatter,parser:myparser"> 
Tanggal Akhir: 
</input>
    <input name="tgl_akhir" class="easyui-datebox" id="tgl_akhir" data-options="formatter:myformatter,parser:myparser"></input>
  <input type="submit"  name="button" id="button" value="OK" />
</form>
	<br />

<div id="tampil_lap">
<table id="dg" title="DATA BARANG KELUAR" class="easyui-datagrid" style="height:auto;"
			url="tampil_lap.php?tgl_awal=<?php echo $_REQUEST['tgl_awal'] ?>&tgl_akhir=<?php echo $_REQUEST['tgl_akhir']; ?>";
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
			  <th field="id_keluar" width="50">ID TRANSAKASI</th>
			  <th field="tgl_keluar" width="50">TANGGAL</th>
              <th field="id_outlet" width="50">OUTLET</th>
              <th field="id_barang" width="50">ID BARANG</th>
              <th field="jml_keluar" width="50">JML KELUAR</th>
              <th field="hrg_beli" width="50">HRG BELI</th>
              <th field="sub_total" width="50">SUB TOTAL</th>
			</tr>
		</thead>
  </table>
  <br />
  <a href="javascript:void(0);" class="easyui-linkbutton" iconCls="icon-pdf" plain="true" onclick="window.open('convert.php?tgl_awal=<?php echo $_POST['tgl_awal']; ?>&tgl_akhir=<?php echo $_POST['tgl_akhir']; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">PDF</a>
</div>
</body>
</html>
