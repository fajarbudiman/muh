<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form action='?module=input_kelas' method='post'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='2' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Tambahkan Data kelas</font></td></tr>
<tr><td width='200'>Jenjang</td><td width='200'><select name='jenjang' disabled='disabled'>";
                                                 $jenjang=mysql_query("select*from jenjang order by nama_jenjang");
												 if ($_SESSION['jenjang']==0){
												 echo "<option value=0 selected>- Pilih Jenjang -</option>";}
												 while($jen=mysql_fetch_array($jenjang)){
												 if ($_SESSION['jenjang']==$jen['id_jenjang']){
												 echo "<option value=$jen[id_jenjang] selected>$jen[nama_jenjang]</option>";}
												 else {
												 echo "<option value=$jen[id_jenjang]>$jen[nama_jenjang]</option>";}
												 }
echo "</select></td></tr>
<tr><td width='200' >Nama Kelas</td><td><input name='nama' type='text'></td></tr>
<tr><td width='200' >Wali Kelas</td><td><input name='wali' type='text'></td></tr>
<tr><td width='200' >Jumlah Siswa</td><td><input name='jumlah' type='text'></td></tr>
<tr><td colspan='2' align='right' bgcolor='#0066CC'><input type='submit' value='Simpan'><input type='reset' value='Batal' onclick='self.history.back()'></td></tr>
</table>
</form>"; }
?>