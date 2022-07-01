<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<hr />
			<hr />
			<h2>Data gaji karyawan</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){ // mengkonfirmasi jika 'aksi' bernilai 'delete' merujuk pada baris 97 dibawah
				$kd_gj = $_GET['kd_gj']; // ambil nilai id_karyawan
				$cek = mysqli_query($koneksi, "SELECT * FROM payroll WHERE kd_gj='$kd_gj'"); // query untuk memilih entri dengan id_karyawan yang dipilih
				if(mysqli_num_rows($cek) == 0){ // mengecek jika tidak ada entri id_karyawan yang dipilih
					echo '<div class="alert alert-Pertanian alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; // maka tampilkan 'Data tidak ditemukan.'
				}else{ // mengecek jika terdapat entri id_karyawan yang dipilih
					$delete = mysqli_query($koneksi, "DELETE FROM payroll WHERE kd_gj='$kd_gj'"); // query untuk menghapus
					if($delete){ // jika query delete berhasil dieksekusi
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
					}else{ // jika query delete gagal dieksekusi
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
					}
				}
			}
			?>
			<!-- bagian ini untuk memfilter data berdasarkan fakultas 
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Data karyawan</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="Production" <?php if($filter == 'Production'){ echo 'selected'; } ?>>Production</option>
						<option value="Quality Assurance" <?php if($filter == 'Quality Assurance'){ echo 'selected'; } ?>>	Quality Assurance</option>
					</select>
				</div> -->

			<a href="payroll.php" data-toggle="tooltip" data-placement="bottom" title="Tambah Data Gaji" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-user"> Tambah Data</a>
			</form> <!-- end filter -->
			<a href="export.php" data-toggle="tooltip" data-placement="bottom" title="Rekap" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-print">Rekap Gaji</a>
			<br />
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>Kode gaji</th>
						<th>ID Karyawan</th>
						<th>Nama Karyawan</th>
						<th>Nama Departemen</th>
						<th>Tanggal Gajian</th>
						<th>Overtime / Jam </th>
						<th>Fee Lembur</th>
						<th>Total Gaji</th>
						<th>Action</th>
					</tr>
					<?php
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT * FROM payroll WHERE nm_departemen='$filter' ORDER BY nm_departemen ASC"); // query jika filter dipilih
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM payroll ORDER BY nm_departemen ASC"); // jika tidak ada filter maka tampilkan semua entri
					}
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['kd_gj'].'</a></td>
								<td>'.$row['id_karyawan'].'</a></td>
								<td>'.$row['nm_karyawan'].'</td>
								<td>'.$row['nm_departemen'].'</td>
								<td>'.$row['tgl_gaji'].'</td>
								<td>'.$row['overtime'].'</td>
								<td>'.$row['fee_lembur'].'</td>
								<td>'.$row['total'].'</td>
								<td>	
									<a href="editgaji.php?kd_gj='.$row['kd_gj'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
									<a href="datagaji.php?aksi=delete&kd_gj='.$row['kd_gj'].'" title="Hapus Data" data-toggle="tooltip" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nm_karyawan'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
include("footer.php"); // memanggil file footer.php
?>