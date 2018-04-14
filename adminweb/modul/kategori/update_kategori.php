<?php
include "../config/koneksi.php";
$kat=$_POST['kat'];
$update=mysql_query("update kategori set kategori='$kat' where id_kategori='$_POST[id]'");
if ($update) {
echo "<script>alert('Data berhasil diupdate');
      document.location.href='?module=tampil_kategori'</script>";
}
else {
echo "<script>alert('Data gagal diupdate');
      document.location.href='?module=tampil_kategori'</script>";
}
?>
