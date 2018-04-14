<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
if (empty($_SESSION['idadmin']) AND empty($_SESSION['passadmin'])){
echo "<script>alert('Maaf untuk mengakses ini anda harus login terlebih dahulu');
      document.location.href='index.php';</script>";
}
else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
  <!-- TinyMCE (WYSIYWG Editor) -->
  <script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
  <script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_sfm.js"></script>
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
	  	$(document).ready(function(){
        $("#tgl_mulai").datepicker({
					dateFormat  : "dd/mm/yy",        
          changeMonth : true,
          changeYear  : true					
        });      
      });
    </script>
</head>

<body>
<div id="wrapper">
<div id="header"></div>
<div id="menu">
<ul>
<?php  include "menu.php";   ?>
</ul>
</div>
<div id="rigtcontent">
<?php include "content.php" ?>
</div>
<div id="clearer"></div>
<div id="footer">
Selamat datang dihalaman admin kami,
selamat bekerja dengan fiture yang tersedia<br /> 
Copy Right @2015 Madrasah Mu'allimien/aat Muhammadiyah Jakarta </div>
</div>
</body>
</html>
<?php } ?>