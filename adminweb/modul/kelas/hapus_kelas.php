<?php
include "../config/koneksi.php";
$delete=mysql_query("delete from kelas where id_kelas='$_GET[id]'");
if ($delete){
echo "<script>alert('Data Delete');
      document.location.href='?module=tampil_kelas'</script>";}
else {
echo "<script>alert('Failed');
      document.location.href='?module=tampil_kelas'</script>";}
?>