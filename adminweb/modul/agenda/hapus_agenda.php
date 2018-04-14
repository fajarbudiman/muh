<?php
include "../config/koneksi.php";

$hapus=mysql_query("DELETE FROM agenda WHERE id_agenda='$_GET[id]'");

if ($hapus){
echo "<script>alert('Data Delete');
      document.location.href='?module=tampil_agenda'</script>";}
else {
echo "<script>alert('Failed');
      document.location.href='?module=tampil_agenda'</script>";}

?>