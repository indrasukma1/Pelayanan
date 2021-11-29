<?php
include "../../Koneksi/koneksi.php";

$kode_dosen		= $_POST['kode_dosen'];
$password		= $_POST['password'];
$nama    		= $_POST['nama'];
$jenis_kelamin  = $_POST['jenis_kelamin'];


$query = "UPDATE tbl_dosen SET password='$password', nama_dosen='$nama', jenis_kelamin='$jenis_kelamin' WHERE kode_dosen='$kode_dosen'";
$update = mysqli_query($koneksi, $query);
if($update)
{
    ?>   
    <script>
    alert("Data Berhasil Di Ubah");
    window.location = "../index.php?halaman=view-dosen";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>