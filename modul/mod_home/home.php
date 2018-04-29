<?php
session_start();
// =========================== LEVEL USER : ADMINISTRATOR ============================================================//
if ($_SESSION[Level] == '1'){
	$data = mysql_fetch_array(mysql_query("SELECT * FROM tuser WHERE IdUser = '$_SESSION[IdUser]'"));
?>           
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Welcome to Administration System</h3>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-hover">
                    <tr>
                        <td>
                        Hai <b><?php echo $_SESSION[NamaLengkap]; ?></b>, Selamat datang di halaman utama sistem akademik,
                        Anda dapat mengolah segala aktifitas dalam sistem ini.. semua aktifitas yang Anda lakukan akan terekam dalam database.
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p> 
                        </td>
                    </tr>
                  </table>
                  <table>
			<tr>
				<td>
					Date Login: <?php echo $data[LastLogin]; ?>
				</td>
			</tr>
		</table>
              </div>
            </div>
</div>
<!--end Module body--><?php
}
else{
	$data = mysql_fetch_array(mysql_query("SELECT * FROM tuser WHERE IdUser = '$_SESSION[IdUser]'"));
?>
<div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Welcome to Staff System</h3>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-hover">
                    <tr>
                        <td>
                        Hai <b><?php echo $_SESSION[NamaLengkap]; ?></b>, Selamat datang di halaman utama sistem akademik,
                        Anda dapat mengolah segala aktifitas dalam sistem ini.. semua aktifitas yang Anda lakukan akan terekam dalam database.
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p> 
                        </td>
                    </tr>
                  </table>
                  <table>
			<tr>
				<td>
					Date Login: <?php echo $data[LastLogin]; ?>
				</td>
			</tr>
		</table>
              </div>
            </div>
</div>
<?php
}
?>