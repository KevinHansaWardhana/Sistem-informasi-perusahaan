<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<!-- Start container -->
	<div class="container">
		<div class="content">
		<h1><center>Selamat Datang</center></h1>

		<center>	<div class="jumbotron">
						<center><img  src="images/Header.png"></center>
				<a href="karyawan/data.php" data-toggle="tooltip" title="Lihat Data Karyawan" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Lihat Data Karyawan</a>
				<a href="departemen/data.php" data-toggle="tooltip" title="Lihat Data Departemen" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Lihat Data Departemen</a>
				<a href="jabatan/data.php" data-toggle="tooltip" title="Lihat Data Jabatan" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Lihat Data Jabatan</a>
				<a href="payroll/datagaji.php" data-toggle="tooltip" title="Lihat Data Gaji" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Lihat Data Gaji</a>
			</div><center> <!-- /.jumbotron -->
		
		</div> <!-- /.content -->
	</div>
	<!-- End container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>