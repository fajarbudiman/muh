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
$edit=mysql_query("select*from siswa where id_siswa='$_GET[id]'");
$row=mysql_fetch_array($edit); 
$tgl_lahir   = tgl_indo($row['tgl_lahir']);
echo "
<form action='?module=update_siswa' method='post'>
<input type='hidden' name='id' value='$row[id_siswa]'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='2' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Tambahkan Data Siswa</font></td></tr>
<tr><td width='200'>Jenjang</td><td width='200'><select name='jenjang' disabled='disabled'>";
                                                 $jenjang=mysql_query("select*from jenjang order by nama_jenjang");
												 if ($row['id_jenjang']==0){
												 echo "<option value=0 selected>- Pilih Jenjang -</option>";}
												 while($jen=mysql_fetch_array($jenjang)){
												 if ($row['id_jenjang']==$jen['id_jenjang']){
												 echo "<option value=$jen[id_jenjang] selected>$jen[nama_jenjang]</option>";}
												 else {
												 echo "<option value=$jen[id_jenjang]>$jen[nama_jenjang]</option>";}
												 }
echo "</select></td></tr>
<tr><td width='100'>Tahun Ajaran</td><td width='200'><select name='angkatan'>";
                                                 $kelas=mysql_query("select*from kelas where id_jenjang=$_SESSION[jenjang]");
												 if ($row['id_kelas']==0){
												 echo "<option value=0 selected>- PILIH KELAS -</option>";}
												 while($kel=mysql_fetch_array($kelas)){
												 if ($row['id_kelas']==$kel['id_kelas']){
												 echo "<option value=$kel[id_kelas] selected>$kel[nama_kelas]</option>";}
												 else {
												 echo "<option value=$kel[id_kelas]>$kel[nama_kelas]</option>";}
												 }
echo "</select></td></tr>
<tr><td width='200' >NISN</td><td><input name='nisn' type='text' value='$row[nisn]'></td></tr>
<tr><td width='200' >NIK</td><td><input name='nik' type='text' value='$row[nik]'></td></tr>
<tr><td width='200' >Nama Lengkap</td><td><input name='nama' type='text' value='$row[nama_lengkap]'></td></tr>
<tr><td width='200' >Tempat Lahir</td><td><input name='tmp' type='text' value='$row[tempat_lahir]'></td></tr>
<tr><td width='200' >Tgl Lahir</td><td><input name='tgl' id='tgl_lahir' type='text' value='$tgl_lahir'/></td></tr>";
if ($row['jenis_kelamin']=='L'){
echo"
<tr><td width='100' >Jenis Kelamin</td><td width='200'> <input type='radio' name='jk' value='L' checked='checked'>Laki-laki 
                                                        <input type='radio' name='jk' value='P'>Perempuan</td></tr>";
} else {
echo"
<tr><td width='100' >Jenis Kelamin</td><td width='200'> <input type='radio' name='jk' value='L'>Laki-laki 
                                                        <input type='radio' name='jk' value='P' checked='checked'>Perempuan</td></tr>"; }
echo"
<tr><td width='200' >Anak Ke -</td><td><input name='ke' type='text' value='$row[anak_ke]'/></td></tr>
<tr><td width='200'>Jenjang</td><td width='200'><select name='kls'>";
                                                 $jenjang=mysql_query("select*from kelas order by nama_jenjang");
												 if ($row['id_jenjang']==0){
												 echo "<option value=0 selected>- Pilih Jenjang -</option>";}
												 while($jen=mysql_fetch_array($jenjang)){
												 if ($row['id_jenjang']==$jen['id_jenjang']){
												 echo "<option value=$jen[id_jenjang] selected>$jen[nama_jenjang]</option>";}
												 else {
												 echo "<option value=$jen[id_jenjang]>$jen[nama_jenjang]</option>";}
												 }
echo "</select></td></tr>
<tr><td width='200' >No. Peserta UN</td><td><input name='no' type='text' value='$row[nopes_un]'></td></tr>
<tr><td width='200' >Alamat</td><td><input name='alamat' type='text' value='$row[alamat]'></td></tr>
<tr><td width='200' >Kota Madya</td><td><input name='kota' type='text' value='$row[kota_madya]'></td></tr>
<tr><td width='200' >Kecamatan</td><td><input name='kec' type='text' value='$row[kecamatan]'></td></tr>
<tr><td width='200' >Kelurahan</td><td><input name='kel' type='text' value='$row[kelurahan]'></td></tr>
<tr><td width='200' >Nama Ayah</td><td><input name='ayah' type='text' value='$row[nama_ayah]'></td></tr>
<tr><td width='200' >NIK Ayah</td><td><input name='nik_ayah' type='text' value='$row[nik_ayah]'></td></tr>
<tr><td width='200' >Pendidikan Ayah</td><td><input name='lulus_ayah' type='text' value='$row[lulusan_ayah]'></td></tr>";
if ($row['status_ayah']=='Hidup'){
echo"
<tr><td width='100' >Status Ayah</td><td width='200'> <input type='radio' name='sa' value='Hidup' checked='checked'>Hidup 
                                                      <input type='radio' name='sa' value='Mati'>Mati</td></tr>";
} else {
echo"
<tr><td width='100' >Status Ayah</td><td width='200'> <input type='radio' name='sa' value='Hidup'>Hidup 
                                                      <input type='radio' name='sa' value='Mati' checked='checked'>Mati</td></tr>"; }
echo"
<tr><td width='200' >Nama Ibu</td><td><input name='ibu' type='text' value='$row[nama_ibu]'></td></tr>
<tr><td width='200' >NIK Ibu</td><td><input name='nik_ibu' type='text' value='$row[nik_ibu]'></td></tr>
<tr><td width='200' >Pendidikan Ibu</td><td><input name='lulus_ibu' type='text' value='$row[lulusan_ibu]'></td></tr>";
if ($row['status_ibu']=='H'){
echo"
<tr><td width='100' >Status Ibu</td><td width='200'> <input type='radio' name='sa' value='H' checked='checked'>Hidup 
                                                      <input type='radio' name='sa' value='M'>Mati</td></tr>";
} else {
echo"
<tr><td width='100' >Status Ibu</td><td width='200'> <input type='radio' name='sa' value='H'>Hidup 
                                                      <input type='radio' name='sa' value='M' checked='checked'>Mati</td></tr>"; }
echo"
<tr><td width='200' >Penghasilan</td><td><input name='hasil' type='text' value='$row[penghasilan]'></td></tr>
<tr><td colspan='2' align='right' bgcolor='#0066CC'><input type='submit' value='Update'><input type='reset' value='Batal' onclick='self.history.back()'></td></tr>
</table>
</form>"; }
?>