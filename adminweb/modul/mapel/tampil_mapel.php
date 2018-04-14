<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form method='post' action='?module=tambah_mapel'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='7' bgcolor='#0066CC'valign='center'><font size='+1' color='#FFFFFF'>Data mapel</font></td></tr>
<tr><td width='20' align='center'>No</td>
<td width='200' align='center'>Mata Pelajaran</td>
<td width='50' align='center'>KKM</td>
<td width='100' align='center'>Jumlah jam</td>
<td width='200' align='center'>Kurikulum</td>
<td width='100' align='center' colspan='2'>Aksi</td></tr>";
$no=1;
$tampil=mysql_query("select*from mapel where id_jenjang='$_SESSION[jenjang]'");
while ($data=mysql_fetch_array($tampil)){
$tampil2=mysql_query("select*from kurikulum where id_kurikulum='$data[id_kurikulum]'");
while ($data2=mysql_fetch_array($tampil2)){
echo "
<tr>
<td align='center'>$no</td>
<td align='center'>$data[nama_mapel]</td>
<td align='center'>$data[standar_kkm]</td>
<td align='center'>$data[jumlah_jam] Jam</td>
<td align='center'>$data2[kurikulum]</td>
<td align='center' width='50'><a href='?module=edit_mapel&id=$data[id_mapel]'><img src='icon/edit.png'></a></td>
<td align='center' width='50'><a href='?module=hapus_mapel&id=$data[id_mapel]'><img src='icon/hapus.png'></a></td>
</tr>";
$no++;
}}
echo "
<tr><td colspan='7' bgcolor='#0066CC'><input type='submit' value='Tambah mapel' /></td></tr>
</table></form>";
}
?>