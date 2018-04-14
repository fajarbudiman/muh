<?php
include "../config/koneksi.php";

$update=mysql_query("update ekskul set nama_ekskul='$_POST[nama]',nama_guru='$_POST[guru]',hari='$_POST[hari]',jam='$_POST[jam]' where id_ekskul='$_POST[id]'");
if ($update){
echo "<script>alert('Data Berhasil diupdate');
      document.location.href='?module=tampil_ekskul'</script>";}
else {
echo "<script>alert('Data Gagal diupdate');
      document.location.href='?module=tambah_ekskul'</script>";}

?>