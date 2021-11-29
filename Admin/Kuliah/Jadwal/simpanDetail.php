<?php
include "../../../Koneksi/koneksi.php";

$kode_jadwal	= $_POST['kode_jadwal'];
$semester     	= $_POST['semester'];
$hari     		= $_POST['hari'];
$jam     		= $_POST['jam'];
$kode_matkul    = $_POST['kode_matkul'];
$kode_dosen     = $_POST['kode_dosen'];
$ruangan     	= $_POST['ruangan'];


//mysqli_query($koneksi, query)
//INSERT INTO nama_tabel (field) VALUES (nilai yang akan dimasukan)

$query = "INSERT INTO tbl_detail_jadwal (kode_jadwal, semester, hari, waktu, kode_matakuliah, kode_dosen, kode_ruangan) 
		VALUES ('$kode_jadwal','$semester','$hari','$jam','$kode_matkul','$kode_dosen','$ruangan')";
$simpan = mysqli_query($koneksi, $query);
if($simpan)
{
    ?>   
    <script>
    alert("Data Berhasil Di simpan");
    window.location = "../../index.php?halaman=input-detailJadwal";
    </script>
    <?php
}
else{
    echo mysqli_error($koneksi);
}

?>