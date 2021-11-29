<?php 	
	include 'Koneksi/koneksi.php';
	session_start();
	$username = mysqli_escape_string($koneksi,$_POST['username']);
	$password = mysqli_escape_string($koneksi,$_POST['password']);
	$status	  = $_POST['status'];

	if($status=="mahasiswa"){
		$loginmhs = mysqli_query($koneksi,"SELECT * FROM tbl_mahasiswa WHERE npm='$username' AND password='$password'");
		$cekmhs = mysqli_num_rows($loginmhs);
		if($cekmhs > 0){
			
			$datamhs = mysqli_fetch_array($loginmhs);
			
			$_SESSION['username']	= $username;
			$_SESSION['status'] 	= "login";
			$_SESSION['nama'] 		= $datamhs['Nama'];
			$_SESSION['level']		= "Mahasiswa";
			header("location:Mahasiswa/index.php");
		}else{
			header("location:index.php?pesan=bukanMhs");
		}
	}elseif($status=="admin"){
		$loginadmin = mysqli_query($koneksi,"SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'");
		$cekadmin = mysqli_num_rows($loginadmin);
		if($cekadmin > 0){
			
			$dataadmin = mysqli_fetch_array($loginadmin);
			
			$_SESSION['username']	= $username;
			$_SESSION['status'] 	= "login";
			$_SESSION['nama'] 		= $dataadmin['nama_admin'];
			$_SESSION['level'] 		= "Admin";
			header("location:Admin/index.php");
		}else{
			header("location:index.php?pesan=bukanAdmin");
		}
	}elseif($status=="dosen"){
		$logindosen = mysqli_query($koneksi,"SELECT * FROM tbl_dosen WHERE kode_dosen='$username' AND password='$password'");
		$cekdosen = mysqli_num_rows($logindosen);
		if($cekdosen > 0){
			
			$datadosen = mysqli_fetch_array($logindosen);
			
			$_SESSION['username']	= $username;
			$_SESSION['status'] 	= "login";
			$_SESSION['nama'] 		= $datadosen['nama_dosen'];
			$_SESSION['level'] 		= "Dosen";
			header("location:Dosen/index.php");
		}else{
			header("location:index.php?pesan=bukanDosen");
		}
	}else{
		echo "Data Error".mysqli_error();
	}
?>