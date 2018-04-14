<?php
$tgl_lahir   = ubah_tgl($_POST['tgl']);
$tgl_mulai   = ubah_tgl2($_POST['tgl_mulai']);

if (empty($_POST['nuptk']) || empty($_POST['nama']) || empty($_POST['tmp']) || empty($_POST['tgl']) || empty($_POST['email']) || empty($_POST['tlp'])){
echo "<script>alert('Data yang Anda isikan belum lengkap');
      document.location.href='?module=tambah_admin'</script>";}
else if ($_POST['nuptk'] || $_POST['nama'] || $_POST['tmp'] || $_POST['tgl'] || $_POST['email'] || $_POST['tlp']){
$input="insert into guru (nuptk,nama_guru,tmp_lahir,tgllahir,jk,alamat,mata_pelajaran,email,no_tlp,tgl_mulaitugas,status_guru) values ('$_POST[nuptk]','$_POST[nama]','$_POST[tmp]','$tgl_lahir','$_POST[jk]','$_POST[alamat]','$_POST[mapel]','$_POST[email]','$_POST[tlp]','$tgl_mulai','$_POST[sg]')";
$query=mysql_query($input);
echo "<script>alert('Data berhasil diinput');
      document.location.href='?module=tampil_guru'</script>";
}
//apabila Gagal diinput
else {
echo "<script>alert('Data gagal diinput');
      document.location.href='?module=tambah_guru'</script>";
}
?>