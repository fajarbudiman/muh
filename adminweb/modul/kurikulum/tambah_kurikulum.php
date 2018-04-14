<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form action='?module=input_kurikulum' method='post'>
<table cellpadding='0' cellspacing='0' border='0'>
<tr><td colspan='3' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Tambah kurikulum</font></td></tr>
<tr><td width='150' align='center'>kurikulum</td><td><input type='text' name='kat' maxlength='100'/></td></tr>
<tr><td colspan='3' align='right' bgcolor='#0066CC'><input type='submit' value='Input' /><input type='reset' value='Batal' onclick='self.history.back()'/></td></tr>
</table>
</form>";
}
?>