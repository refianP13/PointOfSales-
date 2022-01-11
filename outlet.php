<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DATA OUTLET</title>
<link rel="stylesheet" type="text/css" href="jquery_easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="jquery_easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="jquery_easyui/themes/style.css">
<script type="text/javascript" src="jquery_easyui/jquery.min.js"></script>
<script type="text/javascript" src="jquery_easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="libs_js/outlet.js"></script>
</head>

<body>
<h2>OLAH DATA OUTLET</h2>
<div class="info" style="margin-bottom:10px">
		<div class="tip icon-tip">&nbsp;</div>
		<div>Klik tombol pada datagrid toolbar untuk melakukan perubahan data.</div>
	</div>
	
	<table id="dg" title="DATA OUTLET" class="easyui-datagrid" style="height:250px"
			url="data_master/outlet/get_outlet.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
            	<th field="id_outlet" width="50">ID OUTLET</th>
				<th field="nm_outlet" width="50">NAMA OUTLET</th>
				<th field="almt_outlet" width="50">ALAMAT OUTLET</th>
				<th field="tlp_outlet" width="50">TELEPON</th>
			</tr>
		</thead>
	</table>
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newData()">Data Baru</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editData()">Edit Data</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeData()">Hapus Data</a>
	</div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px;height:310px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Informasi Outlet</div>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>Id Outlet:</label>
			  	<input name="id_outlet" id="id_outlet" class="easyui-validatebox" required="true">
			</div>
		    <div class="fitem">
				<label>Nama Outlet:</label>
			  	<input name="nm_outlet" class="easyui-validatebox" required="true">
			</div>
            <div class="fitem">
		  	  <label>Alamat Outlet:</label>

                <textarea name="almt_outlet" cols="15" rows="3" class="easyui-validatebox" required="true"></textarea>
		  	</div>
          <div class="fitem">
			<label>Telepon:</label>
		  	  <input name="tlp_outlet" class="easyui-validatebox" required="true" >
			</div>
            <div class="fitem">
			<label>Password:</label>
		  	  <input name="password" type="password" class="easyui-validatebox" required="true" >
			</div>
         </form>
	</div>
	<div id="dlg-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveData()">Save</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
</body>
</html>