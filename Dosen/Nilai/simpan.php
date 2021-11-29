<?php
include "../../Koneksi/koneksi.php";

$kode_dosen			= $_GET['kode_dosen'];
$npm     			= $_POST['npm'];
$nama     			= $_POST['nama'];
$matakuliah       	= $_POST['kode_matakuliah'];
$nama_matkul       	= $_POST['matakuliah'];
$sks       			= $_POST['sks'];
$semester       	= $_POST['semester'];
$tahun       	    = $_POST['tahun'];
$kehadiran    		= $_POST['kehadiran'];
$tgs_terstruktur	= $_POST['tgs_terstruktur'];
$tgs_mandiri   		= $_POST['tgs_mandiri'];
$uts  				= $_POST['uts'];
$uas      			= $_POST['uas'];
$jumlah				= $kehadiran + $tgs_terstruktur + $tgs_mandiri + $uts + (2 * $uas);
$nilai_akhir		= $jumlah/6;

$query = "INSERT INTO tbl_nilai (NPM, kode_matakuliah, SKS, kode_dosen, semester, tahun_akademik, nilai_kehadiran, tugas_terstruktur, tugas_mandiri, UTS, UAS, nilai_akhir) 
		VALUES ('$npm','$matakuliah','$sks','$kode_dosen','$semester','$tahun','$kehadiran','$tgs_terstruktur','$tgs_mandiri','$uts','$uas','$nilai_akhir')";
$simpan = mysqli_query($koneksi, $query);
if($simpan)
{
    ?>   
    <script>
    alert("Data Berhasil Di simpan");
    window.location = "../index.php?halaman=view-detailNilai&matkul=<?php echo $nama_matkul; ?>&semester=<?php echo $semester; ?>&tahun_akademik=<?php echo $tahun; ?>&kode_matkul=<?php echo $matakuliah; ?>&npm=<?php echo $npm; ?>&mhs=<?php echo $nama; ?>&sks=<?php echo $sks;?>";
    </script>
    <?php
}
else{
    echo mysqli_error($koneksi);
}

?>