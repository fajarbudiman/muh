<?php
include "../config/koneksi.php";
$delete=mysql_query("delete from mapel where id_mapel='$_GET[id]'");
if ($delete){
echo "<script>alert('Data Delete');
      document.location.href='?module=tampil_mapel'</script>";}
else {
echo "<script>alert('Failed');
      document.location.href='?module=tampil_mapel'</script>";}
?>