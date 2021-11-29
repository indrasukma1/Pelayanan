<?php

	$kode_prodi    	  = $_GET['kode_prodi'];
	$kode_kelas    	  = $_GET['kode_kelas'];
	$nama_prodi    	  = $_GET['nama_prodi'];

include "../../../Koneksi/koneksi.php";

$prodi		 = $_POST['prodi'];
$kelas       = $_POST['kelas'];
$mahasiswa   = $_POST['mahasiswa'];

//mysqli_query($koneksi, query)
//INSERT INTO nama_tabel (field) VALUES (nilai yang akan dimasukan)
$select = "SELECT * FROM tbl_detail_kelas WHERE kode_prodi='$kode_prodi' AND kode_kelas='$kode_kelas' AND NPM='$mahasiswa'";
$querycek = mysqli_query($koneksi, $select);
$cek = mysqli_num_rows($querycek);

if($cek > 0){
	
	?>   
	<script>
	alert("Maaf Mahasiswa Sudah Terdaftar");
	window.location = "../../index.php?halaman=input-detailKelas&kode_prodi=<?php echo $kode_prodi; ?>&kode_kelas=<?php echo $kode_kelas; ?>&nama_prodi=<?php echo $nama_prodi; ?>";
	</script>
	<?php
	
}else{
	$query = "INSERT INTO tbl_detail_kelas (kode_prodi, kode_kelas, NPM) 
			VALUES ('$prodi','$kelas','$mahasiswa')";
	$simpan = mysqli_query($koneksi, $query);
	if($simpan)
	{
		?>   
		<script>
		alert("Data Berhasil Di simpan");
		window.location = "../../index.php?halaman=view-kelas&kode_prodi=<?php echo $kode_prodi; ?>&kode_kelas=<?php echo $kode_kelas; ?>&nama_prodi=<?php echo $nama_prodi; ?>";
		</script>
		<?php
	}
	else{
		echo "Data Error".mysqli_error();
	}
}
?>