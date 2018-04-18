<?php
include "../config/koneksi.php";
$delete=mysql_query("delete from jenis_bayaran where id_jenisbayar='$_GET[id]'");
if ($delete){
echo "<script>alert('Data Delete');
      document.location.href='?module=tampil_jenis'</script>";}
else {
echo "<script>alert('Failed');
      document.location.href='?module=tampil_jenis'</script>";}
?>