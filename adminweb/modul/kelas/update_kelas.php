<?php
include "../config/koneksi.php";

$update=mysql_query("update kelas set id_jenjang='$_SESSION[jenjang]',nama_kelas='$_POST[nama]',wali_kelas='$_POST[wali]',jumlah_anak='$_POST[jml]',aktifasi='$_POST[stat]' where id_kelas='$_POST[id]'");
if ($update){
echo "<script>alert('Data Berhasil diupdate');
      document.location.href='?module=tampil_kelas'</script>";}
else {
echo "<script>alert('Data Gagal diupdate');
      document.location.href='?module=tambah_kelas'</script>";}

?>