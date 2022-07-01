<?php
session_start();

include "koneksi.php";

$username = $_POST["username"];
$p = ($_POST["password"]);

$sql = "select * from admin where username='".$username."' and password='".$p."' limit 1";
$hasil = mysqli_query ($koneksi,$sql);
//$jumlah = mysqli_num_rows($hasil);


	if ($hasil>0) {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["id_user"]=$row["id_user"];
		$_SESSION["username"]=$row["username"];
		$_SESSION["nama"]=$row["nama"];
	

		header("Location:index.php");
		
	}else {
		echo "Username atau password salah <br><a href='login.php'>Kembali</a>";
	}
?>