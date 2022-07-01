<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Departemen</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){ // mengkonfirmasi jika 'aksi' bernilai 'delete' merujuk pada baris 97 dibawah
				$kode_departemen = $_GET['kode_departemen']; // ambil nilai nama_departemen
				$cek = mysqli_query($koneksi, "SELECT * FROM departemen WHERE kode_departemen='$kode_departemen'"); // query untuk memilih entri dengan nama_departemen yang dipilih
				if(mysqli_num_rows($cek) == 0){ // mengecek jika tidak ada entri nama_departemen yang dipilih
					echo '<div class="alert alert-Pertanian alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; // maka tampilkan 'Data tidak ditemukan.'
				}else{ // mengecek jika terdapat entri nama_departemen yang dipilih
					$delete = mysqli_query($koneksi, "DELETE FROM departemen WHERE kode_departemen='$kode_departemen'"); // query untuk menghapus
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
						<option value="0">Filter Data Departemen</option>
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
			<a href="export.php" data-toggle="tooltip" data-placement="bottom" title="Rekap" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-print">Rekap Departemen</a>
			</form> <!-- end filter -->
			<br />
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>Nama Departemen</th>
						<th>Jumlah Karyawan</th>
						<th>Action</th>
					</tr>
					<?php
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT * FROM departemen WHERE kode_departemen='$filter' ORDER BY kode_departemen ASC"); // query jika filter dipilih
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM departemen ORDER BY kode_departemen ASC"); // jika tidak ada filter maka tampilkan semua entri
					}
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['nama_departemen'].'</td>
								<td>'.$row['jumlah_karyawan'].'</td>
								<td>	
									<a href="edit.php?kode_departemen='.$row['kode_departemen'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
									<a href="data.php?aksi=delete&kode_departemen='.$row['kode_departemen'].'" title="Hapus Data" data-toggle="tooltip" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama_departemen'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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