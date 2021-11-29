<?php
include "../../../Koneksi/koneksi.php";

$kode_jadwal	= $_POST['kode_jadwal'];
$prodi    		= $_POST['prodi'];
$kelas    		= $_POST['kelas'];
$kode_matkul    = $_POST['kode_matkul'];
$kode_dosen     = $_POST['kode_dosen'];
$ruangan     	= $_POST['ruangan'];
$jam     		= $_POST['jam'];
$hari     		= $_POST['hari'];

//mysqli_query($koneksi, query)
//INSERT INTO nama_tabel (field) VALUES (nilai yang akan dimasukan)

$query = "INSERT INTO tbl_jadwal (kode_jadwal, kode_prodi, kode_kelas, kode_matakuliah, kode_dosen, kode_ruangan, jam_ke, hari) 
		VALUES ('$kode_jadwal','$prodi','$kelas','$kode_matkul','$kode_dosen','$ruangan','$jam','$hari')";
$simpan = mysqli_query($koneksi, $query);
if($simpan)
{
    ?>   
    <script>
    alert("Data Berhasil Di simpan");
    window.location = "../../index.php?halaman=input-jadwal";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>