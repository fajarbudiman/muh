<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form action='?module=input_mapel' method='post'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='2' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Tambahkan Data mapel</font></td></tr>
<tr><td width='200' >Nama Mata Pelajaran</td><td><input name='nama' type='text'></td></tr>
<tr><td width='200' >KKM</td><td><input name='kkm' type='text'></td></tr>
<tr><td width='200' >Jumlah Jam</td><td><input name='jumlah' type='text'></td></tr>
<tr><td width='100'>Kurikulum</td><td width='200'><select name='kur'>
                                                 <option value='0' selected='selected'>- PILIH -</option>";
                                                 $tampil=mysql_query("select*from kurikulum");
												 while ($data=mysql_fetch_array($tampil)){
												 echo " <option value='$data[id_kurikulum]'>$data[kurikulum]</option>";} 
echo "
<tr><td colspan='2' align='right' bgcolor='#0066CC'><input type='submit' value='Simpan'><input type='reset' value='Batal' onclick='self.history.back()'></td></tr>
</table>
</form>"; }
?>