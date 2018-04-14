<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form action='?module=input_admin' method='post'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='2' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Tambahkan Administrator</font></td></tr>
<tr><td width='100'>Jenjang</td><td width='200'><select name='jenjang'>
                                                 <option value='0' selected='selected'>- PILIH JENJANG -</option>";
                                                 $tampil=mysql_query("select*from jenjang");
												 while ($data=mysql_fetch_array($tampil)){
												 echo " <option value='$data[id_jenjang]'>$data[nama_jenjang]</option>";} 
echo "
<tr><td width='100' >NUPTK/PegId</td><td><input name='nuptk' type='text'></td></tr>
<tr><td width='100' >Nama Lengkap</td><td><input name='nama' type='text'></td></tr>
<tr><td width='100' >Password</td><td><input name='pass' type='password' maxlength='12'>*)</td></tr>
<tr><td width='100' >Email</td><td><input name='mail' type='text' maxlength='100'></td></tr>
<tr><td width='100' >No. tlp</td><td><input name='tlp' type='text' maxlength='15'></td></tr>
<tr><td colspan='2' >*)Tidak Boleh Kosong</td></tr>
<tr><td colspan='2' align='right' bgcolor='#0066CC'><input type='submit' value='Simpan'><input type='reset' value='Batal' onclick='self.history.back()'></td></tr>
</table>
</form>"; }
?>