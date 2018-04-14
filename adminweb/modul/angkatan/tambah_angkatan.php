<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form action='?module=input_angkatan' method='post'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='3' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Tambah angkatan</font></td></tr>
<tr><td width='150' align='center'>Tahun Ajaran</td><td><input type='text' name='ta' maxlength='100'/></td></tr>
<tr><td width='100' align='center'>Kurikulum</td><td width='200'><select name='kur'>
                                                 <option value='0' selected='selected'>- PILIH -</option>";
                                                 $tampil=mysql_query("select*from kurikulum");
												 while ($data=mysql_fetch_array($tampil)){
												 echo " <option value='$data[id_kurikulum]'>$data[kurikulum]</option>";} 
echo "
<tr><td colspan='3' align='right' bgcolor='#0066CC'><input type='submit' value='Input' /><input type='reset' value='Batal' onclick='self.history.back()'/></td></tr>
</table>
</form>";
}
?>