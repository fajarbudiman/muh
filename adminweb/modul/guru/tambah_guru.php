<?php
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else { 
echo "
<form action='?module=input_guru' method='post'>
<table cellpadding='0' cellspacing='0' border='1'>
<tr><td colspan='2' bgcolor='#0066CC' valign='center'><font size='+1' color='#FFFFFF'>Tambahkan Data guru</font></td></tr>
<tr><td width='100' >NUPTK/PegId</td><td><input name='nuptk' type='text'></td></tr>
<tr><td width='200' >Nama Lengkap</td><td><input name='nama' type='text'></td></tr>
<tr><td width='200' >Tempat Lahir</td><td><input name='tmp' type='text'></td></tr>
<tr><td width='200' >Tgl Lahir</td><td><input name='tgl' id='tgl_lahir' type='text'/></td></tr>
<tr><td width='200' >Jenis Kelamin</td><td><input type='radio' name='jk' value='L'> Laki-laki  
                                           <input type='radio' name='jk' value='P'> Perempuan </td></tr>
<tr><td width='200' >Alamat</td><td><input name='alamat' type='text'></td></tr>";
echo "
<tr><td width='100'>Mata Pelajaran</td><td width='200'><select name='mapel'>
                                                 <option value='0' selected='selected'>- PILIH KELAS -</option>";
                                                 $tampil1=mysql_query("select*from mapel");
												 while ($data1=mysql_fetch_array($tampil1)){
												 echo " <option value='$data1[id_mapel]'>$data1[nama_mapel]</option>";} 
echo "</select></td></tr>
<tr><td width='200' >E-mail</td><td><input name='email' type='text'></td></tr>
<tr><td width='200' >No. Telepon</td><td><input name='tlp' type='text'></td></tr>
<tr><td width='200' >Tgl Mulai Tugas</td><td><input name='tgl_mulai' id='tgl_mulai' type='text'/></td></tr>
<tr><td width='200' >Status Guru</td><td><input type='radio' name='sg' value='aktfi'> Aktif
                                         <input type='radio' name='sg' value='tidak'> NonAktif </td></tr>
<tr><td colspan='2' align='right' bgcolor='#0066CC'><input type='submit' value='Simpan'><input type='reset' value='Batal' onclick='self.history.back()'></td></tr>
</table>
</form>"; }
?>