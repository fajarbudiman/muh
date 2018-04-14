<?php
include "../config/koneksi.php";
$kat=$_POST['kat'];
$update=mysql_query("update kurikulum set kurikulum='$kat' where id_kurikulum='$_POST[id]'");
if ($update) {
echo "<script>alert('Data berhasil diupdate');
      document.location.href='?module=tampil_kurikulum'</script>";
}
else {
echo "<script>alert('Data gagal diupdate');
      document.location.href='?module=tampil_kurikulum'</script>";
}
?>
