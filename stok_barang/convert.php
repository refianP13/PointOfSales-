<?php
session_start();
ob_start();
include('../../koneksi/koneksi.php');
$sql = mysql_query("SELECT * FROM barang, jenis_barang 
WHERE barang.id_jenis = jenis_barang.id_jenis ORDER BY barang.id_barang ASC");
$num_rows=mysql_num_rows($sql);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Stok Barang</title>
<link rel="stylesheet" type="text/css" href="../../mycss/laporan.css" />
</head>
<body>
<div id="logo">
<img src="../../mycss/images/logo3.png" width="491" height="120"></div>
<div id="title">
<br>
 LAPORAN STOK BARANG
</div>
  <div id="isi">
  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr class="tr-title">
  	<td>NO</td>
    <td>ID BARANG</td>
    <td>NAMA BARANG</td>
    <td>JENIS</td>
    <td>HRG BELI</td>
    <td>HRG JUAL</td>
    <td>STOK</td>
  </tr>
<?php
	$total_stok=0;
	for($i=1; $i<=$num_rows; $i++){
	$rows=mysql_fetch_array($sql);
	$id_barang=$rows['id_barang'];
	$nm_barang=$rows['nm_barang'];
	$nm_jenis=$rows['nm_jenis'];
	$hrg_beli=$rows['hrg_beli'];
	$hrg_jual=$rows['hrg_jual'];
	$stok=$rows['stok'];
	$total_stok=$stok+$total_stok;
   	echo "  <tr>
			<td>$i</td>
			<td>$id_barang</td>
			<td>$nm_barang</td>
			<td>$nm_jenis</td>
			<td>$hrg_beli</td>
			<td>$hrg_jual</td>
			<td>$stok</td>
		</tr>";
	}
	echo "<tr>
    <td colspan='6' align='right'>TOTAL</td>
    <td>$total_stok</td>
  </tr>";
 ?>
</table>
</div>


</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="Laporan Stok Barang.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
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