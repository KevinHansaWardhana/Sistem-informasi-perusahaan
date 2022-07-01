<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Departemen &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" pada baris 164 ditekan
				$kode_departemen= $_POST['kode_departemen'];			
				$nama_departemen= $_POST['nama_departemen'];
				$jumlah_karyawan= $_POST['jumlah_karyawan'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM departemen WHERE kode_departemen='$kode_departemen'"); // query untuk memilih entri dengan nama_departemen terpilih
				if(mysqli_num_rows($cek) == 0){ // mengecek apakah nama_departemen yang akan ditambahkan tidak ada dalam database
						$insert = mysqli_query($koneksi, "INSERT INTO departemen VALUES('$kode_departemen','$nama_departemen','$jumlah_karyawan')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data departemen Berhasil Di Simpan. <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Data departemen Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data departemen Gagal Di simpan! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Ups, Data departemen Gagal Di simpan!'
						}
				}else{ // mengecek jika nama_departemen yang akan ditambahkan sudah ada dalam database
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>nama_departemen Sudah Ada..! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'nama_departemen Sudah Ada..!'
				}
			}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
			<div class="form-group">
					<label class="col-sm-3 control-label">Kode Departemen</label>
					<div class="col-sm-2">
						<input type="text" name="kode_departemen" class="form-control" placeholder="Kode Departemen" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Departemen</label>
					<div class="col-sm-2">
						<input type="text" name="nama_departemen" class="form-control" placeholder="Nama Departemen" required>
					</div>
				</div>
			<div class="form-group">
					<label class="col-sm-3 control-label">Jumlah Karyawan</label>
					<div class="col-sm-2">
						<input type="text" name="jumlah_karyawan" class="form-control" placeholder="Jumlah Karyawan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Departemen">
						<a href="data.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("../footer.php"); // memanggil file footer.php
?>