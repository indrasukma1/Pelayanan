<?php
include "../../../Koneksi/koneksi.php";

$prodi		 = $_POST['prodi'];
$kelas       = $_POST['kelas'];

//mysqli_query($koneksi, query)
//INSERT INTO nama_tabel (field) VALUES (nilai yang akan dimasukan)

$query = "INSERT INTO tbl_kelas (kode_prodi, kode_kelas) 
		VALUES ('$prodi','$kelas')";
$simpan = mysqli_query($koneksi, $query);
if($simpan)
{
    ?>   
    <script>
    alert("Data Berhasil Di simpan");
    window.location = "../../index.php?halaman=input-kelas&kode_prodi=$prodi";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>