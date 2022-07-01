<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<hr />
			<hr />
			<h2>Data Karyawan &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" pada baris 164 ditekan
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
							
						$cek = mysqli_query($koneksi, "SELECT * FROM payroll WHERE kd_gj='$kd_gj'"); // query untuk memilih entri dengan nama_departemen terpilih
						if(mysqli_num_rows($cek) == 0){ // mengecek apakah nama_departemen yang akan ditambahkan tidak ada dalam database
						$insert = mysqli_query($koneksi, "INSERT INTO payroll VALUES('$kd_gj', '$id_karyawan', '$nm_karyawan', '$nm_departemen' , '$tgl_gaji' , '$jam', '$overtime',  '$total')") or die(mysqli_error($koneksi)); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data departemen Berhasil Di Simpan. <a href="datagaji.php"><- Kembali</a></div>'; // maka tampilkan 'Data departemen Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data departemen Gagal Di simpan! <a href="datagaji.php"><- Kembali</a></div>'; // maka tampilkan 'Ups, Data departemen Gagal Di simpan!'
						}
				}else{ // mengecek jika nama_departemen yang akan ditambahkan sudah ada dalam database
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>nama_departemen Sudah Ada..! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'nama_departemen Sudah Ada..!'
				}
			}
						
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Kode Gaji</label>
					<div class="col-sm-2">
						<input type="text" name="kd_gj" class="form-control" placeholder="kode gaji" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Id Karyawan</label>
					<div class="col-sm-2">
						<input type="text" name="id_karyawan" class="form-control" placeholder="Id Karyawan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Karywan</label>
					<div class="col-sm-4">
						<input type="text" name="nm_karyawan" class="form-control" placeholder="Nama Karyawan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Departemen</label>
					<div class="col-sm-4">
						<input type="text" name="nm_departemen" class="form-control" placeholder="Nama Departemen" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Gajian</label>
					<div class="col-sm-3">
						<input type="text" name="tgl_gaji" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
				</div>		
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Lembur / Jam </label>
					<div class="col-sm-3">
						<input type="text" name="jam" class="form-control" placeholder="Lama Lembur" required>
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
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data karyawan">
						<a href="datagaji.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>