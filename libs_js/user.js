// JavaScript Document
var url;
		function newData(){
			$('#dlg').dialog('open').dialog('setTitle','Tambah Data User');
			$('#fm').form('clear');
			$('#id_user').removeAttr('readonly','readonly');
			url = 'data_master/user/save_user.php';
		}
		function editData(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Data User');
				$('#fm').form('load',row);
				$('#id_user').attr('readonly','readonly');
				url = 'data_master/user/update_user.php';
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
						$.post('data_master/user/remove_user.php',{id_user:row.id_user},function(result){
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