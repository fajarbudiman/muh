<?php
include "../config/koneksi.php";

$update=mysql_query("update mapel set id_jenjang='$_SESSION[jenjang]',nama_mapel='$_POST[nama]',standar_kkm='$_POST[kkm]',jumlah_jam='$_POST[jml]',id_kurikulum='$_POST[kur]' where id_mapel='$_POST[id]'");
if ($update){
echo "<script>alert('Data Berhasil diupdate');
      document.location.href='?module=tampil_mapel'</script>";}
else {
echo "<script>alert('Data Gagal diupdate');
      document.location.href='?module=tambah_mapel'</script>";}

?>