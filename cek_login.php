<?php
include "koneksi/koneksi.php";
$userName	= $_POST[username];
$passWord	= md5($_POST[password]);
$level		= $_POST[level];

$sql 	= mysql_query("SELECT * FROM tuser WHERE Username = '$userName' AND Password = '$passWord' AND Level = '$level'");
$ketemu = mysql_num_rows($sql);
$data	= mysql_fetch_array($sql);

if (empty($userName) || empty($passWord)){
	echo "<script>alert('Anda belum memasukkan username atau password'); window.location = 'index.php'</script>";
}
elseif ($level == '++'){
	echo "<script>alert('Anda belum memilih level user'); window.location = 'index.php'</script>";
}
else{
	if ($ketemu > 0){
		$date = date('Y-m-d H:i:s');
		mysql_query("UPDATE tuser SET LastLogin = '$date' WHERE IdUser = '$data[IdUser]'");
		session_start();
		session_register("IdUser");
		session_register("Username");
		session_register("Password");
		session_register("NIP");
		session_register("Level");
		session_register("NamaLengkap");
	
		$_SESSION[IdUser] 	= $data[IdUser];
		$_SESSION[Username] = $data[Username];
		$_SESSION[Password]	= $data[Password];
		$_SESSION[NIP]		= $data[NIP];
		$_SESSION[Level]	= $data[Level];
		$_SESSION[NamaLengkap] = $data[NamaLengkap];
	
		header('location: master.php');
	}
	else{
		header('location: index.php');
	}
}
?>