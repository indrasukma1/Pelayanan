<?php
	include "../Koneksi/koneksi.php";
	$username = $_GET['username'];
	$kolom = $_POST['kolom'];
	$nilai = $_POST['nilai'];
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Jadwal  ".$nilai.".xls");
?>
<center><h1 style="line-height:120%;margin:unset">DAFTAR JADWAL
<h4 style="margin:unset">Institut Agama Islam Darussalam</h4></h1></center>
<br>
<table border='1' cellspacing="0" cellpadding="10" align='center'>
    <thead>
        <tr>
            <th class="text-center" style="vertical-align:middle">No</th>
			<th class="text-center" style="vertical-align:middle">Hari</th>
			<th class="text-center" style="vertical-align:middle">Waktu</th>
			<th class="text-center" style="vertical-align:middle">Matakuliah</th>
			<th class="text-center" style="vertical-align:middle">Dosen Pengampu</th>
			<th class="text-center" style="vertical-align:middle">Ruangan</th>
        </tr>
    </thead>
    <tbody>
									<?php
										$select = "SELECT tbl_user.username, tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, tbl_jadwal.kode_jadwal, 
													tbl_detail_jadwal.hari, waktu, tbl_matakuliah.kode_matakuliah, tbl_matakuliah.matakuliah, 
													tbl_dosen.kode_dosen, tbl_dosen.nama_dosen, kode_ruangan FROM tbl_user 
													INNER JOIN tbl_detail_kelas ON tbl_user.username=tbl_detail_kelas.NPM 
													INNER JOIN tbl_jadwal ON tbl_detail_kelas.kode_kelas=tbl_jadwal.kode_kelas 
													INNER JOIN tbl_detail_jadwal ON tbl_jadwal.kode_jadwal=tbl_detail_jadwal.kode_jadwal 
													INNER JOIN tbl_matakuliah ON tbl_detail_jadwal.kode_matakuliah=tbl_matakuliah.kode_matakuliah 
													INNER JOIN tbl_dosen ON tbl_detail_jadwal.kode_dosen=tbl_dosen.kode_dosen
													WHERE username='$username' AND $kolom='$nilai'";
										$query = mysqli_query($koneksi, $select);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
                                    <tr>
                                        <td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['hari']; ?></td>
										<td class="text-center"><?php echo $data['waktu']; ?></td>
										<td class="text-center"><?php echo $data['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data['nama_dosen']; ?></td>
										<td class="text-center"><?php echo $data['kode_ruangan']; ?></td>
                                    </tr>
									<?php 
										$no++; 
										}
									?>
                                </tbody>
</table>