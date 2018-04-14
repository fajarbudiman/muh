<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form action='?module=tambah_angkatan' method='post'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='5' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Tahun Ajaran</font></td></tr>
<tr>
<td width='20' align='center'>No</td>
<td width='200' align='center'>Tahun Ajaran</td>
<td width='200' align='center'>Kurikulum</td>
<td width='100' colspan='2' align='center'>Aksi</td>
</tr>";
$no=1;
$tampil=mysql_query("select*from angkatan order by id_angkatan");
while ($data=mysql_fetch_array($tampil)){
$tampil2=mysql_query("select*from kurikulum where id_kurikulum='$data[id_kurikulum]'");
while ($data2=mysql_fetch_array($tampil2)){
echo "
<tr>
<td width='25' align='center'>$no</td>
<td align='center'>$data[tahun_ajaran]</td>
<td align='center'>$data2[kurikulum]</td>
<td width='50' align='center'><a href='?module=edit_angkatan&id=$data[id_angkatan]'><img src='icon/edit.png'></a></td>
<td width='50' align='center'><a href='?module=hapus_angkatan&id=$data[id_angkatan]'><img src='icon/hapus.png'></a></td>
</tr>";
$no++;
}}
echo "
<tr><td colspan='5' bgcolor='#0066CC' ><input type='submit' value='Tambah angkatan'></td></tr>
</table></form>";
}
?>