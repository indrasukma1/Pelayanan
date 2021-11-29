<?php
include "../koneksi.php";

$user     		= $_POST['user'];
$nama       	= $_POST['nama'];
$username       = $_POST['username'];
$password    	= $_POST['password'];
$status      	= $_POST['status'];



$query = "UPDATE tbl_user SET nama='$nama', username='$username', password='$password', status='$status' WHERE kode_user='$user'";
$update = mysqli_query($koneksi, $query);
if($update)
{
    ?>   
    <script>
    alert("Data Berhasil Di Ubah");
    window.location = "../index.php?halaman=view-user";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>