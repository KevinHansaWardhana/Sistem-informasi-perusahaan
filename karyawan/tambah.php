<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Karyawan &raquo; Tambah Data</h2>
			<hr />		
<?php
error_reporting(E_ALL ^ E_NOTICE);
$id_karyawan =$_POST['id_karyawan'];
$kode_departemen =$_POST['kode_departemen'];
$kode_jabatan = $_POST['kode_jabatan'];
$nama_karyawan =$_POST['nama_karyawan'];
$alamat =$_POST['alamat'];
$jenkel = $_POST['jenkel'];
$tgl_lahir =$_POST['tgl_lahir'];
$pendidikan =$_POST['pendidikan'];
$agama =$_POST['agama'];
$tgl_masuk = $_POST['tgl_masuk'];
$no_telp = $_POST['no_telp'];
$submit =$_POST['submit'];
$input="INSERT INTO karyawan VALUES('$id_karyawan', '$kode_departemen', '$kode_jabatan','$nama_karyawan', '$alamat', '$jenkel','$tgl_lahir', '$pendidikan', '$agama', '$tgl_masuk','$no_telp')";
if($submit) {
mysqli_query($koneksi,$input);
echo'<br>Data berhasil dimasukkan';}
?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">ID Karyawan</label>
					<div class="col-sm-2">
						<input type="text" name="id_karyawan" class="form-control" placeholder="ID Karyawan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama departemen</label>
					<div class="col-sm-2">
						<select name='kode_departemen'>
						<option disabled selected> Pilih </option>
						<?php 
						$sql ="select *from departemen";
						$retval = mysqli_query($koneksi,$sql );
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
						$retval = mysqli_query($koneksi,$sql );
						while($row = mysqli_fetch_array($retval)){
							echo "<option value= '$row[kode_jabatan]'>$row[nama_jabatan]</option>";
						}?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Karyawan</label>
					<div class="col-sm-2">
						<input type="text" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat </label>
					<div class="col-sm-3">
						<textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
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
						<input type="text" name="tgl_lahir" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Pendidikan</label>
					<div class="col-sm-3">
						<input type="pendidikan" name="pendidikan" class="form-control" placeholder="pendidikan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Agama</label>
					<div class="col-sm-2">
						<input type="text" name="agama" class="form-control" placeholder="Agama"required>
				</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Masuk</label>
					<div class="col-sm-2">
						<input type="text" name="tgl_masuk" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
				</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No Telp</label>
					<div class="col-sm-2">
						<input type="text" name="no_telp" class="form-control" placeholder="No Telp"required>
					</div>
				</div>				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type='submit' value='submit' name='submit' class="btn btn-sm btn-primary" data-toggle="tooltip" title="Simpan Data karyawan">
						<a href="data.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->

<?php 
include("../footer.php"); // memanggil file footer.php
?>