<?php
include "../config/koneksi.php";
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else {
$edit=mysql_query("select*from tentang where id_tentang='$_GET[id]'");
$r=mysql_fetch_array($edit);

echo "
<form method='post' action='?module=update_tentang' enctype='multipart/form-data' >
<input type='hidden' name='id' value='$r[id_tentang]' />
<table>
<tr><td align='left' colspan='2' bgcolor='#009933' height='35'><font color='#FFFFFF' size='+1'><b>Edit Identitas Website</b></font></td></tr>
<tr><td width='150' bgcolor='#009933'><font color='#FFFFFF'><b>Nama Pemeilik</b></font></td>     <td> : <input type='text' name='np' value='$r[nama_pemilik]'></td></tr>
<tr><td width='150' bgcolor='#009933'><font color='#FFFFFF'><b>Judul Website</b></font></td>    <td> : <input type='text' name='judul' value='$r[judul_website]'></td></tr>
<tr><td width='150' bgcolor='#009933'><font color='#FFFFFF'><b>Nama Website</b></font></td>     <td> : <input type='text' name='nama' value='$r[nama_website]'></td></tr>
<tr><td width='150' bgcolor='#009933'><font color='#FFFFFF'><b>Meta Deskripsi</b></font></td>   <td> : <input type='text' name='metdes' value='$r[meta_deskripsi]'></td></tr>
<tr><td width='150' bgcolor='#009933'><font color='#FFFFFF'><b>Meta Keyword</b></font></td>     <td> : <input type='text' name='metkey' value='$r[meta_keyword]'></td></tr>
<tr><td width='150' bgcolor='#009933'><font color='#FFFFFF'><b>Email</b></font></td>            <td> : <input type='text' name='email' value='$r[email]'></td></tr>
<tr><td width='150' bgcolor='#009933'><font color='#FFFFFF'><b>Facebook</b></font></td>         <td> : <input type='text' name='fb' value='$r[facebook]'></td></tr>
<tr><td width='150' bgcolor='#009933'><font color='#FFFFFF'><b>Twitter</b></font></td>          <td> : <input type='text' name='twit' value='$r[twitter]'></td></tr>
<tr><td width='150' bgcolor='#009933'><font color='#FFFFFF'><b>Favicon</b></font></td>          <td> : &nbsp; <img src='image/$r[favicon]' width='30' height='30' />
                                                                          <br>&nbsp; <input type='file' name='img'></td></tr>
<tr><td colspan='2' bgcolor='#009933' align='right'><input type='submit' value='Update Identitas'><input type='reset' value='Beck' onclick='self.history.back()' /></td></tr>
</table>
</form>";

}
?>
