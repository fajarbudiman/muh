<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else {
$edit=mysql_query("select*from ekskul where id_ekskul='$_GET[id]'");
$row=mysql_fetch_array($edit); 
echo "
<form action='?module=update_ekskul' method='post'>
<input type='hidden' name='id' value='$row[id_ekskul]'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='2' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Tambahkan Data ekskul</font></td></tr>
<tr><td width='200' >Nama Ekstrakurikuler</td><td><input name='nama' type='text' value='$row[nama_ekskul]'></td></tr>
<tr><td width='200' >Pelatih</td><td><input name='guru' type='text' value='$row[nama_guru]'></td></tr>
<tr><td width='200' >Hari</td><td><input name='hari' type='text' value='$row[hari]'/></td></tr>
<tr><td width='200' >Jam</td><td><input name='jam' type='text' value='$row[jam]'/></td></tr>
<tr><td colspan='2' align='right' bgcolor='#0066CC'><input type='submit' value='Update'><input type='reset' value='Batal' onclick='self.history.back()'></td></tr>
</table>
</form>"; }
?>