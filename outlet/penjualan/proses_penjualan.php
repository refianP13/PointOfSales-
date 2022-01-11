<?php
include('../../koneksi/koneksi.php');
session_start();
$id_trx=$_SESSION['id_penjualan'];
$tgl=date('Ymd');
$id_outlet=$_POST['id_outlet'];
$nm_pelanggan=$_POST['nm_pelanggan'];
$almt=$_POST['alamat'];
$tb_barang=$_GET['tb'];
$total_jual=0;
$query_ambil_item="SELECT *, SUM(jml) as total_jual FROM temp_barang WHERE id_trx='$id_trx' GROUP BY id_barang";
$sql_ambil_item=mysql_query($query_ambil_item);
while($rows_ambil_item=mysql_fetch_array($sql_ambil_item)){
	$id_barang=$rows_ambil_item['id_barang'];
	$jml_jual=$rows_ambil_item['total_jual'];
	$hrg=$rows_ambil_item['hrg'];
	$sub_total=$rows_ambil_item['sub_total'];
	$time=$rows_ambil_item['time'];
	if($tb_barang=='gudang'){
		$query_ambil_stok="SELECT * FROM barang WHERE id_barang='$id_barang'";
		$sql_ambil_stok=mysql_query($query_ambil_stok);
		$rows_ambil_stok=mysql_fetch_array($sql_ambil_stok);
		$stok_awal=$rows_ambil_stok['stok'];
		$stok_akhir=$stok_awal-$jml_jual;

		$query_update_stok="UPDATE barang SET stok='$stok_akhir' 
		WHERE id_barang='$id_barang'";
		$sql_update_stok=mysql_query($query_update_stok);
		$nm_stok="Stok Gudang";
		$halaman="penjualan_gudang.php";
		$faktur="faktur_penjualan.php?id_trx=".$id_trx."&tb=".$tb_barang;
	}
	else if($tb_barang=='outlet'){
		$query_ambil_stok="SELECT * FROM barang_outlet 
		WHERE id_barang='$id_barang' AND id_outlet='$id_outlet'";
		$sql_ambil_stok=mysql_query($query_ambil_stok);
		$rows_ambil_stok=mysql_fetch_array($sql_ambil_stok);
		$stok_awal=$rows_ambil_stok['stok'];
		$stok_akhir=$stok_awal-$jml_jual;

		$query_update_stok="UPDATE barang_outlet SET stok='$stok_akhir' 
		WHERE id_barang='$id_barang' AND id_outlet='$id_outlet'";
		$sql_update_stok=mysql_query($query_update_stok);
		$nm_stok="Stok Outlet";
		$halaman="penjualan_outlet.php";
		$faktur="faktur_penjualan.php?id_trx=".$id_trx."&tb=".$tb_barang;
	}

	if($sql_update_stok){
		$query_detail_jual="INSERT INTO detail_jual VALUES
		('','$id_trx','$id_barang','$stok_awal','$jml_jual',
		'$hrg','$sub_total','$time')";
		$sql_detail_jual=mysql_query($query_detail_jual);
	}
	$total_jual=$sub_total+$total_jual;
	$stt="ok";
}
if($stt=="ok"){
	$query_jual="INSERT INTO penjualan VALUES
	('$id_trx','$tgl','$nm_pelanggan','$almt',
	'$id_outlet','$total_jual',NULL,'$nm_stok')";
	$sql_jual=mysql_query($query_jual);
	if($sql_jual)
		{
			$empty_temp=mysql_query("DELETE FROM temp_barang WHERE id_trx='$id_trx'");
			$_SESSION['id_penjualan']="";
			unset($_SESSION['id_penjualan']);
			echo "<script type='text/javascript'> 
				alert('Data sudah diproses.... Menampilkan Faktur');
				window.location='$faktur'; </script> ";
		}
}
else{
	echo "<script type='text/javascript'> 
	alert('Proses Gagal !!!'); window.location='$halaman'; </script> ";
}
?>