<?php
include "../config/koneksi.php";
$delete=mysql_query("delete from admin where id_admin='$_GET[id]'");
if ($delete){
echo "<script>alert('Data Delete');
      document.location.href='?module=tampil_admin'</script>";}
else {
echo "<script>alert('Failed');
      document.location.href='?module=tampil_admin'</script>";}
?>