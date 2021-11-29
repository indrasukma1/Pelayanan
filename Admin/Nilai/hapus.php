<?php
include "../koneksi.php";

$npm	= $_GET['npm'];

$hapus		= "DELETE FROM tbl_mahasiswa WHERE NPM='$npm'";
$query		= mysqli_query($koneksi, $hapus);
if($query) 
{
	?>   
    <script>
    alert("Data Berhasil Di Hapus");
    window.location = "../index.php?halaman=view-mahasiswa";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>