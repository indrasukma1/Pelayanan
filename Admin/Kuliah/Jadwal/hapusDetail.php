<?php
include "../../../Koneksi/koneksi.php";

$kode_jadwal	= $_GET['kode_jadwal'];
$hari     		= $_GET['hari'];
$jam     		= $_GET['waktu'];
$kode_matkul    = $_GET['kode_matakuliah'];
$kode_dosen     = $_GET['kode_dosen'];
$ruangan     	= $_GET['kode_ruangan'];

$hapus		= "DELETE FROM tbl_detail_jadwal WHERE kode_jadwal='$kode_jadwal' AND hari='$hari' AND waktu='$jam' AND kode_matakuliah='$kode_matkul' AND kode_dosen='$kode_dosen' AND kode_ruangan='$ruangan'";
$query		= mysqli_query($koneksi, $hapus);
if($query) 
{
	?>   
    <script>
    alert("Data Berhasil Di Hapus");
    window.location = "../../index.php?halaman=view-detailJadwal&kode_jadwal=<?php echo $kode_jadwal;?>";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>