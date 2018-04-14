<?php
include "../config/koneksi.php";
$tgl_lahir   = ubah_tgl($_POST['tgl']);
if (empty($_POST['angkatan'])|| empty($_POST['nisn']) || empty($_POST['nik']) || empty($_POST['nama']) || empty($_POST['tmp']) || empty($_POST['tgl']) || empty($_POST['jk']) || empty($_POST['kls']) || empty($_POST['no']) || empty($_POST['ayah'])){
echo "<script>alert('Data yang Anda isikan belum lengkap');
      document.location.href='?module=tambah_admin'</script>";}
else if ($_POST['angkatan']|| $_POST['nisn'] || $_POST['nik'] || $_POST['nama'] || $_POST['tmp'] || $_POST['tgl'] || $_POST['jk'] || $_POST['kls'] || $_POST['no'] || $_POST['ayah']){
$input="insert into siswa (id_jenjang,id_angkatan,nisn,nik,nama_lengkap,tempat_lahir,tgl_lahir,jenis_kelamin,anak_ke,kelas,nopes_un,alamat,kota_madya,kecamatan,kelurahan,nama_ayah,nik_ayah,lulusan_ayah,status_ayah,nama_ibu,nik_ibu,lulusan_ibu,status_ibu,penghasilan) values ('$_SESSION[jenjang]','$_POST[angkatan]','$_POST[nisn]','$_POST[nik]','$_POST[nama]','$_POST[tmp]','$tgl_lahir','$_POST[jk]','$_POST[ke]','$_POST[kls]','$_POST[no]','$_POST[alamat]','$_POST[kota]','$_POST[kec]','$_POST[kel]','$_POST[ayah]','$_POST[nik_ayah]','$_POST[lulus_ayah]','$_POST[sa]','$_POST[ibu]','$_POST[nik_ibu]','$_POST[lulus_ibu]','$_POST[si]','$_POST[hasil]')";
$query=mysql_query($input);
echo "<script>alert('Data berhasil diinput');
      document.location.href='?module=tampil_siswa'</script>";
}
//apabila Gagal diinput
else {
echo "<script>alert('Data gagal diinput');
      document.location.href='?module=tambah_siswa'</script>";
}
?>