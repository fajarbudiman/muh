<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form method='post' action='?module=tambah_admin'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='8' bgcolor='#0066CC'valign='center'><font size='+1' color='#FFFFFF'>Data Admin</font></td></tr>
<tr><td width='20' align='center'>No</td>
<td width='100' align='center'>Jenjang</td>
<td width='100' align='center'>nuptk</td>
<td width='200' align='center'>Nama Lengkap</td>
<td width='100' align='center'>tlp</td>
<td width='100' align='center' colspan='2'>Aksi</td></tr>";
$no=1;
$tampil=mysql_query("select*from admin");
while ($data=mysql_fetch_array($tampil)){
$tampil2=mysql_query("select*from jenjang where id_jenjang='$data[id_jenjang]'");
while ($show=mysql_fetch_array($tampil2)){
echo "
<tr>
<td align='center'>$no</td>
<td align='center'>$show[nama_jenjang]</td>
<td align='center'>$data[nuptk]</td>
<td align='center'>$data[nama_lengkap]</td>
<td align='center'>$data[tlp]</td>
<td align='center' width='50'><a href='?module=edit_admin&id=$data[id_admin]'><img src='icon/edit.png'></a></td>
<td align='center' width='50'><a href='?module=hapus_admin&id=$data[id_admin]'><img src='icon/hapus.png'></a></td>
</tr>";
$no++;
}}
echo "
<tr><td colspan='8' bgcolor='#0066CC'><input type='submit' value='Tambah pelanggan' /></td></tr>
</table></form>";
}
?>