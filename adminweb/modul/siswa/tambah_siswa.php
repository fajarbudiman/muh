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
<form action='?module=input_siswa' method='post'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='2' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Tambahkan Data Siswa</font></td></tr>
<tr><td width='200'>Jenjang</td><td width='200'><select name='jenjang' disabled='disabled'>";
                                                 $jenjang=mysql_query("select*from jenjang order by nama_jenjang");
												 if ($_SESSION['jenjang']==0){
												 echo "<option value=0 selected>- Pilih Jenjang -</option>";}
												 while($jen=mysql_fetch_array($jenjang)){
												 if ($_SESSION['jenjang']==$jen['id_jenjang']){
												 echo "<option value=$jen[id_jenjang] selected>$jen[nama_jenjang]</option>";}
												 else {
												 echo "<option value=$jen[id_jenjang]>$jen[nama_jenjang]</option>";}
												 }
echo "</select></td></tr>
<tr><td width='100'>Tahun Ajaran</td><td width='200'><select name='angkatan'>
                                                 <option value='0' selected='selected'>- PILIH -</option>";
                                                 $tampil=mysql_query("select*from angkatan");
												 while ($data=mysql_fetch_array($tampil)){
												 echo " <option value='$data[id_angkatan]'>$data[tahun_ajaran]</option>";} 
echo "
<tr><td width='200' >NISN</td><td><input name='nisn' type='text'></td></tr>
<tr><td width='200' >NIK</td><td><input name='nik' type='text'></td></tr>
<tr><td width='200' >Nama Lengkap</td><td><input name='nama' type='text'></td></tr>
<tr><td width='200' >Tempat Lahir</td><td><input name='tmp' type='text'></td></tr>
<tr><td width='200' >Tgl Lahir</td><td><input name='tgl' id='tgl_lahir' type='text'/></td></tr>
<tr><td width='200' >Jenis Kelamin</td><td><input type='radio' name='jk' value='L'> Laki-laki  
                                           <input type='radio' name='jk' value='P'> Perempuan </td></tr>
<tr><td width='200' >Anak Ke -</td><td><input name='ke' type='text'/></td></tr>";
echo "
<tr><td width='100'>Kelas</td><td width='200'><select name='kls'>
                                                 <option value='0' selected='selected'>- PILIH KELAS -</option>";
                                                 $tampil1=mysql_query("select*from kelas where id_jenjang=$_SESSION[jenjang]");
												 while ($data1=mysql_fetch_array($tampil1)){
												 echo " <option value='$data1[id_kelas]'>$data[nama_kelas]</option>";} 
echo "</select></td></tr>
<tr><td width='200' >No. Peserta UN</td><td><input name='no' type='text'></td></tr>
<tr><td width='200' >Alamat</td><td><input name='alamat' type='text'></td></tr>
<tr><td width='200' >Kota Madya</td><td><input name='kota' type='text'></td></tr>
<tr><td width='200' >Kecamatan</td><td><input name='kec' type='text'></td></tr>
<tr><td width='200' >Kelurahan</td><td><input name='kel' type='text'></td></tr>
<tr><td width='200' >Nama Ayah</td><td><input name='ayah' type='text'></td></tr>
<tr><td width='200' >NIK Ayah</td><td><input name='nik_ayah' type='text'></td></tr>
<tr><td width='200' >Pendidikan Ayah</td><td><input name='lulus_ayah' type='text'></td></tr>
<tr><td width='200' >Status Ayah</td><td><input type='radio' name='sa' value='H'> Hidup
                                         <input type='radio' name='sa' value='M'> Mati </td></tr>
<tr><td width='200' >Nama Ibu</td><td><input name='ibu' type='text'></td></tr>
<tr><td width='200' >NIK Ibu</td><td><input name='nik_ibu' type='text'></td></tr>
<tr><td width='200' >Pendidikan Ibu</td><td><input name='lulus_ibu' type='text'></td></tr>
<tr><td width='200' >Status Ibu</td><td><input type='radio' name='si' value='H'> Hidup
                                        <input type='radio' name='si' value='M'> Mati </td></tr>
<tr><td width='200' >Penghasilan</td><td><input name='hasil' type='text'></td></tr>
<tr><td colspan='2' align='right' bgcolor='#0066CC'><input type='submit' value='Simpan'><input type='reset' value='Batal' onclick='self.history.back()'></td></tr>
</table>
</form>"; }
?>