<?php
include "../../Koneksi/koneksi.php";

$npm     		= $_POST['npm'];
$password       = $_POST['password'];
$nama       	= $_POST['nama'];
$prodi    		= $_POST['prodi'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$tglLahir      	= $_POST['tglLahir'];
$alamat      	= $_POST['alamat'];

$query = "UPDATE tbl_mahasiswa SET password='$password', Nama='$nama', prodi='$prodi', jenis_kelamin='$jenis_kelamin', 
			tempatTglLahir='$tglLahir', alamat='$alamat' WHERE NPM='$npm'";
$update = mysqli_query($koneksi, $query);
if($update)
{
    ?>   
    <script>
    alert("Data Berhasil Di Ubah");
    window.location = "../index.php?halaman=view-mahasiswa";
    </script>
    <?php
}
else{
    echo mysqli_error($koneksi);
}

?>