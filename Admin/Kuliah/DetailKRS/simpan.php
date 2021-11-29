<?php
include "../../../Koneksi/koneksi.php";

$krs	   	= $_POST['krs'];
$matkul    	= $_POST['matkul'];
$dosen    	= $_POST['dosen'];
$sks    	= $_POST['sks'];


//mysqli_query($koneksi, query)
//INSERT INTO nama_tabel (field) VALUES (nilai yang akan dimasukan)

$query = "INSERT INTO tbl_detail_krs (kode_krs, kode_matakuliah, SKS, kode_dosen) 
		VALUES ('$krs','$matkul','$sks','$dosen')";
$simpan = mysqli_query($koneksi, $query);
if($simpan)
{
    ?>   
    <script>
    alert("Data Berhasil Di simpan");
    window.location = "../../index.php?halaman=input-detailKRS";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>