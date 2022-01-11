// JavaScript Document
$(document).ready(function() {
            //aktifkan ajax di form
            var op_cari = {
				success	  : showResponseCari,
				resetForm : true,
				dataType  : 'json'};
			var op_item={
				success	  : showResponseItem,
				resetForm : true,
				dataType  : 'json'};
			$('#form_cari').ajaxForm(op_cari);
			$('#form_item').ajaxForm(op_item);
			//mengambil data outlet
 			$.getJSON('get_id.php', function(json){
			$('#id_trx').val(json.id_trx);
			$('#id_outlet').val(json.id_outlet);
			});
});
function showResponseCari(responseText, statusText) {
			var data = responseText['data'];
			var pesan = responseText['pesan'];
			//alert(pesan);
			if(pesan>0){
			$('#id_barang').removeAttr('disabled','disabled').val(data.id_barang);
			$('#id_jenis').removeAttr('disabled','disabled').val(data.id_jenis);
			$('#nm_barang').removeAttr('disabled','disabled').val(data.nm_barang);
			$('#nm_jenis').removeAttr('disabled','disabled').val(data.nm_jenis);
			$('#stok').removeAttr('disabled','disabled').val(data.stok);
			$('#hrg_jual').removeAttr('disabled','disabled').val(data.hrg_jual);
			$('#jumlah').removeAttr('disabled','disabled').focus();}
			}
function showResponseItem(responseText, statusText) {
			var data = responseText['data'];
			var pesan = responseText['pesan'];
			//alert(pesan);
			$('#dg').datagrid('reload');
			$('#cari_id_brg').focus();
			}	
			
function editData(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Penjualan Barang');
				$('#fm').form('load',row);
				url = 'item/update_item.php?id_barang='+row.id_barang;
				}
		}
		function saveData(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
		}
		function removeData(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Anda yakin akan menghapus data ini?',function(r){
					if (r){
						$.post('item/remove_item.php',{id_barang:row.id_barang},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.msg
								});
							}
						},'json');
					}
				});
			}
		}
//fungsi untuk checkbox
function disab(cb, val){
 if(cb.checked == 1){
 document.getElementById('form_proses').style.display='block';
 document.getElementById('proses_request').disabled = false;
 } 
else {
 document.getElementById('form_proses').style.display='none';
 document.getElementById('proses_request').disabled = true;
 }
}