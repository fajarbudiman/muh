<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form method='post' action='?module=tambah_ekskul'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='7' bgcolor='#0066CC'valign='center'><font size='+1' color='#FFFFFF'>Data ekskul</font></td></tr>
<tr><td width='20' align='center'>No</td>
<td width='200' align='center'>Ekstrakurikuler</td>
<td width='50' align='center'>Pelatih</td>
<td width='50' align='center'>Hari</td>
<td width='100' align='center'>Waktu</td>
<td width='100' align='center' colspan='2'>Aksi</td></tr>";
$no=1;
$tampil=mysql_query("select*from ekskul");
while ($data=mysql_fetch_array($tampil)){
echo "
<tr>
<td align='center'>$no</td>
<td align='center'>$data[nama_ekskul]</td>
<td align='center'>$data[nama_guru]</td>
<td align='center'>$data[hari]</td>
<td align='center'>$data[jam] WIB - Selesai</td>
<td align='center' width='50'><a href='?module=edit_ekskul&id=$data[id_ekskul]'><img src='icon/edit.png'></a></td>
<td align='center' width='50'><a href='?module=hapus_ekskul&id=$data[id_ekskul]'><img src='icon/hapus.png'></a></td>
</tr>";
$no++;
}
echo "
<tr><td colspan='7' bgcolor='#0066CC'><input type='submit' value='Tambah ekskul' /></td></tr>
</table></form>";
}
?>