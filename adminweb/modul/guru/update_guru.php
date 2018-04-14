<?php
$tgl_lahir = ubah_tgl($_POST['tgl']);

$update=mysql_query("update guru set id_jenjang='$_SESSION[jenjang]',id_angkatan='$_POST[angkatan]',nisn='$_POST[nisn]',nik='$_POST[nik]',nama_lengkap='$_POST[nama]',tempat_lahir='$_POST[tmp]',tgl_lahir='$tgl_lahir',jenis_kelamin='$_POST[jk]',anak_ke='$_POST[ke]',kelas='$_POST[kls]',nopes_un='$_POST[no]',alamat='$_POST[alamat]',kota_madya='$_POST[kota]',kecamatan='$_POST[kec]',kelurahan='$_POST[kel]',nama_ayah='$_POST[ayah]',nik_ayah='$_POST[nik_ayah]',lulusan_ayah='$_POST[lulus_ayah]',status_ayah='$_POST[sa]',nama_ibu='$_POST[nama_ibu]',nik_ibu='$_POST[nik_ibu]',lulusan_ibu='$_POST[lulus_ibu]',status_ibu='$_POST[si]',penghasilan='$_POST[hasil]' where id_guru='$_POST[id]'");
if ($update){
echo "<script>alert('Data Berhasil diupdate');
      document.location.href='?module=tampil_guru'</script>";}
else {
echo "<script>alert('Data Gagal diupdate');
      document.location.href='?module=tambah_guru'</script>";}

?>