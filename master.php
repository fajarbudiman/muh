<?php
error_reporting(0);
session_start();
if (empty($_SESSION[Username]) AND empty($_SESSION[Password]) AND empty($_SESSION[Level])){
	header('location: index.php');
}
else{
	if ($_SESSION[Level] == '1'){
		include "master/master_admin.php";
	}
	else{
		include "master/master_staff.php";
	}
}
?>