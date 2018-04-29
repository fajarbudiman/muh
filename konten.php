<?php
error_reporting(0);
session_start();
include "koneksi/koneksi.php";
include "fungsi/fungsi_indotgl.php";
$module = $_GET[module];

// Login Administrator //
if ($_SESSION[Level] == '1'){
	// bagian manajemen user
	if ($module == 'manajemen_user'){
		include "modul/mod_user/user.php";
	}
	// bagian manajemen prodi
	elseif ($module == 'manajemen_prodi'){
		include "modul/mod_prodi/prodi.php";
	}
	// bagian manajemen jurusan
	elseif ($module == 'manajemen_jurusan'){
		include "modul/mod_jurusan/jurusan.php";
	}
	// bagian manajemen mata kuliah
	elseif ($module == 'manajemen_makul'){
		include "modul/mod_makul/makul.php";
	}
	// bagian manajemen kelas
	elseif ($module == 'manajemen_kelas'){
		include "modul/mod_kelas/kelas.php";
	}
	// bagian report dosen
	elseif ($module == 'report_dosen'){
		include "modul/mod_report/dosen.php";
	}
	// bagian report mahasiswa
	elseif ($module == 'report_mahasiswa'){
		include "modul/mod_report/mahasiswa.php";
	}
	else{
		include "modul/mod_home/home.php";
	}
	
}

// Login Staff //
elseif ($_SESSION[Level] == '2'){
	// bagian manajemen dosen
	if ($module == 'manajemen_dosen'){
		include "modul/mod_dosen/dosen.php";
	}
	// bagian manajemen mahasiswa
	elseif($module == 'manajemen_mahasiswa'){
		include "modul/mod_mahasiswa/mahasiswa.php";
	}
	// bagian manajemen jadwal kuliah
	elseif ($module == 'manajemen_jadwal_makul'){
		include "modul/mod_jadwal/jadwal.php";
	}
	// bagian manajemen nilai
	elseif ($module == 'manajemen_nilai'){
		include "modul/mod_nilai/nilai.php";
	}
	else{
		include "modul/mod_home/home.php";
	}
}

// Tidak Mempunyai Hak Akses
else{
	echo "<script language='javascript'>alert('Anda tidak mempunyai hak akses memasuki halaman ini.');
			window.location = 'master.php'</script>";
}
?>