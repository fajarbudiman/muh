<?php
include "../config/koneksi.php";
$delete=mysql_query("delete from ekskul where id_ekskul='$_GET[id]'");
if ($delete){
echo "<script>alert('Data Delete');
      document.location.href='?module=tampil_ekskul'</script>";}
else {
echo "<script>alert('Failed');
      document.location.href='?module=tampil_ekskul'</script>";}
?>