<?php
session_start();
include('../../koneksi/koneksi.php');
$id_outlet=$_SESSION['id_outlet'];
$query_id_max="SELECT MAX(id_jual) as max_id FROM penjualan WHERE id_jual LIKE '$id_outlet%'";
$sql_id_max=mysql_query($query_id_max);
$rows_id_max=mysql_fetch_array($sql_id_max);
$max_id=$rows_id_max['max_id']; 
$kode_req=$id_outlet.date('ymd');
$no_urut=substr($max_id,-5); 
$new_urut=$no_urut+1;
$id_trx=$kode_req.sprintf("%05s",$new_urut); 
$_SESSION['id_penjualan']=$id_trx;
$data=array("id_trx"=>$id_trx,"id_outlet"=>$id_outlet);
echo json_encode($data);
?>