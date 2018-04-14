<?php
include "../config/koneksi.php";
// fungsi untuk menghindari injeksi dari user yang jahil
function anti_injection($data){
  $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter;
}

$username = anti_injection($_POST['nuptk']);
$password = anti_injection(md5($_POST['pass']));

// menghindari sql injection
$injeksi_username = mysql_real_escape_string($username);
$injeksi_password = mysql_real_escape_string($password);

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($injeksi_username) OR !ctype_alnum($injeksi_password)){
  echo "Sekarang loginnya tidak bisa di injeksi lho.";
}
else{
  $query  = "SELECT * FROM admin WHERE nuptk='$username' AND password='$password' AND blokir='N'";
  $login  = mysql_query($query);
  $ketemu = mysql_num_rows($login);
  $r      = mysql_fetch_array($login);

  // Apabila username dan password ditemukan (benar)
  if ($ketemu > 0){
    session_start();

    // bikin variabel session
    $_SESSION['idadmin']       = $r['nuptk'];
    $_SESSION['passadmin']     = $r['password'];
    $_SESSION['namalengkap']   = $r['nama_lengkap'];
    $_SESSION['level']         = $r['level'];
	$_SESSION['jenjang']       = $r['id_jenjang'];
      
    // bikin id_session yang unik dan mengupdatenya agar slalu berubah 
    // agar user biasa sulit untuk mengganti password Administrator 
    $sid_lama = session_id();
	  session_regenerate_id();
    $sid_baru = session_id();
    mysql_query($konek, "UPDATE admin SET id_session='$sid_baru' WHERE nuptk='$username'");

    header("location:media.php?module=beranda");
  }
  else{
    echo "<div id=\"login\"><h1 class=\"fail\">Login Gagal! Username & Password salah.</h1>";
    echo "<p class=\"fail\"><a href=\"index.php\">Ulangi Lagi</a></p></div>";  
  }
}
?>