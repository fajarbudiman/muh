<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<table>
<tr><td align='left' colspan='2' bgcolor='#0066CC' height='35'><font color='#FFFFFF' size='+1'><b>Identitas Website</b></font></td></tr>";
$edit=mysql_query("select*from tentang");
while ($r=mysql_fetch_array($edit)){
echo "
<tr><td width='150' bgcolor='#0066CC'><font color='#FFFFFF'><b>Nama Kepala Sekolah</b></font></td><td> : $r[kepala_sekolah]</td></tr>
<tr><td width='150' bgcolor='#0066CC'><font color='#FFFFFF'><b>Judul Website</b></font></td>    <td width='600'> : $r[alamat_web]</td></tr>
<tr><td width='150' bgcolor='#0066CC'><font color='#FFFFFF'><b>Nama Website</b></font></td>     <td> : $r[nama_web]</td></tr>
<tr><td width='150' bgcolor='#0066CC'><font color='#FFFFFF'><b>Meta Deskripsi</b></font></td>   <td> : $r[meta_deskripsi]</td></tr>
<tr><td width='150' bgcolor='#0066CC'><font color='#FFFFFF'><b>Meta Keyword</b></font></td>     <td> : $r[meta_keyword]</td></tr>
<tr><td width='150' bgcolor='#0066CC'><font color='#FFFFFF'><b>Email</b></font></td>            <td> : $r[email]</td></tr>
<tr><td width='150' bgcolor='#0066CC'><font color='#FFFFFF'><b>favicon</b></font></td>          <td>   <img src='image/$r[favicon]' width='30' height='30' /></td></tr>
<tr><td align='right' colspan='2'><a href='?module=edit_tentang&id=$r[id_tentang]'>[Edit Identitas Website]</a></td></td></tr>
";}
echo "
</table>";
}
?>
