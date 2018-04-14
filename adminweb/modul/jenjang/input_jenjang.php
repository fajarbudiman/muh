<?php
include "../config/koneksi.php";
$kat=$_POST['kat'];
$simpan=mysql_query("insert into jenjang (jenjang) values ('$kat')");
if ($simpan) {
echo "<script>alert('Data berhasil disimpan');
      document.location.href='?module=tampil_jenjang'</script>";
}
else {
echo "<script>alert('Data gagal disimpan');
      document.location.href='?module=tambah_jenjang'</script>";
}
?>
