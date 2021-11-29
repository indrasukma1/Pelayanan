<?php

$kode_prodi    	  = $_GET['kode_prodi'];
$kode_kelas    	  = $_GET['kode_kelas'];
$nama_prodi   = $_GET['nama_prodi'];


include "../../../Koneksi/koneksi.php";

$prodi		 = $_POST['prodi'];
$kelas       = $_POST['kelas'];
$mahasiswa   = $_POST['mahasiswa'];

$mahasiswa2   = $_POST['mahasiswa2'];
$mahasiswa3   = $_POST['mahasiswa3'];
$mahasiswa4   = $_POST['mahasiswa4'];
$mahasiswa5   = $_POST['mahasiswa5'];

//mysqli_query($koneksi, query)
//INSERT INTO nama_tabel (field) VALUES (nilai yang akan dimasukan)
$select = "SELECT * FROM tbl_detail_kelas WHERE kode_prodi='$kode_prodi' AND kode_kelas='$kode_kelas' AND NPM='$mahasiswa'";
$querycek = mysqli_query($koneksi, $select);
$cek = mysqli_num_rows($querycek);

$select2 = "SELECT * FROM tbl_detail_kelas WHERE kode_prodi='$kode_prodi' AND kode_kelas='$kode_kelas' AND NPM='$mahasiswa2'";
$querycek2 = mysqli_query($koneksi, $select2);
$cek2 = mysqli_num_rows($querycek2);

$select3 = "SELECT * FROM tbl_detail_kelas WHERE kode_prodi='$kode_prodi' AND kode_kelas='$kode_kelas' AND NPM='$mahasiswa3'";
$querycek3 = mysqli_query($koneksi, $select3);
$cek3 = mysqli_num_rows($querycek3);

$select4 = "SELECT * FROM tbl_detail_kelas WHERE kode_prodi='$kode_prodi' AND kode_kelas='$kode_kelas' AND NPM='$mahasiswa4'";
$querycek4 = mysqli_query($koneksi, $select4);
$cek4 = mysqli_num_rows($querycek4);

$select5 = "SELECT * FROM tbl_detail_kelas WHERE kode_prodi='$kode_prodi' AND kode_kelas='$kode_kelas' AND NPM='$mahasiswa5'";
$querycek5 = mysqli_query($koneksi, $select5);
$cek5 = mysqli_num_rows($querycek5);

if($cek && $cek2 && $cek3 && $cek4 && $cek5 > 0){
	
	?>   
	<script>
	alert("Maaf Salah Satu Mahasiswa yang di Input Sudah Terdaftar");
	window.location = "../../index.php?halaman=input-detailKelas&kode_prodi=<?php echo $kode_prodi; ?>&kode_kelas=<?php echo $kode_kelas; ?>&nama_prodi=<?php echo $nama_prodi; ?>";
	</script>
	<?php
	
}else{
	$query = "INSERT INTO tbl_detail_kelas (kode_prodi, kode_kelas, NPM) 
			VALUES ('$prodi','$kelas','$mahasiswa'),('$prodi','$kelas','$mahasiswa2'),('$prodi','$kelas','$mahasiswa3'),
					('$prodi','$kelas','$mahasiswa4'),('$prodi','$kelas','$mahasiswa5')";
	$simpan = mysqli_query($koneksi, $query);
	if($simpan)
	{
		?>   
		<script>
		alert("Data Berhasil Di simpan");
		window.location = "../../index.php?halaman=view-kelas&kode_prodi=<?php echo $get_prodi; ?>&kode_kelas=<?php echo $get_kelas; ?>&nama_prodi=<?php echo $get_nama_prodi; ?>";
		</script>
		<?php
	}
	else{
		echo "Data Error".mysqli_error();
	}
}

?>