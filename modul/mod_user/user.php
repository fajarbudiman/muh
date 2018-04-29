<?php
switch($_GET[act]){
	default:
	session_start();
	include "fungsi/class_paging.php";
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM tuser"));
?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Informasi User, Total Data: <?php echo $Num_Rows; ?> User</h3>
              </div>
              <div class="panel-body">
              <table class="table table-striped table-hover">                
                <tr>
				          <th><?php echo "<input type='button' value='Tambah User' onclick=\"window.location.href='?module=manajemen_user&act=tambahuser';\">"; ?></th>
                </tr>
                <tr>
                  <td>
                    <table class="table table-striped table-hover">
                      <tr>
                        <th style="width:5%">No</th>
                        <th style="width:20%">User ID</th>
                        <th style="width:21%">Nama Lengkap</th>
                        <th style="width:15%">Level</th>
                        <th style="width:10%">Aktif</th>
                        <th style="width:21%">Aksi</th>
                      </tr>
                      
                      <?php
								$p      = new PagingUser;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * FROM tuser ORDER BY Username ASC LIMIT $posisi,$batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									if ($data[Level] == '1'){
										$level = 'Administrator';
									}
									else{
										$level = 'Staff';
									}
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data[Username]; ?></td>
										<td><?php echo $data[NamaLengkap]; ?></td>
										<td><?php echo $level; ?></td>
										<td><?php echo $data[Aktif]; ?></td>
										<td><a href="?module=manajemen_user&act=view_user&id=<?php echo $data[IdUser]; ?>"><span class="glyphicon glyphicon-search"></span></a>
											<a href="?module=manajemen_user&act=edit_user&id=<?php echo $data[IdUser]; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
											<a href="modul/mod_user/aksi_user.php?module=manajemen_user&act=hapus_user&id=<?php echo $data[IdUser]; ?>&Username=<?php echo $data[Username]; ?>" onclick="return confirm('Anda yakin ingin menghapus user <?php echo $data[NamaLengkap]; ?>?');"><span class="glyphicon glyphicon-trash"></span></a> </td>
									</tr>
									<?php
									$no++;
								}
								echo "</table>";
								?>   
              </div>
            </div>
          </td>
        </tr>
      </table>

  <table>
					<tr>
						<td>
							<?php
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM tuser"));
							$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
							$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

							echo "<div id='paging'>Hal: $linkHalaman </div>";
							?>
						</td>
					</tr>
				</table>
			<div style="clear: both"></div>
		</div> <!-- End .module-table-body -->
<?php
	break;
