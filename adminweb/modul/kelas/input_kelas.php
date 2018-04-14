<?php
include "../config/koneksi.php";
$input="insert into kelas (id_jenjang,nama_kelas,wali_kelas,jumlah_anak) values ('$_SESSION[jenjang]','$_POST[nama]','$_POST[wali]','$_POST[jumlah]')";
$query=mysql_query($input);
if ($query){
echo "<script>alert('Data berhasil diinput');
      document.location.href='?module=tampil_kelas'</script>";
}
//apabila Gagal diinput
else {
echo "<script>alert('Data gagal diinput');
      document.location.href='?module=tambah_kelas'</script>";
}
?>