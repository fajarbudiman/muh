<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form method='post' action='?module=tambah_kelas'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='7' bgcolor='#0066CC'valign='center'><font size='+1' color='#FFFFFF'>Data kelas</font></td></tr>
<tr><td width='20' align='center'>No</td>
<td width='100' align='center'>Kelas</td>
<td width='200' align='center'>Wali Kelas</td>
<td width='200' align='center'>Jumlah Siswa</td>
<td width='50' align='center'>Status</td>
<td width='200' align='center' colspan='2'>Aksi</td></tr>";
$no=1;
$tampil=mysql_query("select*from kelas where id_jenjang='$_SESSION[jenjang]'");
while ($data=mysql_fetch_array($tampil)){
echo "
<tr>
<td align='center'>$no</td>
<td align='center'>$data[nama_kelas]</td>
<td align='center'>$data[wali_kelas]</td>
<td align='center'>$data[jumlah_anak]</td>
<td align='center'>$data[aktifasi]</td>
<td align='center' width='50'><a href='?module=edit_kelas&id=$data[id_kelas]'><img src='icon/edit.png'></a></td>
<td align='center' width='50'><a href='?module=hapus_kelas&id=$data[id_kelas]'><img src='icon/hapus.png'></a></td>
</tr>";
$no++;
}
echo "
<tr><td colspan='7' bgcolor='#0066CC'><input type='submit' value='Tambah Kelas' /></td></tr>
</table></form>";
}
?>