    <!-- Date Picker jQuery UI-->
    <link type="text/css" href="development-bundle/themes/base/ui.all.css" rel="stylesheet" />   

    <script type="text/javascript" src="development-bundle/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="development-bundle/ui/ui.core.js"></script>
    <script type="text/javascript" src="development-bundle/ui/ui.datepicker.js"></script>
    
    <script type="text/javascript" src="development-bundle/ui/i18n/ui.datepicker-id.js"></script>

    <script type="text/javascript">
	$(document).ready(function(){
        $("#tgl_mulai").datepicker({
					dateFormat  : "dd/mm/yy",        
          changeMonth : true,
          changeYear  : true					
        });      
        $("#tgl_selesai").datepicker({
					dateFormat  : "dd/mm/yy",        
          changeMonth : true,
          changeYear  : true					
        });      
      });
    </script>
<?php 
include '../config/koneksi.php';
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else {
$tampil="SELECT*FROM agenda ORDER BY id_agenda DESC";
$query=mysql_query($tampil);
$data=mysql_fetch_array($query);

$tgl_mulai   = tgl_indo($data['tgl_mulai']);
$tgl_selesai = tgl_indo($data['tgl_selesai']);
echo "
<form method='post' action='?module=update_agenda' enctype='multipart/form-data'>
<input type='hidden' name='id' value='$data[id_agenda]'>
<table cellpadding='0' cellspacing='0' border='0'>
<tr><td colspan='2' bgcolor='#009933'><font size='+1' color='#FFFFFF'><b>&nbsp; Tambah Agenda Acara</b></font></td></tr>
<tr><td width='100'>&nbsp; Tema agenda</td><td width='200'>&nbsp;: <input name='tema' type='text' size='50' value='$data[tema]'/></td></tr>
<tr><td width='100' valign='top'>&nbsp; Isi agenda</td><td><textarea name='isi' id='sfm' cols='75' rows='10'>$data[isi_agenda]</textarea></td></tr>
<tr><td width='100'>&nbsp; Tempat </td><td width='200'>&nbsp;: <input name='tempat' type='text' size='50' value='$data[tempat]'/></td></tr>
<tr><td width='100'>&nbsp; Pengirim </td><td width='200'>&nbsp;: <input name='pengirim' type='text' size='50' value='$data[pengirim]'/></td></tr>
<tr><td width='100'>&nbsp; Tgl. Mulai  </td><td>&nbsp;: <input name='tgl_mulai' id='tgl_mulai' type='text' value='$tgl_mulai'/></td></tr>
<tr><td width='100'>&nbsp; Tgl. selesai  </td><td>&nbsp;: <input name='tgl_selesai' id='tgl_selesai' type='text' value='$tgl_selesai'/></td></tr>
<tr><td width='100'>&nbsp; Waktu </td><td width='200'>&nbsp;: <input name='pukul' type='text' size='50' value='$data[jam]'/></td></tr>
<tr><td width='100'>&nbsp; Logo</td><td width='200'>&nbsp; <img src='../foto_agenda/$data[gambar]' width='50' height='50' /><br> 
                                                    &nbsp; <input type='file' name='img'></td></tr>
<tr><td colspan='2' align='right' bgcolor='#009933'><input type='submit' value='Update'><input type='reset' value='Beck' onclick='self.history.back()'></td></tr>
</table>
</form>";
}
?>