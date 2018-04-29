<?php
switch($_GET[act]){
	default:
	session_start();
	include "fungsi/class_paging.php";
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM tkelas"));
?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Informasi Kelas, Total Data: <?php echo $Num_Rows; ?> Kelas</h3>
              </div>
              <div class="panel-body">
              <table class="table table-striped table-hover">                
                <tr>
				          <th><?php echo "<input type='button' value='Tambah Kelas' onclick=\"window.location.href='?module=manajemen_kelas&act=tambahkelas';\">"; ?></th>
                </tr>
                <tr>
                  <td>
                    <table class="table table-striped table-hover">
                      <tr>
                        <th style="width:5%">No</th>
                        <th style="width:20%">Jenjang</th>
                        <th style="width:21%">Nama Kelas</th>
                        <th style="width:15%">Wali Kelas</th>
                        <th style="width:15%">Aktif</th>						
                        <th style="width:21%">Aksi</th>
                      </tr>
                      
                      <?php
								$p      = new PagingUser;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * FROM tkelas,tjurusan WHERE tjurusan.IdJurusan = tkelas.IdJurusan ORDER BY IdKelas ASC LIMIT $posisi,$batas");
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
										<td><?php echo $data[NamaJurusan]; ?></td>
										<td><?php echo $data[NamaKelas]; ?></td>
										<td><?php echo $data[WaliKelas]; ?></td>
										<td><?php echo $data[Aktif]; ?></td>										
										<td><a href="?module=manajemen_kelas&act=view_kelas&id=<?php echo $data[IdKelas]; ?>"><span class="glyphicon glyphicon-search"></span></a>
											<a href="?module=manajemen_kelas&act=edit_kelas&id=<?php echo $data[IdKelas]; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
											<a href="modul/mod_kelas/aksi_kelas.php?module=manajemen_kelas&act=hapus_kelas&id=<?php echo $data[IdKelas]; ?>&NameKelas=<?php echo $data[NamaKelas]; ?>" onclick="return confirm('Anda yakin ingin menghapus Kelas <?php echo $data[NamaKelas]; ?>?');"><span class="glyphicon glyphicon-trash"></span></a> </td>
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
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM tkelas"));
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
//-----------------------------------------tambah kelas-----------------------------------------------
	case "tambahkelas":
	echo "<h2><span>Tambah Kelas</span></h2>";
	echo "<form method='POST' action='modul/mod_kelas/aksi_kelas.php?module=manajemen_kelas&act=input'>
			<table>
				<tr>
					<td height='35' width='90'> Jenjang </td>
					<td width='10'>:</td>
					<td> <select name='IdJurusan'>
							<option value='++'>--- Pilih Jenjang ---</option>
							<option value='1'>MA</option>
							<option value='2'>MTS</option>
						</select> *)
					</td>
				</tr>
        
				<tr>
					<td height='35'> Nama Kelas </td>
					<td>:</td>
					<td><input type='text' name='NamaKelas' size='30' maxlength='100'> *)</td>
				</tr>
				<tr>
					<td height='35'> Wali Kelas </td>
					<td>:</td>
					<td><input type='text' name='WaliKelas' size='60'></td>
				</tr>
				<tr>
					<td  height='35'> Aktif </td>
					<td>:</td>
					<td><input type='radio' name='Aktif' value='Y'>Y &nbsp;&nbsp; <input type='radio' name='Aktif' value='N'>N *)</td>
				</tr>
				<tr>
					<td colspan=3>*) Isikan secara lengkap</td>
				</tr>
				<tr>
					<th height='35'colspan='6'><input type='submit' value='Simpan'><a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	//-------------------------akhir Tambah Kelas-----------------------------------
	break;
	//--------------------------Edit Kelas------------------------------------------ 
	case "edit_kelas":
	$data = mysql_fetch_array(mysql_query("SELECT * FROM tkelas WHERE IdKelas = '$_GET[id]'"));
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
	
	echo "<h2><span>Ubah Kelas</span></h2>";
	echo "<form method='POST' action='modul/mod_kelas/aksi_kelas.php?module=manajemen_kelas&act=update'>
			<table>
				<tr>
					<td height='35' width='90'> Jurusan </td>
						<td width='10'>:</td>
						<td><select name='IdJurusan'><option value='++'>++ Pilih Jurusan ++</option>";
						
						$sql = mysql_query("SELECT * FROM tjurusan");
						while ($data2 = mysql_fetch_array($sql)){
							if($data[IdJurusan] == $data2[IdJurusan]){
								echo "<option value='$data2[IdJurusan]' SELECTED>$data2[NamaJurusan]</option>";
							}
							else{
								echo "<option value='$data2[IdJurusan]'>$data2[NamaJurusan]</option>";
							}
						}
						
					echo "</select>
						*)</td>
				</tr>
				<tr>
					<td height='35'> Nama Kelas </td>
					<td>:</td>
					<td><input type='text' name='NamaKelas' size='30' maxlength='20' value='$data[NamaKelas]'> *)</td>
				</tr>
				<tr>
					<td height='35'> Wali Kelas </td>
					<td>:</td>
					<td><input type='text' name='WaliKelas' size='30' maxlength='40' value='$data[WaliKelas]'> *)</td>
				</tr>
				<tr>
					<td height='35'> Aktif </td>
					<td>:</td>
					<td><input type='radio' name='Aktif' value='Y' $y>Y &nbsp;&nbsp; <input type='radio' name='Aktif' value='N' $n>N *)</td>
				</tr>
				<tr>
					<td height='35'colspan=3>*) Isikan secara lengkap</td>
				</tr>
				<tr>
					<th height='35'colspan='6'><input type='submit' value='Simpan'><a href='javascript:history.go(-1)'><input type='button' value='Cancel'></a></th>
				</tr>
			</table>
		</form>
	
		";
	echo "<p>&nbsp;</p>";
	break;


	//--------------------------view User------------------------------------------ 
	case "view_kelas":
	$data = mysql_fetch_array(mysql_query("SELECT * FROM tkelas,tjurusan WHERE tjurusan.IdJurusan = tkelas.IdJurusan && tkelas.IdKelas = '$_GET[id]'"));
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
	echo "<h2><span>View User</span></h2>";
	echo "<form method='POST' action='modul/mod_kelas/aksi_kelas.php?module=manajemen_kelas&act=update'>
			<table>
				
				<tr>
					<td height='35' width='150'> Jenjang </td>
					<td width='15'>:</td>
					<td>$data[NamaJurusan]</td>
				</tr>
				<tr>
					<td height='35'> Nama Kelas </td>
					<td>:</td>
					<td>$data[NamaKelas]</td>
				</tr>
				<tr>
					<td height='35'> Wali Kelas </td>
					<td>:</td>
					<td>$data[WaliKelas]</td>
				</tr>
				<tr>
					<td height='35'> Aktif </td>
					<td>:</td>
					<td><input type='radio' disabled name='Aktif' value='Y' $y>Y &nbsp;&nbsp; <input type='radio' disabled name='Aktif' value='N' $n>N </td>
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

