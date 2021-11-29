<?php
include "../../../Koneksi/koneksi.php";

$krs1		= $_GET['krs1'];
$matkul1	= $_GET['matkul1'];
$dosen1		= $_GET['dosen1'];

$krs	   	= $_POST['krs'];
$matkul    	= $_POST['matkul'];
$dosen    	= $_POST['dosen'];
$sks    	= $_POST['sks'];

$query = "UPDATE tbl_detail_krs SET kode_matakuliah='$matkul', kode_dosen='$dosen', SKS='$sks' WHERE kode_krs='$krs1' AND kode_matakuliah='$matkul1' AND kode_dosen='$dosen1'";
$update = mysqli_query($koneksi, $query);
if($update)
{
    ?>   
    <script>
    alert("Data Berhasil Di Ubah");
    window.location = "../../index.php?halaman=view-KRS";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>