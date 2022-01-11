// JavaScript Document
var url;
		function newData(){
			$('#dlg').dialog('open').dialog('setTitle','Tambah Data Barang');
			$('#fm').form('clear');
			$('#id_barang').removeAttr('readonly','readonly');
			url = 'data_master/barang/save_barang.php';
		}
		function editData(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Data Barang');
				$('#fm').form('load',row);
				$('#id_barang').attr('readonly','readonly');
				url = 'data_master/barang/update_barang.php';
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
						$.post('data_master/barang/remove_barang.php',{id_barang:row.id_barang},function(result){
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

$(document).ready(function(){
				
					$.getJSON('data_master/barang/get_jenis.php', function(json){
						$('#id_jenis').html('');
						$.each(json, function(index, row) {
							$('#id_jenis').append('<option value='+row.id_jenis+'>'+row.id_jenis+'/'+row.nm_jenis+'</option>');
						});
					});
				});