<?php
include "../../../Koneksi/koneksi.php";

$krs		= $_GET['kode_krs'];
$matkul  	= $_GET['kode_matakuliah'];
$dosen  	= $_GET['dosen'];
	
$hapus		= "DELETE FROM tbl_detail_krs WHERE kode_krs='$krs' AND kode_matakuliah='$matkul' AND kode_dosen='$dosen'";
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