<?php
include('../../koneksi/koneksi.php');
$tb=$_GET['tb'];
$sql_jenis=mysql_query("SELECT jenis_barang.* FROM jenis_barang ORDER BY nm_jenis ASC");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cek Stok <?php echo $tb; ?></title>
<link href="../../mycss/hormenu.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<div id="header">
  <img src="../../mycss/images/logo.png" width="490" height="120" /></div>
<h3 style="text-transform:uppercase">CEK STOK BARANG <?php echo $tb;?></h3>
  <div id="menu">
 <?php
 while($rows_jenis=mysql_fetch_array($sql_jenis)){
	 $id_jenis=$rows_jenis['id_jenis'];
	 $nm_jenis=$rows_jenis['nm_jenis'];
 ?>
  	<span id="icon">
    <a href="tampil_stok.php?id_jenis=<?php echo $id_jenis; ?>&tb=<?php echo $tb; ?>">
    <img src="../../mycss/images/order.png" width="80" height="80" vspace="5" /><br />
    <?php echo $nm_jenis; ?></a>
    </span>
<?php } ?>
  </div>
</div>
</body>
</html>