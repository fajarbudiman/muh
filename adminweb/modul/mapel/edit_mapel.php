<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else {
$edit=mysql_query("select*from mapel where id_mapel='$_GET[id]'");
$row=mysql_fetch_array($edit); 
echo "
<form action='?module=update_mapel' method='post'>
<input type='hidden' name='id' value='$row[id_mapel]'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='2' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Tambahkan Data mapel</font></td></tr>
<tr><td width='200' >Nama mapel</td><td><input name='nama' type='text' value='$row[nama_mapel]'></td></tr>
<tr><td width='200' >KKM</td><td><input name='kkm' type='text' value='$row[standar_kkm]'></td></tr>
<tr><td width='200' >Jumlah Jam</td><td><input name='jml' type='text' value='$row[jumlah_jam]'/></td></tr>
<tr><td width='100' >Kurikulum</td><td width='200'><select name='kur'>";
                                                 $kurikulum=mysql_query("select*from kurikulum order by kurikulum");
												 if ($row['id_kurikulum']==0){
												 echo "<option value=0 selected>- PILIH KURIKULUM -</option>";}
												 while($kur=mysql_fetch_array($kurikulum)){
												 if ($row['id_kurikulum']==$kur['id_kurikulum']){
												 echo "<option value=$kur[id_kurikulum] selected>$kur[kurikulum]</option>";}
												 else {
												 echo "<option value=$kur[id_kurikulum]>$kur[kurikulum]</option>";}
												 }
echo "</select></td></tr>
<tr><td colspan='2' align='right' bgcolor='#0066CC'><input type='submit' value='Update'><input type='reset' value='Batal' onclick='self.history.back()'></td></tr>
</table>
</form>"; }
?>