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



$query = "UPDATE tbl_nilai SET semester='$semester', nilai_kehadiran='$kehadiran', tugas_terstruktur='$tgs_terstruktur', tugas_mandiri='$tgs_mandiri', UTS='$uts', 
			UAS='$uas', nilai_akhir='$nilai_akhir' WHERE NPM='$npm' AND kode_matakuliah='$matakuliah' AND kode_dosen='$kode_dosen'";
$update = mysqli_query($koneksi, $query);
if($update)
{
    ?>   
    <script>
    alert("Data Berhasil Di Ubah");
    window.location = "../index.php?halaman=view-nilai";
    </script>
    <?php
}
else{
    echo "Data Error".mysqli_error();
}

?>