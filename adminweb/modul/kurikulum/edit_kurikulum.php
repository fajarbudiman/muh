<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else {
$edit=mysql_query("select*from kurikulum where id_kurikulum='$_GET[id]'");
$row=mysql_fetch_array($edit); 
echo "
<form action='?module=update_kurikulum' method='post'>
<input type='hidden' id='id' name='id' value='$row[id_kurikulum]'>
<table cellpadding='0' cellspacing='0' border='0'>
<tr><td colspan='3' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Edit kurikulum</font></td></tr>
<tr><td width='100' align='center'>kurikulum</td><td><input type='text' name='kat' maxlength='100' value='$row[kurikulum]'/></td></tr>
<tr><td colspan='3' align='right' bgcolor='#0066CC'><input type='submit' value='Update' /><input type='reset' value='Beck' onclick='self.history.back()'/></td></tr>
</table>
</form>";
}
?>
