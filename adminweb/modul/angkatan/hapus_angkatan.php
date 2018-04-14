<?php
include "../config/koneksi.php";
$hapus=mysql_query("delete from angkatan where id_angkatan='$_GET[id]'");
if ($hapus) {
echo "<script>alert('Data berhasil dihapus');
      document.location.href='?module=tampil_kategori'</script>";
}
else {
echo "<script>alert('Data gagal dihapus');
      document.location.href='?module=tampil_kategori'</script>";
}
?>