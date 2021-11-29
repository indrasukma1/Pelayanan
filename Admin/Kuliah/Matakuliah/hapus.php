<?php
include "../../../Koneksi/koneksi.php";

$kode_matkul	= $_GET['kode_matkul'];

$hapus		= "DELETE FROM tbl_matakuliah WHERE kode_matakuliah='$kode_matkul'";
$query		= mysqli_query($koneksi, $hapus);
if($query) 
{
	?>   
    <script>
    alert("Data Berhasil Di Hapus");
    window.location = "../../index.php?halaman=view-matakuliah";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>