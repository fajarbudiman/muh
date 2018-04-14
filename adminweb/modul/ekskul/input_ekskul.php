<?php
include "../config/koneksi.php";
$input="insert into ekskul (nama_ekskul,nama_guru,hari,jam) values ('$_POST[nama]','$_POST[guru]','$_POST[hari]','$_POST[jam]')";
$query=mysql_query($input);
if ($query){
echo "<script>alert('Data berhasil diinput');
      document.location.href='?module=tampil_ekskul'</script>";
}
//apabila Gagal diinput
else {
echo "<script>alert('Data gagal diinput');
      document.location.href='?module=tambah_ekskul'</script>";
}
?>