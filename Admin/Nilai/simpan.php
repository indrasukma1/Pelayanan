<?php
include "../koneksi.php";

$kode_dosen			= $_GET['kode_dosen'];
$npm     			= $_POST['npm'];
$matakuliah       	= $_POST['kode_matakuliah'];
$semester       	= $_POST['semester'];
$kehadiran    		= $_POST['kehadiran'];
$tgs_terstruktur	= $_POST['tgs_terstruktur'];
$tgs_mandiri   		= $_POST['tgs_mandiri'];
$uts  				= $_POST['uts'];
$uas      			= $_POST['uas'];
$jumlah				= $kehadiran + $tgs_terstruktur + $tgs_mandiri + $uts + $uas;
$nilai_akhir		= $jumlah/5;

//mysqli_query($koneksi, query)
//INSERT INTO nama_tabel (field) VALUES (nilai yang akan dimasukan)

$query = "INSERT INTO tbl_nilai (NPM, kode_matakuliah, kode_dosen, semester, nilai_kehadiran, tugas_terstruktur, tugas_mandiri, UTS, UAS, nilai_akhir) 
		VALUES ('$npm','$matakuliah','$kode_dosen','$semester','$kehadiran','$tgs_terstruktur','$tgs_mandiri','$uts','$uas','$nilai_akhir')";
$simpan = mysqli_query($koneksi, $query);
if($simpan)
{
    ?>   
    <script>
    alert("Data Berhasil Di simpan");
    window.location = "../index.php?halaman=view-nilai";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>