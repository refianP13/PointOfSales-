<?php
session_start();
$is_ajax = $_REQUEST['is_ajax'];
if(isset($is_ajax) && $is_ajax){
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	include('../koneksi/koneksi.php');
	$sql=mysql_query("SELECT * FROM outlet WHERE id_outlet='$username' AND password='$password'");
	$num_rows=mysql_num_rows($sql);
	if($num_rows>0){
		$rows=mysql_fetch_array($sql);
		$id_outlet=$rows['id_outlet'];
		$nm_outlet=$rows['nm_outlet'];
		$_SESSION['id_outlet']=$id_outlet;
		$_SESSION['nm_outlet']=$nm_outlet;
		echo "success";
	}
}
?>