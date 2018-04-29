<?php
session_start();
include "../../koneksi/koneksi.php";
$act 	= $_GET[act];
$modul 	= $_GET[module];

if ($modul == 'manajemen_kelas' AND $act == 'input'){
	if (empty($_POST[NamaKelas])){
		echo "<script language='javascript'>alert('Isikan form kelas secara lengkap (Tanda *)');
			  window.location = '../../master.php?module=manajemen_kelas&act=tambahkelas'</script>";
	}
	elseif ($_POST[IdJurusan] == '++'){
		echo "<script language='javascript'>alert('Pilih Jurusan');
			  window.location = '../../master.php?module=manajemen_kelas&act=tambahkelas'</script>";
	}
	else{
		$data = mysql_fetch_array(mysql_query("SELECT * FROM tjurusan WHERE IdJurusan = '$_POST[IdJurusan]'"));
		$ketemu = mysql_num_rows(mysql_query("SELECT * FROM tkelas WHERE NamaKelas = '$_POST[NamaKelas]'"));
		if($ketemu > 0){
			echo "<script language='javascript'>alert('Nama Kelas sudah ada, gunakan nama kelas lain');
			  window.location = '../../master.php?module=manajemen_kelas&act=tambahkelas'</script>";
		}
		else{		
			$createdDate = date('Y-m-d H:i:s');
			mysql_query("INSERT INTO tkelas	(	IdJurusan,
												NamaKelas,
												WaliKelas,
												Aktif,
												CreatedDate,
												CreatedUser)
										VALUES ('$_POST[IdJurusan]',
												'$_POST[NamaKelas]',
												'$_POST[WaliKelas]',
												'$_POST[Aktif]',
												'$createdDate',
												'$_SESSION[IdUser]')");
											
			echo "<script language='javascript'>alert('Kelas $_POST[NamaKelas] dengan Jenjang = $data[NamaJurusan] berhasil ditambahkan / disimpan');
				window.location = '../../master.php?module=manajemen_kelas'</script>";
		}
	}
}

elseif ($modul == 'manajemen_kelas' AND $act == 'update'){
	$idKelas = $_POST[IdKelas];
	if (empty($_POST[NamaKelas]) || empty($_POST[Aktif])){
		echo "<script language='javascript'>alert('Isikan form kelas secara lengkap (Tanda *)');
			  window.location = '../../master.php?module=manajemen_kelas&act=edit_kelas&id=$idKelas'</script>";
	}
	elseif ($_POST[IdJurusan] == '++'){
		echo "<script language='javascript'>alert('Pilih Jenjang');
			  window.location = '../../master.php?module=manajemen_kelas&act=edit_kelas&id=$idKelas'</script>";
	}
	else{
		$updateDate = date('Y-m-d H:i:s');
		mysql_query("UPDATE tkelas SET	IdJurusan	= '$_POST[IdJurusan]',
										NamaKelas	= '$_POST[NamaKelas]',
										Aktif		= '$_POST[Aktif]',
										ModifiedDate= '$updateDate',
										ModifiedUser= '$_SESSION[IdUser]'
										WHERE IdKelas = '$idKelas'");
										
		echo "<script language='javascript'>alert('Kelas $_POST[NamaKelas] berhasil diupdate');
				window.location = '../../master.php?module=manajemen_kelas'</script>";
	}
}

elseif ($modul == 'manajemen_kelas' AND $act == 'hapus_kelas'){
	mysql_query("DELETE FROM tkelas WHERE IdKelas = '$_GET[id]'");
	header('location: ../../master.php?module=manajemen_kelas');
}
?>