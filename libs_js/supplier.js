// JavaScript Document
var url;
		function newData(){
			$('#dlg').dialog('open').dialog('setTitle','Tambah Data Supplier');
			$('#fm').form('clear');
			$('#id_supplier').removeAttr('readonly','readonly');
			url = 'data_master/supplier/save_supplier.php';
		}
		function editData(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Data Supplier');
				$('#fm').form('load',row);
				$('#id_supplier').attr('readonly','readonly');
				url = 'data_master/supplier/update_supplier.php';
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
						$.post('data_master/supplier/remove_supplier.php',{id_supplier:row.id_supplier},function(result){
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