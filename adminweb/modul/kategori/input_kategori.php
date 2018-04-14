<?php
include "../config/koneksi.php";
$kat=$_POST['kat'];
$simpan=mysql_query("insert into kategori (kategori) values ('$kat')");
if ($simpan) {
echo "<script>alert('Data berhasil disimpan');
      document.location.href='?module=tampil_kategori'</script>";
}
else {
echo "<script>alert('Data gagal disimpan');
      document.location.href='?module=tambah_kategori'</script>";
}
?>
