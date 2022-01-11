<?php
include('../../koneksi/koneksi.php');
session_start();
$id_trx=$_SESSION['id_trx_keluar'];
$tgl=date('Ymd');
$id_user=$_SESSION['id_user'];
$id_outlet=$_POST['id_outlet'];
$query_ambil_item="SELECT *, SUM(jml) as total_keluar FROM temp_barang WHERE id_trx='$id_trx' GROUP BY id_barang";
$sql_ambil_item=mysql_query($query_ambil_item);
while($rows_ambil_item=mysql_fetch_array($sql_ambil_item)){
$id_barang=$rows_ambil_item['id_barang'];
$jml_keluar=$rows_ambil_item['total_keluar'];
$hrg_beli=$rows_ambil_item['hrg'];
$sub_total=$rows_ambil_item['sub_total'];
$time=$rows_ambil_item['time'];

$query_ambil_stok="SELECT * FROM barang WHERE id_barang='$id_barang'";
$sql_ambil_stok=mysql_query($query_ambil_stok);
$rows_ambil_stok=mysql_fetch_array($sql_ambil_stok);
$stok_awal=$rows_ambil_stok['stok'];
$stok_akhir=$stok_awal-$jml_keluar;

$query_update_stok="UPDATE barang SET stok='$stok_akhir' WHERE id_barang='$id_barang'";
$sql_update_stok=mysql_query($query_update_stok);
if($sql_update_stok){
	$query_detail_keluar="INSERT INTO detail_barang_keluar VALUES('','$id_trx','$id_barang','$stok_awal','$jml_keluar','$hrg_beli','$sub_total','$time')";
	$sql_detail_keluar=mysql_query($query_detail_keluar);
	$cek_barang_outlet=mysql_query("SELECT * FROM barang_outlet WHERE id_outlet='$id_outlet' AND id_barang='$id_barang'");
	if(mysql_num_rows($cek_barang_outlet)>0){
		$ambil_stok=mysql_query("SELECT stok FROM barang_outlet WHERE id_outlet='$id_outlet' AND id_barang='$id_barang'");
		$rows_stok=mysql_fetch_array($ambil_stok);
		$stok_awal_outlet=$rows_stok['stok'];
		$stok_akhir_outlet=$stok_awal_outlet+$jml_keluar;
		$update_stok_outlet=mysql_query("UPDATE barang_outlet SET stok='$stok_akhir_outlet' WHERE id_outlet='$id_outlet' AND id_barang='$id_barang'");	
		}
	else{
		$insert_stok_outlet=mysql_query("INSERT INTO barang_outlet VALUES('$id_outlet','$id_barang','$jml_keluar')");
		}
	}
	$stt="ok";
}

if($stt=="ok"){
$query_barang_keluar="INSERT INTO barang_keluar VALUES('$id_trx','$tgl','$id_user','$id_outlet',NULL)";
$sql_barang_keluar=mysql_query($query_barang_keluar);

$empty_temp=mysql_query("DELETE FROM temp_barang WHERE id_trx='$id_trx'");
$_SESSION['id_trx_keluar']="";
unset($_SESSION['id_trx_keluar']);
echo "<script type='text/javascript'> 
alert('Data sudah diproses.... Menampilkan Faktur'); window.location='faktur.php?id_trx=$id_trx'; </script> ";
}
else{
echo "<script type='text/javascript'> 
alert('Proses Gagal !!!'); window.location='../../barang_keluar.php'; </script> ";
}
?>