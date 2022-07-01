<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Jabatan &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$kode_jabatan = $_GET['kode_jabatan']; // assigment nama_jabatan dengan nilai nama_jabatan yang akan diedit
			$sql = mysqli_query($koneksi, "SELECT * FROM jabatan WHERE kode_jabatan='$kode_jabatan'"); // query untuk memilih entri data dengan nilai nama_jabatan terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: data.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){ // jika tombol 'Simpan' dengan properti name="save" pada baris 162 ditekan
				$nama_jabatan		     = $_POST['nama_jabatan'];

				
				$update = mysqli_query($koneksi, "UPDATE jabatan SET nama_jabatan='$nama_jabatan' WHERE kode_jabatan='$kode_jabatan'") or die(mysqli_error()); // query untuk mengupdate nilai entri dalam database
				if($update){ // jika query update berhasil dieksekusi
					header("Location: edit.php?kode_jabatan=".$kode_jabatan."&pesan=sukses"); // tambahkan pesan=sukses pada url
				}else{ // jika query update gagal dieksekusi
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>'; // maka tampilkan 'Data gagal disimpan, silahkan coba lagi.'
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){ // jika terdapat pesan=sukses sebagai bagian dari berhasilnya query update dieksekusi
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan. <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Data berhasil disimpan.'
			}
			?>
			<!-- bagian ini merupakan bagian form untuk mengupdate data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Jabatan</label>
					<div class="col-sm-2">
						<input type="text" name="nama_jabatan" value="<?php echo $row ['nama_jabatan']; ?>" class="form-control" placeholder="nama_jabatan" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data nama_jabatan">
						<a href="data.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("../footer.php"); // memanggil file footer.php
?>