<?php
include "../config/koneksi.php";
$kat=$_POST['kat'];
$update=mysql_query("update jenjang set jenjang='$kat' where id_jenjang='$_POST[id]'");
if ($update) {
echo "<script>alert('Data berhasil diupdate');
      document.location.href='?module=tampil_jenjang'</script>";
}
else {
echo "<script>alert('Data gagal diupdate');
      document.location.href='?module=tampil_jenjang'</script>";
}
?>
