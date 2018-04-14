<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form action='?module=input_ekskul' method='post'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='2' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Tambahkan Data mapel</font></td></tr>
<tr><td width='200' >Nama Ekstrakurikuler</td><td><input name='nama' type='text'></td></tr>
<tr><td width='200' >Pelatih</td><td><input name='guru' type='text'></td></tr>
<tr><td width='200' >hari</td><td><input name='hari' type='text'></td></tr>
<tr><td width='200' >Mulai Pukul</td><td><input name='jam' type='text'></td></tr>
<tr><td colspan='2' align='right' bgcolor='#0066CC'><input type='submit' value='Simpan'><input type='reset' value='Batal' onclick='self.history.back()'></td></tr>
</table>
</form>"; }
?>