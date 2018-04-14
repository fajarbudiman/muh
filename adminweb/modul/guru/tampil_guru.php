<?php
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form method='post' action='?module=tambah_guru'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='7' bgcolor='#0066CC'valign='center'><font size='+1' color='#FFFFFF'>Data guru</font></td></tr>
<tr><td width='20' align='center'>No</td>
<td width='100' align='center'>NUPTK/PegId</td>
<td width='200' align='center'>Nama Lengkap</td>
<td width='200' align='center'>Email</td>
<td width='100' align='center' colspan='2'>Aksi</td></tr>";
$no=1;
$tampil=mysql_query("select*from guru order by nama_guru");
while ($data=mysql_fetch_array($tampil)){
echo "
<tr>
<td align='center'>$no</td>
<td align='center'>$data[nuptk]</td>
<td align='center'>$data[nama_guru]</td>
<td align='center'>$data[email]</td>
<td align='center' width='50'><a href='?module=edit_guru&id=$data[id_guru]'><img src='icon/edit.png'></a></td>
<td align='center' width='50'><a href='?module=hapus_guru&id=$data[id_guru]'><img src='icon/hapus.png'></a></td>
</tr>";
$no++;
}
echo "
<tr><td colspan='7' bgcolor='#0066CC'><input type='submit' value='Tambah guru' /></td></tr>
</table></form>";
}
?>