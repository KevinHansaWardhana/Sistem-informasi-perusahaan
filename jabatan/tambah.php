<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data jabatan &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" pada baris 164 ditekan
				$kode_jabatan		 = $_POST['kode_jabatan'];
				$nama_jabatan		 = $_POST['nama_jabatan'];

				$cek = mysqli_query($koneksi, "SELECT * FROM jabatan WHERE kode_jabatan='$kode_jabatan'"); // query untuk memilih entri dengan nama_jabatan terpilih
				if(mysqli_num_rows($cek) == 0){ // mengecek apakah nama_jabatan yang akan ditambahkan tidak ada dalam database
						$insert = mysqli_query($koneksi, "INSERT INTO jabatan(kode_jabatan, nama_jabatan) VALUES('$kode_jabatan','$nama_jabatan')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data jabatan Berhasil Di Simpan. <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Data jabatan Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data jabatan Gagal Di simpan! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Ups, Data jabatan Gagal Di simpan!'
						}
				}else{ // mengecek jika nama_jabatan yang akan ditambahkan sudah ada dalam database
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>nama_jabatan Sudah Ada..! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'nama_jabatan Sudah Ada..!'
				}
			}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
			<div class="form-group">
					<label class="col-sm-3 control-label">Kode Jabatan</label>
					<div class="col-sm-2">
						<input type="text" name="kode_jabatan" class="form-control" placeholder="Kode Jabatan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Jabatan</label>
					<div class="col-sm-2">
						<input type="text" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data jabatan">
						<a href="data.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("../footer.php"); // memanggil file footer.php
?>