<?php
	include "../Koneksi/koneksi.php";
	$username = $_GET['username'];
?>
<center><h2 style="line-height:120%;margin:unset">DATA JADWAL
<h5 style="margin:unset">Fakultas Tarbiyah Institut Agama Islam Darussalam</h5></h2></center>
<br><br><br>
							<?php
										$selectsmt = "SELECT tbl_mahasiswa.NPM, tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, tbl_jadwal.kode_jadwal, 
													tbl_detail_jadwal.hari, waktu, max(tbl_detail_jadwal.semester) as smtterbesar, tbl_matakuliah.kode_matakuliah, 
													tbl_matakuliah.matakuliah, tbl_dosen.kode_dosen, tbl_dosen.nama_dosen, kode_ruangan FROM tbl_mahasiswa 
													INNER JOIN tbl_detail_kelas ON tbl_mahasiswa.NPM=tbl_detail_kelas.NPM 
													INNER JOIN tbl_jadwal ON tbl_detail_kelas.kode_kelas=tbl_jadwal.kode_kelas 
													INNER JOIN tbl_detail_jadwal ON tbl_jadwal.kode_jadwal=tbl_detail_jadwal.kode_jadwal 
													INNER JOIN tbl_matakuliah ON tbl_detail_jadwal.kode_matakuliah=tbl_matakuliah.kode_matakuliah 
													INNER JOIN tbl_dosen ON tbl_detail_jadwal.kode_dosen=tbl_dosen.kode_dosen
													WHERE tbl_mahasiswa.NPM='$username'";
										$querysmt = mysqli_query($koneksi, $selectsmt);
										$datasmt = mysqli_fetch_array($querysmt);
										$semester = $datasmt['smtterbesar'];
										
										$select1 = "SELECT tbl_mahasiswa.NPM, tbl_mahasiswa.Nama, tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, 
													tbl_jadwal.kode_jadwal, tbl_detail_jadwal.hari, waktu, tbl_detail_jadwal.semester, 
													tbl_matakuliah.kode_matakuliah, tbl_matakuliah.matakuliah, tbl_dosen.kode_dosen, 
													tbl_dosen.nama_dosen, kode_ruangan FROM tbl_mahasiswa 
													INNER JOIN tbl_detail_kelas ON tbl_mahasiswa.NPM=tbl_detail_kelas.NPM 
													INNER JOIN tbl_jadwal ON tbl_detail_kelas.kode_kelas=tbl_jadwal.kode_kelas 
													INNER JOIN tbl_detail_jadwal ON tbl_jadwal.kode_jadwal=tbl_detail_jadwal.kode_jadwal 
													INNER JOIN tbl_matakuliah ON tbl_detail_jadwal.kode_matakuliah=tbl_matakuliah.kode_matakuliah 
													INNER JOIN tbl_dosen ON tbl_detail_jadwal.kode_dosen=tbl_dosen.kode_dosen
													WHERE tbl_mahasiswa.NPM='$username' AND semester='$semester' order by field(hari, 'Senin', 'Selasa', 'Rabu',
													'Kamis', 'Jumat', 'Sabtu', 'Minggu')";
										$query1 = mysqli_query($koneksi, $select1);
										$data1 = mysqli_fetch_array($query1);
							?>
									<table align="center" width="100%">
										<tr>
											<td width="10%">Nama</td>
											<td width="40%">: <?php echo $data1['Nama']; ?></td>
											<td width="10%">Kelas</td>
											<td width="40%">: <?php echo $data1['kode_kelas']; ?></td>
										</tr>
										<tr>
											<td >NPM</td>
											<td>: <?php echo $data1['NPM']; ?></td>
											<td>Kode Jadwal</td>
											<td>: <?php echo $data1['kode_jadwal']; ?></td>
										</tr>
									 </table><br><br>
							<table border="1" cellspacing="0" cellpadding="10" align="center" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
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
										$select = "SELECT tbl_mahasiswa.NPM, tbl_mahasiswa.Nama, tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, 
													tbl_jadwal.kode_jadwal, tbl_detail_jadwal.hari, waktu, tbl_detail_jadwal.semester, 
													tbl_matakuliah.kode_matakuliah, tbl_matakuliah.matakuliah, tbl_dosen.kode_dosen, 
													tbl_dosen.nama_dosen, kode_ruangan FROM tbl_mahasiswa 
													INNER JOIN tbl_detail_kelas ON tbl_mahasiswa.NPM=tbl_detail_kelas.NPM 
													INNER JOIN tbl_jadwal ON tbl_detail_kelas.kode_kelas=tbl_jadwal.kode_kelas 
													INNER JOIN tbl_detail_jadwal ON tbl_jadwal.kode_jadwal=tbl_detail_jadwal.kode_jadwal 
													INNER JOIN tbl_matakuliah ON tbl_detail_jadwal.kode_matakuliah=tbl_matakuliah.kode_matakuliah 
													INNER JOIN tbl_dosen ON tbl_detail_jadwal.kode_dosen=tbl_dosen.kode_dosen
													WHERE tbl_mahasiswa.NPM='$username' AND semester='$semester' order by field(hari, 'Senin', 'Selasa', 'Rabu',
													'Kamis', 'Jumat', 'Sabtu', 'Minggu')";
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