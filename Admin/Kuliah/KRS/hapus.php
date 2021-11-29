<?php
include "../../../Koneksi/koneksi.php";

$krs	= $_GET['kode_krs'];

$hapus		= "DELETE FROM tbl_krs WHERE kode_krs='$krs'";
$query		= mysqli_query($koneksi, $hapus);
if($query) 
{
	?>   
    <script>
    alert("Data Berhasil Di Hapus");
    window.location = "../../index.php?halaman=view-KRS";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>