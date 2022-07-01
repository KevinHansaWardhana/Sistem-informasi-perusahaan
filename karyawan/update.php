<?php
$conn =mysqli_connect('localhost', 'root', '','perusahaan');
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
$submit=$_POST['submit'];
$update="UPDATE karyawan set id_karyawan='$id_karyawan', kode_departemen='$kode_departemen', kode_jabatan='$kode_jabatan', nama_karyawan='$nama_karyawan', alamat='$alamat', jenkel='$jenkel', tgl_lahir='$tgl_lahir', pendidikan='$pendidikan', agama='$agama', tgl_masuk='$tgl_masuk', no_telp='$no_telp' WHERE id_karyawan='$id_karyawan'";

mysqli_query($conn,$update);
echo "<script>alert('data berhasil di update');document.location.href='data.php';</script>";

?> 