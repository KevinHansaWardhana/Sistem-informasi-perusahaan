<!DOCTYPE html>
<?php 
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>PT. Mencari Cinta Abadi</title>
	<link rel="shortcut icon" href="img/logo_ilmututorial_32x32.jpg" type="image/x-icon" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
    <link href="style.css" rel="stylesheet">
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	</script>

<?php
session_start();

if (!isset($_SESSION["username"])) {
	echo "<center>Anda harus login dulu <br><a href='login.php'>Klik disini</a></center>";
	exit;
}


$username=$_SESSION["username"];
$nama=$_SESSION["nama"];
?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
	<!-- Start navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  
		</div>
		
		<div class="collapse navbar-collapse" id="myNavbar">
		 <!-- <form name="cari" method="post" action="cari.php" role="search" class="navbar-form navbar-left">
				<div class="form-group">
					<input type="text" name="carinim" placeholder="Cari " class="form-control">
				</div>
				<button type="submit" name="submit" id="submit" value="search" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Cari Data Mahasiswa">Cari</button>
			</form>
			-->


		  <ul class="nav navbar-nav">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li><a href="karyawan/data.php" data-toggle="tooltip" data-placement="bottom" title="Lihat Data Karyawan"><span class="glyphicon glyphicon-list"></span>Karyawan</a></li>
			<li><a href="departemen/data.php" data-toggle="tooltip" data-placement="bottom" title="Lihat Data Departemen"><span class="glyphicon glyphicon-list"></span>Departemen</a></li>
			<li><a href="jabatan/data.php" data-toggle="tooltip" data-placement="bottom" title="Lihat Data Jabatan"><span class="glyphicon glyphicon-list"></span>Jabatan</a></li>
			<li><a href="payroll/datagaji.php" data-toggle="tooltip" data-placement="bottom" title="Lihat Data Gaji"><span class="glyphicon glyphicon-list"></span>Gaji</a></li>
			<ul class="nav navbar-nav navbar-right">
		  			 	<li><a href="AboutUs.php"><span class="glyphicon glyphicon-star"></span>About Us</a></li>
      					<<li><a href="#"><span class="glyphicon glyphicon-user"></span>Selamat datang <?php echo $nama; ?></a></li>
    					<li><a href="logout.php" class="btn btn-warning" role="button">Logout</a></li>
    				</ul>
		 </ul>
		 				
		</div>
	  </div>
	</nav>
	<!-- End navbar -->