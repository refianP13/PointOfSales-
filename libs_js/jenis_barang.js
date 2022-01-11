// JavaScript Document
var url;
		function newData(){
			$('#dlg').dialog('open').dialog('setTitle','Tambah Data Jenis Barang');
			$('#fm').form('clear');
			$('#id_jenis').removeAttr('readonly','readonly');
			url = 'data_master/jenis_barang/save_jenis.php';
		}
		function editData(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Data Jenis Barang');
				$('#fm').form('load',row);
				$('#id_jenis').attr('readonly','readonly');
				url = 'data_master/jenis_barang/update_jenis.php';
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
						$.post('data_master/jenis_barang/remove_jenis.php',{id_jenis:row.id_jenis},function(result){
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