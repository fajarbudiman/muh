<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else {
echo "
<form method='post' action='?module=tambah_jenjang'>
<table cellpadding='0' cellspacing='0' border='0'>
<tr>
  <td colspan='8' bgcolor='#0066CC' valign='center' height='50'><font size='+1' color='#FFFFFF'><b>&nbsp;jenjang Bidang</b></font></td>
</tr>
<tr><td width='25' align='center'>No</td>
<td width='150' align='center'>jenjang</td>
<td width='100' align='center' colspan='2'>Aksi</td></tr>";
$no=1;
$tampil=mysql_query("select*from jenjang");
while ($data=mysql_fetch_array($tampil)){
echo "
<tr>
<td align='center'>$no</td>
<td align='center'>$data[nama_jenjang]</td>
<td align='center' width='50'><a href='?module=edit_jenjang&id=$data[id_jenjang]'><img src='icon/edit.png'></a></td>
<td align='center' width='50'><a href='?module=hapus_jenjang&id=$data[id_jenjang]'><img src='icon/hapus.png'></a></td>
</tr>";
$no++;
}
echo "
<tr><td colspan='8' bgcolor='#0066CC' valign='center' height='45' align='right'><input type='submit' value='Tambah jenjang'>&nbsp;</td></tr>
</table></form>"; }
?>