<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data karyawan</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){ // mengkonfirmasi jika 'aksi' bernilai 'delete' merujuk pada baris 97 dibawah
				$id_karyawan = $_GET['id_karyawan']; // ambil nilai id_karyawan
				$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id_karyawan='$id_karyawan'"); // query untuk memilih entri dengan id_karyawan yang dipilih
				if(mysqli_num_rows($cek) == 0){ // mengecek jika tidak ada entri id_karyawan yang dipilih
					echo '<div class="alert alert-Pertanian alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; // maka tampilkan 'Data tidak ditemukan.'
				}else{ // mengecek jika terdapat entri id_karyawan yang dipilih
					$delete = mysqli_query($koneksi, "DELETE FROM karyawan WHERE id_karyawan='$id_karyawan'"); // query untuk menghapus
					if($delete){ // jika query delete berhasil dieksekusi
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
					}else{ // jika query delete gagal dieksekusi
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
					}
				}
			}
			?>

			<!-- bagian ini untuk memfilter data berdasarkan fakultas -->
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Data karyawan</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="A16" <?php if($filter == 'Accounting'){ echo 'selected'; } ?>>Accounting</option>
						<option value="G20" <?php if($filter == 'General Affairs'){ echo 'selected'; } ?>>General Affairs</option>
						<option value="H11" <?php if($filter == 'HRD'){ echo 'selected'; } ?>>HRD</option>
						<option value="I19" <?php if($filter == 'IT'){ echo 'selected'; } ?>>IT</option>
						<option value="P10" <?php if($filter == 'Production'){ echo 'selected'; } ?>>Production</option>
						<option value="P13" <?php if($filter == 'Purchasing'){ echo 'selected'; } ?>>Purchasing</option>
						<option value="P21" <?php if($filter == 'PPIC'){ echo 'selected'; } ?>>PPIC</option>
						<option value="Q12" <?php if($filter == 'Quality Assurance'){ echo 'selected'; } ?>>Quality Assurance</option>
						<option value="S14" <?php if($filter == 'Sales & Marketing'){ echo 'selected'; } ?>>Sales & Marketing</option>
						<option value="W17" <?php if($filter == 'Warehouse'){ echo 'selected'; } ?>>Warehouse</option>
					</select>
				</div>
			<a href="tambah.php" data-toggle="tooltip" data-placement="bottom" title="Tambah Data Karyawan"class="btn btn-sm btn-primary" ><span class="glyphicon glyphicon-user"> Tambah Data</a>
			<a href="export.php" data-toggle="tooltip" data-placement="bottom" title="Rekap" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-print">Rekap Karyawan</a>
			</form> <!-- end filter -->
			<br />
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>ID Karyawan</th>
						<th>Nama Karyawan</th>
						<th>alamat</th>
						<th>Jenis Kelamin</th>
						<th>Tanggal Lahir</th>
						<th>pendidikan</th>
						<th>Agama</th>
						<th>Tanggal Masuk</th>
						<th>No Telepon</th>
						<th>Action</th>
					</tr>
					<?php
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE kode_departemen='$filter' ORDER BY id_karyawan ASC"); // query jika filter dipilih
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY id_karyawan ASC"); // jika tidak ada filter maka tampilkan semua entri
					}
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td><a href="profile.php?id_karyawan='.$row['id_karyawan'].'">'.$row['id_karyawan'].'</a></td>
								
								<td>'.$row['nama_karyawan'].'</td>
								<td>'.$row['alamat'].'</td>
								<td>'.$row['jenkel'].'</td>
								<td>'.$row['tgl_lahir'].'</td>
								<td>'.$row['pendidikan'].'</td>
								<td>'.$row['agama'].'</td>
								<td>'.$row['tgl_masuk'].'</td>
								<td>'.$row['no_telp'].'</td>
								<td>	
									<a href="edit.php?id_karyawan='.$row['id_karyawan'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
									<a href="data.php?aksi=delete&id_karyawan='.$row['id_karyawan'].'" title="Hapus Data" data-toggle="tooltip" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama_karyawan'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
								</td>
							</tr>
							';
							$no++; // mewakili data kedua dan seterusnya
						}
					}
					?>
				</table>
			</div> <!-- /.table-responsive -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("../footer.php"); // memanggil file footer.php
?>