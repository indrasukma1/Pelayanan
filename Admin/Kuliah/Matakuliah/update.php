<?php
include "../../../Koneksi/koneksi.php";

$kode_matkul    = $_POST['kode_matkul'];
$matkul       	= $_POST['matkul'];


$query = "UPDATE tbl_matakuliah SET matakuliah='$matkul' WHERE kode_matakuliah='$kode_matkul'";
$update = mysqli_query($koneksi, $query);
if($update)
{
    ?>   
    <script>
    alert("Data Berhasil Di Ubah");
    window.location = "../../index.php?halaman=view-matakuliah";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>