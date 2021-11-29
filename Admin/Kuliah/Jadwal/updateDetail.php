<?php
include "../../../Koneksi/koneksi.php";

$jadwal			= $_GET['kode_jadwal'];
$day     		= $_GET['hari'];
$waktu     		= $_GET['waktu'];
$matakuliah    	= $_GET['kode_matakuliah'];
$dosen     		= $_GET['kode_dosen'];
$ruang     		= $_GET['kode_ruangan'];

$kode_jadwal	= $_POST['kode_jadwal'];
$semester   	= $_POST['semester'];
$hari     		= $_POST['hari'];
$jam     		= $_POST['jam'];
$kode_matkul    = $_POST['kode_matkul'];
$kode_dosen     = $_POST['kode_dosen'];
$ruangan     	= $_POST['ruangan'];

$query = "UPDATE tbl_detail_jadwal SET kode_jadwal='$kode_jadwal',semester='$semester', hari='$hari', waktu='$jam', kode_matakuliah='$kode_matkul', kode_dosen='$kode_dosen', kode_ruangan='$ruangan'
			 WHERE kode_jadwal='$jadwal' AND hari='$day' AND waktu='$waktu' AND kode_matakuliah='$matakuliah' AND kode_dosen='$dosen' AND kode_ruangan='$ruang'";
$update = mysqli_query($koneksi, $query);
if($update)
{
    ?>   
    <script>
    alert("Data Berhasil Di Ubah");
    window.location = "../../index.php?halaman=view-detailJadwal&kode_jadwal=<?php echo $kode_jadwal;?>";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>