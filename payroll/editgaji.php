<?php 

include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<hr />
			<hr />
			<h2>Data Gaji &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$kd_gj = $_GET['kd_gj']; // assigment nm_departemen dengan nilai nm_departemen yang akan diedit
			$sql = mysqli_query($koneksi, "SELECT * FROM payroll WHERE kd_gj='$kd_gj'"); // query untuk memilih entri data dengan nilai nm_departemen terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: datagaji.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){ // jika tombol 'Simpan' dengan properti name="save" pada baris 162 ditekan
		
				$kd_gj= $_POST['kd_gj'];
				$id_karyawan= $_POST['id_karyawan'];
				$nm_karyawan= $_POST['nm_karyawan'];
				$nm_departemen= $_POST['nm_departemen'];
				$tgl_gaji= $_POST['tgl_gaji'];
				$fee=$_POST['fee'];
				$jam=$_POST['jam'];
				$fee_lembur=4*48*$fee;
				$overtime=$jam*25000;
				$total=$fee_lembur+$overtime;
				echo "KODE".$kd_gj;
				$update = mysqli_query($koneksi, "UPDATE payroll SET kd_gj='$kd_gj', id_karyawan = '$id_karyawan', nm_karyawan = '$nm_karyawan', nm_departemen = '$nm_departemen', 
				tgl_gaji = '$tgl_gaji', overtime = '$jam', fee_lembur = '$overtime', total = '$total' WHERE kd_gj = '$kd_gj'") or die(mysqli_error($koneksi)); // query untuk mengupdate nilai entri dalam database
				if($update){ // jika query update berhasil dieksekusi
					header("Location: editgaji.php?kd_gj=".$kd_gj."&pesan=sukses"); // tambahkan pesan=sukses pada url
				}else{ // jika query update gagal dieksekusi
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>'; // maka tampilkan 'Data gagal disimpan, silahkan coba lagi.'
				}
			}
			

			
			
			if(isset($_GET['pesan']) == 'sukses'){ // jika terdapat pesan=sukses sebagai bagian dari berhasilnya query update dieksekusi
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan. <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Data berhasil disimpan.'
			}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<!--<div class="form-group">
					<label class="col-sm-3 control-label">Kode Gaji</label>
					<div class="col-sm-2">
						<input type="text" name="kd_gj" value="<?php echo $row ['kd_gj']; ?>" class="form-control" placeholder="kd_gj" required>
					</div>
				</div>-->
				<div class="form-group">
					<label class="col-sm-3 control-label">Id Karyawan</label>
					<div class="col-sm-2">
						<input type="text" name="id_karyawan" value="<?php echo $row ['id_karyawan']; ?>" class="form-control" placeholder="Id Karyawan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Karywan</label>
					<div class="col-sm-4">
						<input type="text" name="nm_karyawan" value="<?php echo $row ['nm_karyawan']; ?>" class="form-control" placeholder="Nama Karyawan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Departemen</label>
					<div class="col-sm-4">
						<input type="text" name="nm_departemen" value="<?php echo $row ['nm_departemen']; ?>" class="form-control" placeholder="Nama Departemen" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Gajian</label>
					<div class="col-sm-3">
						<input type="text" name="tgl_gaji" value="<?php echo $row ['tgl_gaji']; ?>" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
				</div>		
				</div>	
				<div class="form-group">
					<label class="col-sm-3 control-label">Lembur / Jam </label>
					<div class="col-sm-3">
						<input type="text" name="jam" value="<?php echo $row ['overtime']; ?>" class="form-control" placeholder="Lama Lembur" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jabatan </label>
					<div class="col-sm-2">
					
					<select name="fee" class="form-control" required>
						<option value=" "> - Pilih Jabatan - </option>
						<?php 
						$sql ="SELECT * FROM gaji";
						$hasil=mysqli_query($koneksi, $sql);
						while($data = mysqli_fetch_array($hasil)){
						?>
						<option value= '<?=$data['jumlah_gaji']?>'><?=$data['nama_jabatanfk']?></option>	
						<?php	
						}
						?>
						</select>
					</div>	
				</div>			
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="save" data-toggle="tooltip" title="Simpan Data karyawan">
						<a href="datagaji.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>