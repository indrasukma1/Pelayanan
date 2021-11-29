<?php
include "../../../Koneksi/koneksi.php";

$krs	   	= $_POST['krs'];
$matkul    	= $_POST['matkul'];
$dosen    	= $_POST['dosen'];
$sks    	= $_POST['sks'];

$matkul2    = $_POST['matkul2'];
$dosen2    	= $_POST['dosen2'];
$sks2    	= $_POST['sks2'];

$matkul3    = $_POST['matkul3'];
$dosen3    	= $_POST['dosen3'];
$sks3    	= $_POST['sks3'];

$matkul4    = $_POST['matkul4'];
$dosen4    	= $_POST['dosen4'];
$sks4    	= $_POST['sks4'];

$matkul5    = $_POST['matkul5'];
$dosen5    	= $_POST['dosen5'];
$sks5    	= $_POST['sks5'];

//mysqli_query($koneksi, query)
//INSERT INTO nama_tabel (field) VALUES (nilai yang akan dimasukan)

$query = "INSERT INTO tbl_detail_krs (kode_krs, kode_matakuliah, SKS, kode_dosen) 
		VALUES ('$krs','$matkul','$sks','$dosen'),('$krs','$matkul2','$sks2','$dosen2'),
				('$krs','$matkul3','$sks3','$dosen3'),('$krs','$matkul4','$sks4','$dosen4'),
				('$krs','$matkul5','$sks5','$dosen5')";
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