<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else {
echo "
<form method='post' action='?module=tambah_kurikulum'>
<table cellpadding='0' cellspacing='0' border='0'>
<tr>
  <td colspan='8' bgcolor='#0066CC' valign='center' height='50'><font size='+1' color='#FFFFFF'><b>&nbsp;kurikulum Bidang</b></font></td>
</tr>
<tr><td width='25' align='center'>No</td>
<td width='150' align='center'>kurikulum</td>
<td width='100' align='center' colspan='2'>Aksi</td></tr>";
$no=1;
$tampil=mysql_query("select*from kurikulum");
while ($data=mysql_fetch_array($tampil)){
echo "
<tr>
<td align='center'>$no</td>
<td align='center'>$data[kurikulum]</td>
<td width='50' align='center'><a href='?module=edit_kurikulum&id=$data[id_kurikulum]'><img src='icon/edit.png'></a></td>
<td width='50' align='center'><a href='?module=hapus_kurikulum&id=$data[id_kurikulum]'><img src='icon/hapus.png'></a></td>
</tr>";
$no++;
}
echo "
<tr><td colspan='8' bgcolor='#0066CC' valign='center' height='45' align='right'><input type='submit' value='Tambah kurikulum'>&nbsp;</td></tr>
</table></form>"; }
?>