<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Jabatan</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){ // mengkonfirmasi jika 'aksi' bernilai 'delete' merujuk pada baris 97 dibawah
				$kode_jabatan = $_GET['kode_jabatan']; // ambil nilai nama_jabatan
				$cek = mysqli_query($koneksi, "SELECT * FROM jabatan WHERE kode_jabatan='$kode_jabatan'"); // query untuk memilih entri dengan nama_jabatan yang dipilih
				if(mysqli_num_rows($cek) == 0){ // mengecek jika tidak ada entri nama_jabatan yang dipilih
					echo '<div class="alert alert-Pertanian alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; // maka tampilkan 'Data tidak ditemukan.'
				}else{ // mengecek jika terdapat entri nama_jabatan yang dipilih
					$delete = mysqli_query($koneksi, "DELETE FROM jabatan WHERE kode_jabatan='$kode_jabatan'"); // query untuk menghapus
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
						<option value="0">Filter Data jabatan</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="C01" <?php if($filter == 'Direksi'){ echo 'selected'; } ?>>Direksi</option>
						<option value="C02" <?php if($filter == 'Direktur Utama'){ echo 'selected'; } ?>>Direktur Utama</option>
						<option value="C03" <?php if($filter == 'Direktur'){ echo 'selected'; } ?>>Direktur</option>
						<option value="C04" <?php if($filter == 'Administrasi'){ echo 'selected'; } ?>>Administrasi</option>
						<option value="C05" <?php if($filter == 'Divisi Regional'){ echo 'selected'; } ?>>Divisi Regional</option>
						<option value="C06" <?php if($filter == 'Manajer'){ echo 'selected'; } ?>>Manajer</option>
					</select>
				</div>
			<a href="tambah.php" data-toggle="tooltip" data-placement="bottom" title="Tambah Data Karyawan"class="btn btn-sm btn-primary" ><span class="glyphicon glyphicon-user"> Tambah Data</a>
			<!--<button onclick="window.print()" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>
			</form> <!-- end filter -->
			<br />
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>Nama Jabatan</th>
						<th>Action</th>
					</tr>
					<?php
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT * FROM jabatan WHERE kode_jabatan='$filter' ORDER BY kode_jabatan ASC"); // query jika filter dipilih
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY kode_jabatan ASC"); // jika tidak ada filter maka tampilkan semua entri
					}
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['nama_jabatan'].'</td>
								<td>	
									<a href="edit.php?kode_jabatan='.$row['kode_jabatan'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
									<a href="data.php?aksi=delete&kode_jabatan='.$row['kode_jabatan'].'" title="Hapus Data" data-toggle="tooltip" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama_jabatan'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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