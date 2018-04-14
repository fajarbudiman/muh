<?php
include "../config/koneksi.php";
$tahun=$_POST['ta'];
$kurikulum=$_POST['kur'];
$simpan=mysql_query("insert into angkatan (tahun_ajaran,id_kurikulum) values ('$tahun','$kurikulum')");
if ($simpan) {
echo "<script>alert('Data berhasil disimpan');
      document.location.href='?module=tampil_angkatan'</script>";
}
else {
echo "<script>alert('Data gagal disimpan');
      document.location.href='?module=tambah_angkatan'</script>";
}
?>
