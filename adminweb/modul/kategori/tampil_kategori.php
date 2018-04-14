<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form action='?module=tambah_kategori' method='post'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='4' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Kategori Barang</font></td></tr>
<tr>
<td width='20' align='center'>No</td>
<td width='200' align='center'>Nama Kategori</td>
<td width='100' colspan='2' align='center'>Aksi</td>
</tr>";
$no=1;
$tampil=mysql_query("select*from kategori");
while ($data=mysql_fetch_array($tampil)){
echo "
<tr>
<td width='25' align='center'>$no</td>
<td align='center'>$data[kategori]</td>
<td width='50' align='center'><a href='?module=edit_kategori&id=$data[id_kategori]'><img src='icon/edit.png'></a></td>
<td width='50' align='center'><a href='?module=hapus_kategori&id=$data[id_kategori]'><img src='icon/hapus.png'></a></td>
</tr>";
$no++;
}
echo "
<tr><td colspan='4' bgcolor='#0066CC' ><input type='submit' value='Tambah Kategori'></td></tr>
</table></form>";
}
?>