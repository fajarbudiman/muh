    <!-- Date Picker jQuery UI-->
    <link type="text/css" href="development-bundle/themes/base/ui.all.css" rel="stylesheet" />   

    <script type="text/javascript" src="development-bundle/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="development-bundle/ui/ui.core.js"></script>
    <script type="text/javascript" src="development-bundle/ui/ui.datepicker.js"></script>
    
    <script type="text/javascript" src="development-bundle/ui/i18n/ui.datepicker-id.js"></script>

    <script type="text/javascript">
	$(document).ready(function(){
        $("#tgl_lahir").datepicker({
					dateFormat  : "dd/mm/yy",        
          changeMonth : true,
          changeYear  : true					
        });      
      });
    </script>
<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form method='post' action='?module=tambah_siswa'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='7' bgcolor='#0066CC'valign='center'><font size='+1' color='#FFFFFF'>Data siswa</font></td></tr>
<tr><td width='20' align='center'>No</td>
<td width='100' align='center'>NISN</td>
<td width='200' align='center'>Nama Lengkap</td>
<td width='200' align='center'>Tempat/Tgl Lahir</td>
<td width='50' align='center'>Kelas</td>
<td width='200' align='center' colspan='2'>Aksi</td></tr>";
$no=1;
$tampil=mysql_query("select*from siswa where id_jenjang='$_SESSION[jenjang]'");
while ($data=mysql_fetch_array($tampil)){
$tgl_lahir   = tgl_indo($data['tgl_lahir']);
echo "
<tr>
<td align='center'>$no</td>
<td align='center'>$data[nisn]</td>
<td align='center'>$data[nama_lengkap]</td>
<td align='center'>$data[tempat_lahir], $tgl_lahir</td>
<td align='center'>$data[kelas]</td>
<td align='center' width='50'><a href='?module=edit_siswa&id=$data[id_siswa]'>detail</a></td>
<td align='center' width='50'><a href='?module=hapus_siswa&id=$data[id_siswa]'><img src='icon/hapus.png'></a></td>
</tr>";
$no++;
}
echo "
<tr><td colspan='7' bgcolor='#0066CC'><input type='submit' value='Tambah Siswa' /></td></tr>
</table></form>";
}
?>