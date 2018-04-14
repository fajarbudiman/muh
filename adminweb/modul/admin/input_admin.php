<?php
include "../config/koneksi.php";
$pass=md5($_POST['pass']);

if (empty($_POST['nuptk'])|| empty($_POST['nama']) || empty($pass) || empty($_POST['mail']) || empty($_POST['tlp'])){
echo "<script>alert('Data yang Anda isikan belum lengkap');
      document.location.href='?module=tambah_admin'</script>";}
else if ($pass) {
$input="insert into admin (id_jenjang,nuptk,nama_lengkap,password,email,tlp) values ('$_POST[jenjang]','$_POST[nuptk]','$_POST[nama]','$pass','$_POST[mail]','$_POST[tlp]')";
$query=mysql_query($input);
echo "<script>alert('Data berhasil diinput');
      document.location.href='?module=tampil_admin'</script>";
}
//apabila Gagal diinput
else {
echo "<script>alert('Data gagal diinput');
      document.location.href='?module=tambah_admin'</script>";
}
?>