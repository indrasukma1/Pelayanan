<?php
include "../../../Koneksi/koneksi.php";

$kode_krs	   	= $_POST['kode_krs'];
$kode_prodi    	= $_POST['prodi'];
$kode_kelas    	= $_POST['kelas'];
$tahun    		= $_POST['tahun_akademik'];
$semester     	= $_POST['semester'];

$query = "UPDATE tbl_krs SET kode_prodi='$kode_prodi', kode_kelas='$kode_kelas', tahun_akademik='$tahun', semester='$semester' WHERE kode_krs='$kode_krs'";
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