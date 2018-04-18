<?php
include "../config/koneksi.php";
$input="insert into jenis_bayaran (id_jenjang,nama_bayar,harga,komite) values ('$_SESSION[jenjang]','$_POST[nama]','$_POST[harga]','$_POST[komit]')";
$query=mysql_query($input);
if ($query){
echo "<script>alert('Data berhasil diinput');
      document.location.href='?module=tampil_jenis'</script>";
}
//apabila Gagal diinput
else {
echo "<script>alert('Data gagal diinput');
      document.location.href='?module=tambah_jenis'</script>";
}
?>