<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else {
$edit=mysql_query("select*from angkatan where id_angkatan='$_GET[id]'");
$row=mysql_fetch_array($edit); 
echo "
<form action='?module=update_angkatan' method='post'>
<input type='hidden' id='id' name='id' value='$row[id_angkatan]'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='3' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Edit angkatan</font></td></tr>
<tr><td width='100' align='center'>Tahun Ajaran</td><td><input type='text' name='ta' maxlength='100' value='$row[tahun_ajaran]'/></td></tr>
<tr><td width='100' align='center'>Kurikulum</td><td width='200'><select name='kur'>";
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
<tr><td colspan='3' align='right' bgcolor='#0066CC'><input type='submit' value='Update' /><input type='reset' value='Beck' onclick='self.history.back()'/></td></tr>
</table>
</form>";
}
?>
