<?php
include('../../koneksi/koneksi.php');
session_start();
$id_trx=$_SESSION['id_trx_masuk'];
$tgl=date('Ymd');
$id_user=$_SESSION['id_user'];
$id_supplier=$_POST['id_supplier'];

$query_ambil_item="SELECT *, SUM(jml) as total_masuk FROM temp_barang WHERE id_trx='$id_trx' GROUP BY id_barang";
$sql_ambil_item=mysql_query($query_ambil_item);
while($rows_ambil_item=mysql_fetch_array($sql_ambil_item)){
	$id_barang=$rows_ambil_item['id_barang'];
	$jml_masuk=$rows_ambil_item['total_masuk'];
	$hrg_beli=$rows_ambil_item['hrg'];
	$sub_total=$rows_ambil_item['sub_total'];
	$time=$rows_ambil_item['time'];
	
		$query_ambil_stok="SELECT * FROM barang WHERE id_barang='$id_barang'";
		$sql_ambil_stok=mysql_query($query_ambil_stok);
		$rows_ambil_stok=mysql_fetch_array($sql_ambil_stok);
		$stok_awal=$rows_ambil_stok['stok'];
		$stok_akhir=$stok_awal+$jml_masuk;
		
		$query_update_stok="UPDATE barang SET stok='$stok_akhir' WHERE id_barang='$id_barang'";
		$sql_update_stok=mysql_query($query_update_stok);
		if($sql_update_stok){

		$query_detail_masuk="INSERT INTO detail_barang_masuk VALUES('','$id_trx','$id_barang','$stok_awal','$jml_masuk','$hrg_beli','$sub_total','$time')";
		$sql_detail_masuk=mysql_query($query_detail_masuk);
		}
		$stt="ok";
}
if($stt=="ok"){
$query_barang_masuk="INSERT INTO barang_masuk VALUES('$id_trx','$tgl','$id_user','$id_supplier',NULL)";
$sql_barang_masuk=mysql_query($query_barang_masuk);
$empty_temp=mysql_query("DELETE FROM temp_barang WHERE id_trx='$id_trx'");
$_SESSION['id_trx']="";
unset($_SESSION['id_trx']);
echo "<script type='text/javascript'> 
alert('Barang masuk sudah diproses.. Menampilkan faktur..'); window.location='faktur.php?id_trx=$id_trx'; </script> ";
}
else{
echo "<script type='text/javascript'> 
alert('Gagal memproses data!!!..'); window.location='../../barang_masuk.php'; </script> ";
}
?>