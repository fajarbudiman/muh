<?php
include "../config/koneksi.php";
if (empty($_POST['pass'])){
$update=mysql_query("update admin set id_jenjang='$_POST[jenjang]',nuptk='$_POST[nuptk]',nama_lengkap='$_POST[nama]',email='$_POST[mail]',tlp='$_POST[tlp]',blokir='$_POST[blokir]',level='$_POST[level]' where id_admin='$_POST[id]'");
echo "<script>alert('Data Berhasil diupdate');
      document.location.href='?module=tampil_admin'</script>";}
elseif ($_POST['pass']){
$pass=MD5($_POST['pass']);
$update=mysql_query("update admin set id_jenjang='$_POST[jenjang]',nuptk='$_POST[nuptk]',password='$pass',nama_lengkap='$_POST[nama]',email='$_POST[mail]',tlp='$_POST[tlp]',blokir='$_POST[blokir]',level='$_POST[level]' where id_admin='$_POST[id]'");
echo "<script>alert('Data Berhasil diupdate');
      document.location.href='?module=tampil_admin'</script>";}
else {
echo "<script>alert('Data Gagal diupdate');
      document.location.href='?module=tambah_admin'</script>";}

?>