<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Karyawan &raquo; Profile</h2>
			<hr />
			
			<?php
			$id_karyawan = $_GET['id_karyawan']; // mengambil data id_karyawan dari id_karyawan yang terpilih
			
			$sql = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id_karyawan='$id_karyawan'"); // query memilih entri id_karyawan pada database
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){ // jika tombol 'Hapus Data' pada baris 87 ditekan
				$delete = mysqli_query($koneksi, "DELETE FROM Karyawan WHERE id_karyawan='$id_karyawan'"); // query delete entri dengan id_karyawan terpilih
				if($delete){ // jika query delete berhasil dieksekusi
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
				}else{ // jika query delete gagal dieksekusi
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
				}
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data Karyawan -->
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">ID karyawan</th>
					<td><?php echo $row['id_karyawan']; ?></td>
				</tr>
				<tr>
					<th>Kode Departemen</th>
					<td><?php echo $row['kode_departemen']; ?></td>
				</tr>
				<tr>
					<th>Kode Jabatan</th>
					<td><?php echo $row['kode_jabatan']; ?></td>
				</tr>
				<tr>
					<th>Nama Karyawan</th>
					<td><?php echo $row['nama_karyawan']; ?></td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td><?php echo $row['alamat']; ?></td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td><?php echo $row['jenkel']; ?></td>
				</tr>
				<tr>
					<th>Tempat & Tanggal Lahir</th>
					<td><?php echo $row['tgl_lahir'].' & '.$row['tgl_lahir']; ?></td>
				</tr>
				<tr>
					<th>Pendidikan</th>
					<td><?php echo $row['pendidikan']; ?></td>
				</tr>
				<tr>
					<th>Agama</th>
					<td><?php echo $row['agama']; ?></td>
				</tr>
				<tr>
					<th>Tanggal Masuk</th>
					<td><?php echo $row['tgl_masuk']; ?></td>
				</tr>
				<tr>
					<th>No Telepon</th>
					<td><?php echo $row['no_telp']; ?></td>
				</tr>
			</table>
			
			<a href="data.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
			<a href="edit.php?id_karyawan=<?php echo $row['id_karyawan']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="profile.php?aksi=delete&id_karyawan=<?php echo $row['id_karyawan']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan mengahapus data <?php echo $row['nama']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		<button onclick="window.print()" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>
			
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("../footer.php"); // memanggil file footer.php
?>