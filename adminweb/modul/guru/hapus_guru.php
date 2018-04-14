<?php
$delete=mysql_query("delete from guru where id_guru='$_GET[id]'");
if ($delete){
echo "<script>alert('Data Delete');
      document.location.href='?module=tampil_guru'</script>";}
else {
echo "<script>alert('Failed');
      document.location.href='?module=tampil_guru'</script>";}
?>