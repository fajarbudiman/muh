<?php
include "../config/koneksi.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
  document.location.href='index.php';</script>";
}
else {
$batas   = 5;
$halaman = @$_GET['halaman'];
if(empty($halaman)){
	$posisi  = 0;
	$halaman = 1;
}
else{ 
  $posisi  = ($halaman-1) * $batas; 
}
echo "
<form action='?module=tambah_agenda' method='post'>
<table cellpadding='0' cellspacing='0' border='0'>
<tr><td colspan='6' bgcolor='#009933'valign='center'><font size='+1' color='#FFFFFF'>Daftar Kegiatan IPM</font></td></tr>
<tr>
<td width='25' align='center'>No</td>
<td width='200' align='center'>Tema agenda</td>
<td width='250' align='center'>Tgl. Acara</td>
<td width='150' align='center'>tgl. Posting</td>
<td width='100' align='center' colspan='2'>Aksi</td></tr>";
	
$tampil="SELECT*FROM agenda ORDER BY id_agenda DESC LIMIT $posisi,$batas";
$query=mysql_query($tampil);
$jumlah=mysql_num_rows($query);
$no=1;
while ($data=mysql_fetch_array($query)){
$tgl_mulai   = tgl_indo($data['tgl_mulai']);
$tgl_selesai = tgl_indo($data['tgl_selesai']);
$tgl_posting = tgl_indo($data['tgl_posting']);

echo "
<tr>
<td width='25' align='center'>$no</td>
<td align='left'>$data[tema]</td>";
if ($tgl_mulai==$tgl_selesai){
echo "<td align='center'>$tgl_mulai</td>";}
else {
echo "<td align='center'>$tgl_mulai s/d $tgl_selesai</td>";}
echo "
<td align='center'>$tgl_posting</td>
<td width='50' align='center'><a href='?module=edit_agenda&id=$data[id_agenda]'>Edit</a></td>
<td width='50' align='center'><a href='?module=hapus_agenda&id=$data[id_agenda]'>Hapus</a></td>
</tr>";
$no++;
}
echo "
<tr><td colspan='5'>Jumlah Data yang ada</td><td>: $jumlah</td></tr>
<tr><td colspan='6' bgcolor='#009933' align='right'><input type='submit' value='Tambah agenda' /></td></tr>
</table>
</form><br><br>";
}
$jum=mysql_query("select*from agenda");
$jumlah1=mysql_num_rows($jum); 
// Langkah 3: Hitung total data dan halaman serta link 1,2,3 
$jmlhalaman = ceil($jumlah1/$batas);

// Mengambil nama file saat ini: paging_style.php
$file = $_SERVER['PHP_SELF'];

// Panggil div paging
echo "<div class=\"paging\">";

// Link ke halaman sebelumnya (previous)
if($halaman > 1){
  $prev=$halaman-1;
  echo "<span class=\"prevnext\">
        <a href=\"$file?halaman=$prev\">« Prev</a>
        </span> ";
}
else{ 
	echo "<span class=disabled>« Prev</span> ";
}

// Tampilkan link halaman 1,2,3 ...
for($i=1;$i<=$jmlhalaman;$i++)
if ($i != $halaman){
	echo " <a href=\"$file?halaman=$i\">$i</a> ";
}
else{
	echo " <span class=\"current\">$i</span> ";
}

// Link ke halaman berikutnya (Next)
if($halaman < $jmlhalaman){
  $next=$halaman+1;
  echo "<span class=\"prevnext\">
        <a href=\"$file?halaman=$next\">Next »</a>
        </span>";
}
else{ 
	echo "<span class=\"disabled\">Next »</span>";
} ?>
