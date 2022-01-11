<?php
session_start();
ob_start();
include('../../koneksi/koneksi.php');
$tgl_awal=$_GET['tgl_awal'];
$tgl_akhir=$_GET['tgl_akhir'];
$sql = mysql_query("SELECT * FROM penjualan WHERE tgl_jual BETWEEN '$tgl_awal' AND '$tgl_akhir'");
$num_rows=mysql_num_rows($sql);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Penjualan</title>
<link rel="stylesheet" type="text/css" href="../../mycss/laporan.css" />
</head>
<body>
<div id="logo">
<img src="../../mycss/images/logo2.png" width="491" height="120"></div>
<div id="title"><br>
 LAPORAN PENJUALAN TANGGAL <?php echo "$tgl_awal S/D $tgl_akhir"; ?>
</div>
  <div id="isi">
  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr class="tr-title">
  	<td>NO</td>
    <td>ID TRANSAKSI</td>
    <td>TANGGAL</td>
    <td>PELANGGAN</td>
    <td>OUTLET</td>
    <td>TOTAL TRANSAKSI</td>
    <td>KETERANGAN</td>
  </tr>
<?php
	$total_seluruh=0;
	for($i=1; $i<=$num_rows; $i++){
	$rows=mysql_fetch_array($sql);
	$id_jual=$rows['id_jual'];
	$tgl_jual=$rows['tgl_jual'];
	$pelanggan=$rows['pelanggan'];
	$alamat=$rows['alamat'];
	$id_outlet=$rows['id_outlet'];
	$total=$rows['total'];
	$ket=$rows['ket'];
	$total_seluruh=$total+$total_seluruh;
	$isi="	<tr>
			<td>$i</td>
			<td>$id_jual</td>
			<td>$tgl_jual</td>
			<td>$pelanggan</td>
			<td>$id_outlet</td>
			<td>$total</td>
			<td>$ket</td>
		</tr>";
	echo "$isi";
	}
	echo "<tr>
    <td colspan='5' align='right'>TOTAL</td>
    <td>$total_seluruh</td>
	<td>&nbsp;</td>
  </tr>";
 ?>
  
</table>
</div>


</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="Laporan Penjualan.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
	$content = '<page style="font-family: freeserif">'.($content).'</page>';
	require_once('../../html2pdf_v4.03/html2pdf.class.php');
	try
	{
		$html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(20, 10, 10, 10));
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>