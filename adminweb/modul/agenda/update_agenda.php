<?php
include "../config/koneksi.php";

$lokasi_file = $_FILES['img']['tmp_name'];
$nama_file   = $_FILES['img']['name'];
$folder = "../foto/foto_agenda/$nama_file";

$tgl_mulai   = ubah_tgl2($_POST['tgl_mulai']);
$tgl_selesai = ubah_tgl2($_POST['tgl_selesai']);

if (move_uploaded_file($lokasi_file,"$folder")){
$update="UPDATE agenda SET tema='$_POST[tema]',isi_agenda='$_POST[isi]',tempat='$_POST[tempat]',pengirim='$_POST[pengirim]',tgl_mulai='$tgl_mulai',tgl_selesai='$tgl_selesai',tgl_posting='$tgl_sekarang',jam='$_POST[pukul]',gambar='$nama_file' WHERE id_agenda='$_POST[id]'";
$query=mysql_query($update);
echo "<script>alert('Data berhasil diupdate');
      document.location.href='?module=tampil_agenda'</script>";
}
else if (empty($lokasi_file)){
$update="UPDATE agenda SET tema='$_POST[tema]',isi_agenda='$_POST[isi]',tempat='$_POST[tempat]',pengirim='$_POST[pengirim]',tgl_mulai='$tgl_mulai',tgl_selesai='$tgl_selesai',tgl_posting='$tgl_sekarang',jam='$_POST[pukul]' WHERE id_agenda='$_POST[id]'";
$query=mysql_query($update);
echo "<script>alert('Data berhasil diupdate');
      document.location.href='?module=tampil_agenda'</script>";
}
else {
echo "<script>alert('Data gagal diupdate');
      document.location.href='?module=tambah_agenda'</script>";
}

?>