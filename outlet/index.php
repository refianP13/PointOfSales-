<?php
session_start();
if(empty($_SESSION['id_outlet'])&&empty($_SESSION['nm_outlet'])){
header("location:login.php");
}
else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Utama Outlet</title>
<link rel="stylesheet" type="text/css" href="../mycss/hormenu.css"  />
</head>

<body>
<div id="header">
  <img src="../mycss/images/logo.png" width="491" height="120" /></div>
<div id="container">

  <div id="menu">
  	<span id="icon"><a href="penjualan/penjualan.php?tb=gudang">
    <img src="../mycss/images/order1.png" width="80" height="80" vspace="5" />
    Penjualan Stok Gudang</a></span>
    <span id="icon">
    <a href="penjualan/penjualan.php?tb=outlet">
    <img src="../mycss/images/order2.png" width="80" height="80" vspace="5" />
    Penjualan Stok Outlet</a>
    </span>
    <span id="icon">
    <a href="cek_stok/cek_stok.php?tb=gudang">
    <img src="../mycss/images/stack.png" width="80" height="80" vspace="5" /><br />
    Stok Barang Gudang</a>
    </span>
    <span id="icon">
    <a href="cek_stok/cek_stok.php?tb=outlet">
    <img src="../mycss/images/box.png" width="80" height="80" vspace="5" /><br />
    Stok Barang Outlet </a>
    </span>
    <span id="icon">
    <a href="cari_barang/cari_barang.php?tb=gudang">
    <img src="../mycss/images/search1.png" width="80" height="80" vspace="5" /><br />
    Cari Barang Gudang</a>
    </span>
     <span id="icon">
    <a href="cari_barang/cari_barang.php?tb=outlet">
    <img src="../mycss/images/search2.png" width="80" height="80" vspace="5" /><br />
    Cari Barang Outlet</a>
    </span>
    <span id="icon">
    <a href="../akses/logout.php?op=outlet">
    <img src="../mycss/images/log-off.png" width="80" height="80" vspace="10" /><br />
    Log Out</a>
    </span>
  </div>
</div>
</body>
</html>
<?php } ?>