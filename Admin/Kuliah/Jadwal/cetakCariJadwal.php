<?php
	include "../../../Koneksi/koneksi.php";
	$kode_jadwal = $_GET['kode_jadwal'];
	$kolom = $_POST['kolom'];
	$nilai = $_POST['nilai'];
?>
<center><h1 style="line-height:120%;margin:unset">DATA JADWAL
<h4 style="margin:unset">Institut Agama Islam Darussalam</h4></h1></center>
<br><br><br>
<table>
	<tr>
		<td>Kode Jadwal</td>
		<td>: <?php echo "<b>".$kode_jadwal."</b>"; ?></td>
	</tr>
	<tr>
		<td style="text-transform : capitalize"><?= $kolom;?></td>
		<td>: <?php echo "<b>".$nilai."</b>"; ?></td>
	</tr>
</table><br>

<table border="1" cellspacing="0" cellpadding="10" align="center" width="100%">
    <thead>
        <tr>
            <th class="text-center" style="vertical-align:middle">No</th>
			<th class="text-center" style="vertical-align:middle">Semester</th>
			<th class="text-center" style="vertical-align:middle">Hari</th>
			<th class="text-center" style="vertical-align:middle">Waktu</th>
			<th class="text-center" style="vertical-align:middle">Matakuliah</th>
			<th class="text-center" style="vertical-align:middle">Dosen Pengampu</th>
			<th class="text-center" style="vertical-align:middle">Ruangan</th>
        </tr>
    </thead>
    <tbody>
									<?php
										$select = "SELECT semester, tbl_matakuliah.kode_matakuliah, matakuliah, 
													tbl_dosen.kode_dosen, nama_dosen, kode_ruangan, waktu, hari FROM tbl_detail_jadwal
													INNER JOIN tbl_matakuliah
													ON tbl_detail_jadwal.kode_matakuliah=tbl_matakuliah.kode_matakuliah
													INNER JOIN tbl_dosen
													ON tbl_detail_jadwal.kode_dosen=tbl_dosen.kode_dosen
													WHERE kode_jadwal='$kode_jadwal' AND $kolom='$nilai'";
										$query = mysqli_query($koneksi, $select);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['semester']; ?></td>
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
<script>
	window.print();
</script>