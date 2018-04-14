<?php
include "../config/koneksi.php";

$lokasi_file = $_FILES['img']['tmp_name'];
$nama_file   = $_FILES['img']['name'];
$folder = "../foto/foto_agenda/$nama_file";

$tgl_mulai   = ubah_tgl($_POST['tgl_mulai']);
$tgl_selesai = ubah_tgl($_POST['tgl_selesai']);

if (move_uploaded_file($lokasi_file,"$folder")){
$simpan="INSERT INTO agenda(tema,isi_agenda,tempat,pengirim,tgl_mulai,tgl_selesai,tgl_posting,jam,gambar)
         VALUES ('$_POST[tema]','$_POST[isi]','$_POST[tempat]','$_POST[pengirim]','$tgl_mulai','$tgl_selesai','$tgl_sekarang','$_POST[pukul]','$nama_file')";
$query=mysql_query($simpan);
echo "<script>alert('Data berhasil disimpan');
      document.location.href='?module=tampil_agenda'</script>";
}
else if (empty($lokasi_file)){
$simpan="INSERT INTO agenda(tema,isi_agenda,tempat,pengirim,tgl_mulai,tgl_selesai,tgl_posting,jam)
         VALUES ('$_POST[tema]','$_POST[isi]','$_POST[tempat]','$_POST[pengirim]','$tgl_mulai','$tgl_selesai','$tgl_sekarang','$_POST[pukul]')";
$query=mysql_query($simpan);
echo "<script>alert('Data berhasil disimpan');
      document.location.href='?module=tampil_agenda'</script>";
}
else {
echo "<script>alert('Data gagal disimpan');
      document.location.href='?module=tambah_agenda'</script>";
}
?>