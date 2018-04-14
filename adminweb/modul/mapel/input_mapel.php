<?php
include "../config/koneksi.php";
$input="insert into mapel (id_jenjang,nama_mapel,standar_kkm,jumlah_jam,id_kurikulum) values ('$_SESSION[jenjang]','$_POST[nama]','$_POST[kkm]','$_POST[jumlah]','$_POST[kur]')";
$query=mysql_query($input);
if ($query){
echo "<script>alert('Data berhasil diinput');
      document.location.href='?module=tampil_mapel'</script>";
}
//apabila Gagal diinput
else {
echo "<script>alert('Data gagal diinput');
      document.location.href='?module=tambah_mapel'</script>";
}
?>