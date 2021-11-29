<?php
include "../../../Koneksi/koneksi.php";

$kode_prodi    	  = $_GET['kode_prodi'];
$kode_kelas    	  = $_GET['kode_kelas'];
$nama_prodi    	  = $_GET['nama_prodi'];
$npm    	  	  = $_GET['mhs'];

$hapus		= "DELETE FROM tbl_detail_kelas WHERE kode_prodi='$kode_prodi' AND kode_kelas='$kode_kelas' AND NPM='$npm'";
$query		= mysqli_query($koneksi, $hapus);
if($query) 
{
	?>   
    <script>
    alert("Data Berhasil Di Hapus");
    window.location = "../../index.php?halaman=view-detailKelas&kode_prodi=<?php echo $kode_prodi; ?>&nama_prodi=<?php echo $nama_prodi; ?>&kode_kelas=<?php echo $kode_kelas; ?>";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>