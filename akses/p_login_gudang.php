<?php 
session_start();
	$is_ajax = $_REQUEST['is_ajax'];
	if(isset($is_ajax) && $is_ajax)
	{
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		
		include('../koneksi/koneksi.php');
		$sql=mysql_query("SELECT * FROM user WHERE id_user='$username' AND password='$password'");
		$num_rows=mysql_num_rows($sql);
		
		if($num_rows>0)
		{
			$rows=mysql_fetch_array($sql);
			$id_user=$rows['id_user'];
			$nm_user=$rows['nm_user'];
			$level=$rows['level'];
			$_SESSION['id_user']=$id_user;
			$_SESSION['nm_user']=$nm_user;
			$_SESSION['level']=$level;
			echo "success";
		}
	}

?>