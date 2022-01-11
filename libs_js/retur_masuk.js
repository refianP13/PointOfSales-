// JavaScript Document
$(document).ready(function() {
//mengambil id transaksi
$.getJSON('transaksi/retur_barang/get_id.php', function(json){
$('#id_trx').val(json.id_trx);
});
            //aktifkan ajax di form
            var op_cari = {
				success	  : showResponseCari,
				resetForm : true,
				dataType  : 'json'
			};
			$('#form_cari').ajaxForm(op_cari);
			});
function showResponseCari(responseText, statusText) {
			var data = responseText['data'];
			var pesan = responseText['pesan'];
			//alert(pesan);
			if(pesan>0){
			$('#id_masuk').removeAttr('disabled','disabled').val(data.id_masuk);
			$('#tgl_masuk').removeAttr('disabled','disabled').val(data.tgl_masuk);
			$('#id_user').removeAttr('disabled','disabled').val(data.id_user);
			$('#id_supplier').removeAttr('disabled','disabled').val(data.id_supplier);}
			}
var url;
		function addRetur(){
			var row = $('#dgMasuk').datagrid('getSelected');
			if (row){
				$('#dlgMasuk').dialog('open').dialog('setTitle','Tambah Item Retur Barang');
				$('#fmMasuk').form('load',row);
				$('#id_barang').attr('readonly','readonly');
				url = 'transaksi/retur_barang/add_retur.php?id_trx='+row.id_masuk;
			}
		}
		function saveRetur(){
			$('#fmMasuk').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlgMasuk').dialog('close');		// close the dialog
						$('#dgRetur').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
		}
		function editRetur(){
			var row = $('#dgRetur').datagrid('getSelected');
			if (row){
				$('#dlgRetur').dialog('open').dialog('setTitle','Edit Retur Barang');
				$('#fmRetur').form('load',row);
				$('#id_barang').attr('readonly','readonly');
				$('#jml').focus();
				url = 'transaksi/retur_barang/edit_retur.php?id_trx='+row.id_trx;
			}
		}
	function saveEditRetur(){
			$('#fmRetur').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlgRetur').dialog('close');		// close the dialog
						$('#dgRetur').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
		}	
		function removeRetur(){
			var row = $('#dgRetur').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Anda yakin akan menghapus data ini?',function(r){
					if (r){
						$.post('transaksi/retur_barang/remove_retur.php',{id_trx:row.id_trx,id_barang:row.id_barang},function(result){
							if (result.success){
								$('#dgRetur').datagrid('reload');	// reload the user data
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