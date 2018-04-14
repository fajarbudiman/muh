<?php
include "../config/koneksi.php";
$delete=mysql_query("delete from siswa where id_siswa='$_GET[id]'");
if ($delete){
echo "<script>alert('Data Delete');
      document.location.href='?module=tampil_siswa'</script>";}
else {
echo "<script>alert('Failed');
      document.location.href='?module=tampil_siswa'</script>";}
?>