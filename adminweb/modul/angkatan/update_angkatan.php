<?php
include "../config/koneksi.php";
$update=mysql_query("update angkatan set tahun_ajaran='$_POST[ta]',id_kurikulum='$_POST[kur]' where id_angkatan='$_POST[id]'");
if ($update) {
echo "<script>alert('Data berhasil diupdate');
      document.location.href='?module=tampil_angkatan'</script>";
}
else {
echo "<script>alert('Data gagal diupdate');
      document.location.href='?module=tampil_angkatan'</script>";
}
?>
