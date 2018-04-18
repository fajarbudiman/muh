<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form method='post' action='?module=tambah_jenis'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='6' bgcolor='#0066CC'valign='center'><font size='+1' color='#FFFFFF'>Jenis-jenis Pembayaran</font></td></tr>
<tr><td width='20' align='center'>No</td>
<td width='100' align='center'>Pembiayaan</td>
<td width='200' align='center'>Besaran</td>
<td width='200' align='center'>Biaya Komite</td>
<td width='200' align='center' colspan='2'>Aksi</td></tr>";
$no=1;
$tampil=mysql_query("select*from jenis_bayaran where id_jenjang='$_SESSION[jenjang]'");
while ($data=mysql_fetch_array($tampil)){
$harga=$data['harga'];
$komit=$data['komite'];
$format_harga=number_format($harga, 0, ",", ".");
$format_komit=number_format($komit, 0, ",", ".");
echo "
<tr>
<td align='center'>$no</td>
<td align='center'>$data[nama_bayar]</td>
<td align='center'>Rp. $format_harga</td>
<td align='center'>Rp. $format_komit</td>
<td align='center' width='50'><a href='?module=edit_jenis&id=$data[id_jenisbayar]'><img src='icon/edit.png'></a></td>
<td align='center' width='50'><a href='?module=hapus_jenis&id=$data[id_jenisbayar]'><img src='icon/hapus.png'></a></td>
</tr>";
$no++;
}
echo "
<tr><td colspan='6' bgcolor='#0066CC'><input type='submit' value='Tambah Pembiayaan' /></td></tr>
</table></form>";
}
?>