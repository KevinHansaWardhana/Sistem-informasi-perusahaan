<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Departemen &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$kode_departemen = $_GET['kode_departemen']; // assigment nama_departemen dengan nilai nama_departemen yang akan diedit
			$sql = mysqli_query($koneksi, "SELECT * FROM departemen WHERE kode_departemen='$kode_departemen'"); // query untuk memilih entri data dengan nilai nama_departemen terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: data.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){ // jika tombol 'Simpan' dengan properti name="save" pada baris 162 ditekan
				$nama_departemen		     = $_POST['nama_departemen'];
				$jumlah_karyawan =	$_POST['jumlah_karyawan'];
			
				$update = mysqli_query($koneksi, "UPDATE departemen SET nama_departemen='$nama_departemen', jumlah_karyawan='$jumlah_karyawan' WHERE kode_departemen='$kode_departemen'") or die(mysqli_error()); // query untuk mengupdate nilai entri dalam database
				if($update){ // jika query update berhasil dieksekusi
					header("Location: edit.php?kode_departemen=".$kode_departemen."&pesan=sukses"); // tambahkan pesan=sukses pada url
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
					<label class="col-sm-3 control-label">Nama Departemen</label>
					<div class="col-sm-2">
						<input type="text" name="nama_departemen" value="<?php echo $row ['nama_departemen']; ?>" class="form-control" placeholder="Nama Departemen" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jumlah Karyawan</label>
					<div class="col-sm-2">
						<input type="text" name="jumlah_karyawan" value="<?php echo $row ['jumlah_karyawan']; ?>" class="form-control" placeholder="Jumlah Karyawan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Departemen">
						<a href="data.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("../footer.php"); // memanggil file footer.php
?>