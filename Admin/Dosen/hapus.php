<?php
include "../../Koneksi/koneksi.php";

$kode_dosen	= $_GET['kode_dosen'];

$hapus		= "DELETE FROM tbl_dosen WHERE kode_dosen='$kode_dosen'";
$query		= mysqli_query($koneksi, $hapus);
if($query) 
{
	?>   
    <script>
    alert("Data Berhasil Di Hapus");
    window.location = "../index.php?halaman=view-dosen";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>