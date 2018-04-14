<?php
include "../config/koneksi.php";

if ($_SESSION['level']=='vip'){  
echo "
<li><a href='?module=beranda'>&gt;&gt;Home</a></li>
<li><a href='?module=tampil_jenjang'>&gt;&gt;Data Jenjang</a></li>
<li><a href='?module=tampil_admin'>&gt;&gt;Data Administrator</a></li>
<li><a href='?module=tampil_angkatan'>&gt;&gt;Data Tahun Ajaran</a></li>
<li><a href='?module=tampil_kelas'>&gt;&gt;Data Kelas</a></li>
<li><a href='?module=tampil_siswa'>&gt;&gt;Data Siswa</a></li>
<li><a href='?module=tampil_kurikulum'>&gt;&gt;Data Kurikulum</a></li>
<li><a href='?module=tampil_mapel'>&gt;&gt;Data Mata Pelajaran</a></li>
<li><a href='?module=tampil_ekskul'>&gt;&gt;Data Ekstrakulikuler</a></li>
<li><a href='?module=tampil_guru'>&gt;&gt;Data Guru</a></li>
<li><a href='?module=tampil_tentang'>&gt;&gt;Profil Website</a></li>
<li><a href='logout.php'>&gt;&gt;Logout</a></li>";
}
else {
echo "
<li><a href='?module=beranda'>&gt;&gt;Home</a></li>
<li><a href='?module=tampil_jenjang'>&gt;&gt;Data Jenjang</a></li>
<li><a href='?module=tampil_kelas'>&gt;&gt;Data Kelas</a></li>
<li><a href='?module=tampil_siswa'>&gt;&gt;Data Siswa</a></li>
<li><a href='?module=tampil_kurikulum'>&gt;&gt;Data Kurikulum</a></li>
<li><a href='?module=tampil_mapel'>&gt;&gt;Data Mata Pelajaran</a></li>
<li><a href='?module=tampil_ekskul'>&gt;&gt;Data Ekstrakulikuler</a></li>
<li><a href='?module=tampil_guru'>&gt;&gt;Data Guru</a></li>
<li><a href='?module=tampil_tentang'>&gt;&gt;Profil Website</a></li>
<li><a href='logout.php'>&gt;&gt;Logout</a></li>";
} 
?>
