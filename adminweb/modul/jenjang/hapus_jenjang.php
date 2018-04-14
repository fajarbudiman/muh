<?php
include "../config/koneksi.php";
$hapus=mysql_query("delete from jenjang where id_jenjang='$_GET[id]'");
if ($hapus) {
echo "<script>alert('Data berhasil dihapus');
      document.location.href='?module=tampil_jenjang'</script>";
}
else {
echo "<script>alert('Data gagal dihapus');
      document.location.href='?module=tampil_jenjang'</script>";
}
?>