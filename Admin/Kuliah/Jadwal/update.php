<?php
include "../../../Koneksi/koneksi.php";

$kode_jadwal	= $_POST['kode_jadwal'];
$prodi    		= $_POST['prodi'];
$kelas    		= $_POST['kelas'];
$kode_matkul    = $_POST['kode_matkul'];
$kode_dosen     = $_POST['kode_dosen'];
$ruangan     	= $_POST['ruangan'];
$jam     		= $_POST['jam'];
$hari     		= $_POST['hari'];

$query = "UPDATE tbl_jadwal SET kode_prodi='$prodi', kode_kelas='$kelas', kode_matakuliah='$kode_matkul', kode_dosen='$kode_dosen', kode_ruangan='$ruangan',
			jam_ke='$jam', hari='$hari' WHERE kode_jadwal='$kode_jadwal'";
$update = mysqli_query($koneksi, $query);
if($update)
{
    ?>   
    <script>
    alert("Data Berhasil Di Ubah");
    window.location = "../../index.php?halaman=view-jadwal";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>