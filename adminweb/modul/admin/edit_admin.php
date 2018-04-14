<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else {
$edit=mysql_query("select*from admin where id_admin='$_GET[id]'");
$row=mysql_fetch_array($edit); 
echo "
<form action='?module=update_admin' method='post'>
<input type='hidden' name='id' size='35' value='$row[id_admin]'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='2' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Edit data Administrator</font></td></tr>
<tr><td width='100'>Jenjang</td><td width='200'><select name='jenjang'>";
                                                 $jenjang=mysql_query("select*from jenjang order by nama_jenjang");
												 if ($row['id_jenjang']==0){
												 echo "<option value=0 selected>- Pilih Jenjang -</option>";}
												 while($jen=mysql_fetch_array($jenjang)){
												 if ($row['id_jenjang']==$jen['id_jenjang']){
												 echo "<option value=$jen[id_jenjang] selected>$jen[nama_jenjang]</option>";}
												 else {
												 echo "<option value=$jen[id_jenjang]>$jen[nama_jenjang]</option>";}
												 }
echo "</select></td></tr>
<tr><td width='100'>NUPTK/Peg_Id</td><td width='500'><input name='nuptk' type='text' maxlength='8' value='$row[nuptk]'></td></tr>
<tr><td width='100'>Nama Lengkap</td><td><input name='nama' type='text' maxlength='100' value='$row[nama_lengkap]'></td></tr>
<tr><td width='100'>Password</td><td><input name='pass' type='password' maxlength='12'>*)</td></tr>
<tr><td width='100'>Email</td><td><input name='mail' type='text' maxlength='100' value='$row[email]'></td></tr>
<tr><td width='100'>No. tlp</td><td><input name='tlp' type='text' maxlength='15' value='$row[tlp]'></td></tr>";
if ($row['blokir']=='Y'){
echo"
<tr><td width='100' >Blokir</td><td width='200'> <input type='radio' name='blokir' value='Y' checked='checked'>Yes 
                                                 <input type='radio' name='blokir' value='N'>No</td></tr>";
} else {
echo"
<tr><td width='100' >Blokir</td><td width='200'> <input type='radio' name='blokir' value='Y'>Yes 
                                                 <input type='radio' name='blokir' value='N' checked='checked'>No</td></tr>"; }
if ($row['level']=='vip'){
echo"
<tr><td width='100' >Level</td><td width='200'> <input type='radio' name='level' value='vip' checked='checked'>VIP 
                                                <input type='radio' name='level' value='user'>User</td></tr>";
} else {
echo"
<tr><td width='100' >Level</td><td width='200'> <input type='radio' name='level' value='vip'>VIP 
                                                <input type='radio' name='level' value='user' checked='checked'>User</td></tr>"; }
echo "
<tr><td colspan='2' height='35'>*)Bila Password tidak diganti kosongkan saja</td></tr>
<tr><td colspan='2' align='right' height='35' bgcolor='#0066CC'><input type='submit' value='Update'><input type='reset' value='Beck' onclick='self.history.back()'></td></tr>
</table>
</form>"; }
?>