//-----------------------------------------tambah user-----------------------------------------------
	case "tambahuser":
	echo "<h2><span>Tambah User</span></h2>";
	echo "<form method='POST' action='modul/mod_user/aksi_user.php?module=manajemen_user&act=input'>
			<table>
				<tr>
					<td height='35' width='150'> NUPTK </td>
					<td width='15'>:</td>
					<td><input type='text' name='NUPTK' size='30' maxlength='8'> *)</td>
        </tr>
        
				<tr>
					<td height='35'> Nama Lengkap </td>
					<td>:</td>
					<td><input type='text' name='NamaLengkap' size='30' maxlength='100'> *)</td>
				</tr>
				<tr>
					<td height='35'> Alamat </td>
					<td>:</td>
					<td><input type='text' name='Alamat' size='60'></td>
				</tr>
				<tr>
					<td height='35'> Telepon | Hp</td>
					<td>:</td>
					<td><input type='text' name='Telepon' size='30' maxlenth='20'> | <input type='text' name='CellPhone' size='30' maxlength='20'></td>
				</tr>
				<tr>
					<td height='35'> Agama </td>
					<td>:</td>
					<td> <select name='Agama'>
							<option value='++'>++ Pilih Agama ++</option>
							<option value='Islam'>Islam</option>
							<option value='Kristen'>Kristen</option>
							<option value='Katolik'>Katolik</option>
							<option value='Budha'>Budha</option>
							<option value='Hindu'>Hindu</option>
						 </select> *)
					</td>
				</tr>
				<tr>
					<td height='35'> Email </td>
					<td>:</td>
					<td><input type='text' name='Email' size='30' maxlength='100'> *)</td>
				</tr>
				<tr>
					<td height='35'> Aktif </td>
					<td>:</td>
					<td><input type='radio' name='Aktif' value='Y'>Y &nbsp;&nbsp; <input type='radio' name='Aktif' value='N'>N *)</td>
				</tr>
				<tr>
					<td height='35'> Level </td>
					<td>:</td>
					<td><input type='radio' name='Level' value='1'>Administrator &nbsp;&nbsp; <input type='radio' name='Level' value='2'>Staff *)</td>
				</tr>
				<tr>
					<td height='35'> Pendidikan Terakhir </td>
					<td>:</td>
					<td><select name='PendidikanTerakhir'><option value='++' selected>++ Pilih Pendidikan Terakhir ++</option>";
						$sql = mysql_query("SELECT * FROM tpendidikan_terakhir ORDER BY IdPendidikanTerakhir ASC");
						while ($data = mysql_fetch_array($sql)){
							echo "<option value='$data[IdPendidikanTerakhir]'>$data[PendidikanTerakhir]</option>";
						}
				echo "	</select> *)</td>
				</tr>
				<tr>
					<td height='35'> Username </td>
					<td>:</td>
					<td colspan='4'><input type='text' name='Username' size='30' maxlength='100'> *)</td>
				</tr>
				<tr>
					<td height='35'> Password </td>
					<td>:</td>
					<td colspan='4'><input type='text' name='Password' size='30'> *)</td>
				</tr>
				<tr>
					<td colspan=3>*) Isikan secara lengkap</td>
				</tr>
				<tr>
					<th colspan='6'><input type='submit' value='Simpan'><a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	//-------------------------akhir Tambah user-----------------------------------
	break;
	//--------------------------Edit User------------------------------------------ 
	case "edit_user":
	$data = mysql_fetch_array(mysql_query("SELECT * FROM tuser WHERE IdUser = '$_GET[id]'"));
	if ($data[Agama] == 'Islam'){
		$a = 'selected';
	}
	elseif($data[Agama] == 'Kristen'){
		$b = 'selected';
	}
	elseif($data[Agama] == 'Katolik'){
		$c = 'selected';
	}
	elseif($data[Agama] == 'Budha'){
		$d = 'selected';
	}
	elseif($data[Agama] == 'Hindu'){
		$e = 'selected';
	}
	else{
		$a = '';
		$b = '';
		$c = '';
		$d = '';
		$e = '';
	}
	
	if($data[Aktif] == 'Y'){
		$y = 'checked';
	}
	elseif($data[Aktif] == 'N'){
		$n = 'checked';
	}
	else{
		$y = '';
		$n = '';
	}
	
	if($data[Level] == '1'){
		$a1 = 'checked';
	}
	elseif($data[Level] == '2'){
		$a2 = 'checked';
	}
	else{
		$a1 = '';
		$a2 = '';
	}
	
	echo "<h2><span>Ubah User</span></h2>";
	echo "<form method='POST' action='modul/mod_user/aksi_user.php?module=manajemen_user&act=update'>
			<table>
				<tr>
					<td height='35' width='150'> Id User </td>
					<td width='15'>:</td>
					<td><input type='text' name='IdUser' size='30' value='$data[IdUser]' disabled><input type='hidden' name='IdUser' size='30' value='$data[IdUser]'></td>
				</tr>
				<tr>
					<td height='35' width='150'> NUTK </td>
					<td width='15'>:</td>
					<td><input type='text' name='NUTK' size='30' maxlength='8' value='$data[NUPTK]' disabled> *)</td>
				</tr>
				<tr>
					<td height='35'> Nama Lengkap </td>
					<td>:</td>
					<td><input type='text' name='NamaLengkap' size='30' maxlength='100' value='$data[NamaLengkap]'> *)</td>
				</tr>
				<tr>
					<td height='35'> Alamat </td>
					<td>:</td>
					<td><input type='text' name='Alamat' size='60' value='$data[Alamat]'></td>
				</tr>
				<tr>
					<td height='35'> Telepon | Hp</td>
					<td>:</td>
					<td><input type='text' name='Telepon' size='30' maxlenth='20' value='$data[Telepon]'> | <input type='text' name='CellPhone' size='30' maxlength='20' value='$data[CellPhone]'></td>
				</tr>
				<tr>
					<td height='35'> Agama </td>
					<td>:</td>
					<td> <select name='Agama'>
							<option value='++'>++ Pilih Agama ++</option>
							<option value='Islam' $a>Islam</option>
							<option value='Kristen' $b>Kristen</option>
							<option value='Katolik' $c>Katolik</option>
							<option value='Budha' $d>Budha</option>
							<option value='Hindu' $e>Hindu</option>
						 </select> *)
					</td>
				</tr>
				<tr>
					<td height='35'> Email </td>
					<td>:</td>
					<td><input type='text' name='Email' size='30' maxlength='100' value='$data[Email]'> *)</td>
				</tr>
				<tr>
					<td height='35'> Aktif </td>
					<td>:</td>
					<td><input type='radio' name='Aktif' value='Y' $y>Y &nbsp;&nbsp; <input type='radio' name='Aktif' value='N' $n>N *)</td>
				</tr>
				<tr>
					<td height='35'> Level </td>
					<td>:</td>
					<td><input type='radio' name='Level' value='1' $a1>Administrator &nbsp;&nbsp; <input type='radio' name='Level' value='2' $a2>Staff *)</td>
				</tr>
				<tr>
					<td height='35'> Pendidikan Terakhir </td>
					<td>:</td>
					<td><select name='PendidikanTerakhir'><option value='++' selected>++ Pilih Pendidikan Terakhir ++</option>";
						$sql = mysql_query("SELECT * FROM tpendidikan_terakhir ORDER BY IdPendidikanTerakhir ASC");
						while ($r = mysql_fetch_array($sql)){
							if ($data[IdPendidikanTerakhir] == $r[IdPendidikanTerakhir]){
								echo "<option value='$r[IdPendidikanTerakhir]' selected>$r[PendidikanTerakhir]</option>";
							}
							else{
								echo "<option value='$r[IdPendidikanTerakhir]'>$r[PendidikanTerakhir]</option>";
							}
						}
				echo "	</select> *)</td>
				</tr>
				<tr>
					<td colspan=3>*) Isikan secara lengkap</td>
				</tr>
				<tr>
					<th colspan='6'><input type='submit' value='Simpan'><a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;


	//--------------------------view User------------------------------------------ 
	case "view_user":
	$data = mysql_fetch_array(mysql_query("SELECT * FROM tuser WHERE IdUser = '$_GET[id]'"));
	if ($data[Agama] == 'Islam'){
		$a = 'selected';
	}
	elseif($data[Agama] == 'Kristen'){
		$b = 'selected';
	}
	elseif($data[Agama] == 'Katolik'){
		$c = 'selected';
	}
	elseif($data[Agama] == 'Budha'){
		$d = 'selected';
	}
	elseif($data[Agama] == 'Hindu'){
		$e = 'selected';
	}
	else{
		$a = '';
		$b = '';
		$c = '';
		$d = '';
		$e = '';
	}
	
	if($data[Aktif] == 'Y'){
		$y = 'checked';
	}
	elseif($data[Aktif] == 'N'){
		$n = 'checked';
	}
	else{
		$y = '';
		$n = '';
	}
	
	if($data[Level] == '1'){
		$a1 = 'checked';
	}
	elseif($data[Level] == '2'){
		$a2 = 'checked';
	}
	else{
		$a1 = '';
		$a2 = '';
	}
	
	echo "<h2><span>View User</span></h2>";
	echo "<form method='POST' action='modul/mod_user/aksi_user.php?module=manajemen_user&act=update'>
			<table>
				
				<tr>
					<td height='35' width='150'> NUPTK </td>
					<td width='15'>:</td>
					<td>$data[NUPTK]</td>
				</tr>
				<tr>
					<td height='35'> Nama Lengkap </td>
					<td>:</td>
					<td>$data[NamaLengkap]</td>
				</tr>
				<tr>
					<td height='35'> Alamat </td>
					<td>:</td>
					<td>$data[Alamat]</td>
				</tr>
				<tr>
					<td height='35'> Telepon | Hp</td>
					<td>:</td>
					<td>$data[Telepon] / $data[CellPhone]</td>
				</tr>
				<tr>
					<td height='35'> Agama </td>
					<td>:</td>
					<td> <select disabled name='Agama'>
							<option value='++'>++ Pilih Agama ++</option>
							<option value='Islam' $a>Islam</option>
							<option value='Kristen' $b>Kristen</option>
							<option value='Katolik' $c>Katolik</option>
							<option value='Budha' $d>Budha</option>
							<option value='Hindu' $e>Hindu</option>
						 </select>
					</td>
				</tr>
				<tr>
					<td height='35'> Email </td>
					<td>:</td>
					<td>$data[Email]</td>
				</tr>
				<tr>
					<td height='35'> Aktif </td>
					<td>:</td>
					<td><input type='radio' disabled name='Aktif' value='Y' $y>Y &nbsp;&nbsp; <input type='radio' disabled name='Aktif' value='N' $n>N </td>
				</tr>
				<tr>
					<td height='35'> Level </td>
					<td>:</td>
					<td><input type='radio' disabled name='Level' value='1' $a1>Administrator &nbsp;&nbsp; <input type='radio' disabled name='Level' value='2' $a2>Staff</td>
				</tr>
				<tr>
					<td height='35'> Pendidikan Terakhir </td>
					<td>:</td>
					<td><select disabled name='PendidikanTerakhir'><option value='++' selected>++ Pilih Pendidikan Terakhir ++</option>";
						$sql = mysql_query("SELECT * FROM tpendidikan_terakhir ORDER BY IdPendidikanTerakhir ASC");
						while ($r = mysql_fetch_array($sql)){
							if ($data[IdPendidikanTerakhir] == $r[IdPendidikanTerakhir]){
								echo "<option value='$r[IdPendidikanTerakhir]' selected>$r[PendidikanTerakhir]</option>";
							}
							else{
								echo "<option value='$r[IdPendidikanTerakhir]'>$r[PendidikanTerakhir]</option>";
							}
						}
				echo "	</select></td>
				</tr>
				<tr>
					<th colspan='6'><a href='javascript:history.go(-1)'><input type='button' value='Close'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;
}
?>    

