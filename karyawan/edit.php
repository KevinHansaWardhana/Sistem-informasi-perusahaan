<?php
include("header.php"); // memanggil file header.php
$conn =mysqli_connect('localhost', 'root', '','perusahaan');
$id_karyawan = $_GET['id_karyawan'];
$hasil="select * from karyawan where id_karyawan='$id_karyawan'";
$hasil_cari = mysqli_query($conn,$hasil);
$data = mysqli_fetch_array($hasil_cari);
?>

	<div class="container">
		<div class="content">
			<h2>Data Mahasiswa &raquo; Edit Data</h2>
			<hr />
			
			<!-- bagian ini merupakan bagian form untuk mengupdate data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="update.php" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">ID Karyawan</label>
					<div class="col-sm-2">
						<input type="text" name="id_karyawan" value="<?php echo $data ['id_karyawan']; ?>" class="form-control" placeholder="ID Karyawan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama departemen</label>
					<div class="col-sm-2">
						<select name='kode_departemen'>
						<option disabled selected> Pilih </option>
						<?php 
						$sql ="select *from departemen";
						$retval = mysqli_query($conn,$sql );
						while($row = mysqli_fetch_array($retval)){
							echo "<option value= '$row[kode_departemen]'>$row[nama_departemen]</option>";
						}?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Jabatan</label>
					<div class="col-sm-2">
						<select name='kode_jabatan'>
						<option disabled selected> Pilih </option>
						<?php 
						$sql ="select *from jabatan";
						$retval = mysqli_query($conn,$sql );
						while($row = mysqli_fetch_array($retval)){
							echo "<option value= '$row[kode_jabatan]'>$row[nama_jabatan]</option>";
						}?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Karyawan</label>
					<div class="col-sm-2">
						<input type="text" name="nama_karyawan" value="<?php echo $data ['nama_karyawan']; ?>"class="form-control" placeholder="Nama Karyawan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat </label>
					<div class="col-sm-3">
						<textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $data['alamat']?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-2">
						<select name="jenkel" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-3">
						<input type="text" name="tgl_lahir"value="<?php echo $data ['tgl_lahir']; ?>" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Pendidikan</label>
					<div class="col-sm-3">
						<input type="text" name="pendidikan" value="<?php echo $data ['pendidikan']; ?>"class="form-control" placeholder="pendidikan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Agama</label>
					<div class="col-sm-2">
						<input type="text" name="agama"value="<?php echo $data ['agama']; ?>" class="form-control" placeholder="Agama">
				</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Masuk</label>
					<div class="col-sm-2">
						<input type="text" name="tgl_masuk" value="<?php echo $data ['tgl_masuk']; ?>"class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" placeholder="dd-mm-yyyy" required >
				</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No Telp</label>
					<div class="col-sm-2">
						<input type="text" name="no_telp" value="<?php echo $data ['no_telp']; ?>"class="form-control" placeholder="No Telp">
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type='submit' value='Update' name='submit' class="btn btn-sm btn-primary" data-toggle="tooltip" title="Simpan Data Mahasiswa">
						<a href="data.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("../footer.php"); // memanggil file footer.php
?>