<?php
include('../../koneksi/koneksi.php');
$id_trx=$_GET['id_trx'];
$tb=$_GET['tb'];
$query="SELECT * FROM barang,jenis_barang,detail_jual WHERE barang.id_barang=detail_jual.id_barang AND barang.id_jenis=jenis_barang.id_jenis 
AND detail_jual.id_jual='$id_trx'";
$sql=mysql_query($query);
$sql_outlet=mysql_query("SELECT * FROM penjualan,outlet WHERE penjualan.id_jual='$id_trx' AND outlet.id_outlet=penjualan.id_outlet");
$rows_outlet=mysql_fetch_array($sql_outlet);
$id_outlet=$rows_outlet['id_outlet'];
$nm_outlet=$rows_outlet['nm_outlet'];
$almt_outlet=$rows_outlet['almt_outlet'];
$nm_pelanggan=$rows_outlet['pelanggan'];
$almt_pelanggan=$rows_outlet['alamat'];
$tgl_trx=$rows_outlet['tgl_jual'];
$tgl=substr($tgl_trx,-2);
$bln=substr($tgl_trx,-5,2);
$thn=substr($tgl_trx,-10,4);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Faktur Penjualan</title>
<link rel="stylesheet" type="text/css" href="../../jquery_easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="../../jquery_easyui/themes/icon.css">
<script type="text/javascript" src="../../jquery_easyui/jquery.min.js"></script>
<script type="text/javascript" src="../../jquery_easyui/jquery.easyui.min.js"></script>
<style type="text/css">
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 8pt;
}
@media print {  
#button{display: none;} } 
</style>
</head>

<body>
<table width="750" border="0" align="center">
  <tr>
    <td><img src="../../mycss/images/logo.png" width="513" height="120" /></td>
  </tr>
  <tr>
    <td><h3 style="text-transform:uppercase">
    faktur penjualan barang stok <?php echo $tb; ?>
    </h3></td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td>No. Faktur : <?php echo $id_trx; ?></td>
        <td>Id Outlet : <?php echo $id_outlet; ?></td>
        <td>Nama Pelanggan : <?php echo $nm_pelanggan; ?></td>
      </tr>
      <tr>
        <td>Tgl Faktur : <?php echo date('d-m-Y'); ?> </td>
        <td>Nama Outlet : <?php echo $nm_outlet; ?></td>
        <td>Alamat Pelanggan : <?php echo $almt_pelanggan; ?></td>
      </tr>
      <tr>
        <td>Tgl Transaksi : <?php echo $tgl."-".$bln."-".$thn; ?></td>
        <td>Alamat Outlet : <?php echo $almt_outlet; ?></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" bgcolor="#CCCCCC">NO</td>
        <td align="center" bgcolor="#CCCCCC">ID BARANG</td>
        <td align="center" bgcolor="#CCCCCC">NAMA BARANG</td>
        <td align="center" bgcolor="#CCCCCC">JENIS BARANG</td>
        <td align="center" bgcolor="#CCCCCC">HARGA</td>
        <td align="center" bgcolor="#CCCCCC">QTY</td>
        <td align="center" bgcolor="#CCCCCC">SUB TOTAL</td>
      </tr>
     <?php
	 $i=0;
	 $total_jumlah=0;
	 $total_harga=0;
	  while($rows=mysql_fetch_array($sql)){
		  $id_barang=$rows['id_barang'];
		  $nm_barang=$rows['nm_barang'];
		  $jumlah=$rows['jml'];
		  $jenis=$rows['nm_jenis'];
		  $harga=$rows['hrg_jual'];
		  $sub_total=$rows['sub_total'];
		  $total_jumlah=$total_jumlah+$jumlah;
		  $total_harga=$total_harga+$sub_total;
		  $i++;
	  ?> 
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $id_barang; ?></td>
        <td><?php echo $nm_barang; ?></td>
        <td><?php echo $jenis; ?></td>
        <td><?php echo $harga; ?></td>
        <td><?php echo $jumlah; ?></td>
        <td><?php echo $sub_total; ?></td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="4" bgcolor="#CCCCCC">&nbsp;</td>
        <td bgcolor="#CCCCCC">TOTAL</td>
        <td bgcolor="#CCCCCC"><?php echo $total_jumlah; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $total_harga; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>Diterima Oleh<br />
    <br />
    (<?php echo $nm_pelanggan; ?>)</td>
  </tr>
  <tr>
    <td>
    <div id="button">
    <a href="penjualan.php?tb=<?php echo $tb; ?>" class="easyui-linkbutton" iconCls="icon-back" plain="true"></a>
<a href="#" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="print();"></a>
</div>
    </td>
  </tr>
</table>
</body>
</html>