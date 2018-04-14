<?php
include "../config/koneksi.php";
$hapus=mysql_query("delete from kurikulum where id_kurikulum='$_GET[id]'");
if ($hapus) {
echo "<script>alert('Data berhasil dihapus');
      document.location.href='?module=tampil_kurikulum'</script>";
}
else {
echo "<script>alert('Data gagal dihapus');
      document.location.href='?module=tampil_kurikulum'</script>";
}
?>