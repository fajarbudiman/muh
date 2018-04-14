<?php
include "../config/koneksi.php";

$lokasi_file = $_FILES['img']['tmp_name'];
$nama_file   = $_FILES['img']['name'];
$folder = "../foto/foto_galeri/$nama_file";

if (move_uploaded_file($lokasi_file,"$folder")){
$update="update tentang set nama_pemilik='$_POST[np]',judul_website='$_POST[judul]',nama_website='$_POST[nama]',meta_deskripsi='$_POST[metdes]',meta_keyword='$_POST[metkey]',email='$_POST[email]',facebook='$_POST[fb]',twitter='$_POST[twit]',favicon='$nama_file' where id_tentang='$_POST[id]'";
$query=mysql_query($update);
echo "<script>alert('Data berhasil disimpan');
      document.location.href='?module=tampil_tentang'</script>";}
elseif (empty($lokasi_file)) {
$update="update tentang set nama_pemilik='$_POST[np]',judul_website='$_POST[judul]',nama_website='$_POST[nama]',meta_deskripsi='$_POST[metdes]',meta_keyword='$_POST[metkey]',email='$_POST[email]',facebook='$_POST[fb]',twitter='$_POST[twit]' where id_tentang='$_POST[id]'";
$query=mysql_query($update);
echo "<script>alert('Data berhasil disimpan');
      document.location.href='?module=tampil_tentang'</script>";}
else {
echo "<script>alert('Data gagal disimpan');
      document.location.href='?module=tampil_tentang'</script>";}
?>