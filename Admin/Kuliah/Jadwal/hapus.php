<?php
include "../../koneksi.php";

$kode_jadwal	= $_GET['kode_jadwal'];

$hapus		= "DELETE FROM tbl_jadwal WHERE kode_jadwal='$kode_jadwal'";
$query		= mysqli_query($koneksi, $hapus);
if($query) 
{
	?>   
    <script>
    alert("Data Berhasil Di Hapus");
    window.location = "../../index.php?halaman=view-jadwal";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>