<?php
include "../../Koneksi/koneksi.php";

$kode_dosen			= $_GET['kode_dosen'];
$npm     			= $_POST['npm'];
$nama     			= $_POST['nama'];
$nama_matkul       	= $_POST['matakuliah'];
$sks       			= $_POST['sks'];
$matakuliah       	= $_POST['kode_matakuliah'];
$semester       	= $_POST['semester'];
$tahun          	= $_POST['tahun'];
$kehadiran    		= $_POST['kehadiran'];
$tgs_terstruktur	= $_POST['tgs_terstruktur'];
$tgs_mandiri   		= $_POST['tgs_mandiri'];
$uts  				= $_POST['uts'];
$uas      			= $_POST['uas'];
$jumlah				= $kehadiran + $tgs_terstruktur + $tgs_mandiri + $uts + $uas;
$nilai_akhir		= $jumlah/5;



$query = "UPDATE tbl_nilai SET semester='$semester', tahun_akademik='$tahun', nilai_kehadiran='$kehadiran', tugas_terstruktur='$tgs_terstruktur', tugas_mandiri='$tgs_mandiri', UTS='$uts', 
			UAS='$uas', nilai_akhir='$nilai_akhir' WHERE NPM='$npm' AND kode_matakuliah='$matakuliah' AND kode_dosen='$kode_dosen' AND semester='$semester' AND tahun_akademik='$tahun'";
$update = mysqli_query($koneksi, $query);
if($update)
{
    ?>   
    <script>
    alert("Data Berhasil Di Ubah");
    window.location = "../index.php?halaman=view-detailNilai&matkul=<?php echo $nama_matkul; ?>&semester=<?php echo $semester; ?>&tahun_akademik=<?php echo $tahun; ?>&kode_matkul=<?php echo $matakuliah; ?>&npm=<?php echo $npm; ?>&mhs=<?php echo $nama; ?>&sks=<?php echo $sks;?>";
    </script>
    <?php
}
else{
    echo mysqli_error($koneksi);
}

?>