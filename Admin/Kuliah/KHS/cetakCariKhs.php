<?php
	include "../../../Koneksi/koneksi.php";
	$npm = $_GET['npm'];
	$semester = $_POST['nilai'];
	//header("Content-type: application/vnd-ms-excel");
	//header("Content-Disposition: attachment; filename=Data KHS ".$npm.".xls");
	$select1 = "SELECT tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, tbl_detail_kelas.NPM, tbl_mahasiswa.Nama, tbl_prodi.kode_prodi, tbl_prodi.nama_prodi,
				tbl_krs.tahun_akademik, tbl_krs.semester FROM tbl_detail_kelas
				INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi=tbl_prodi.kode_prodi
				INNER JOIN tbl_krs ON tbl_detail_kelas.kode_prodi=tbl_krs.kode_prodi
				INNER JOIN tbl_mahasiswa ON tbl_detail_kelas.NPM=tbl_mahasiswa.NPM
				WHERE tbl_detail_kelas.NPM='$npm' AND semester='$semester'";
	$query1 = mysqli_query($koneksi, $select1);
	$data1 = mysqli_fetch_array($query1);
?>
<center><h2 style="line-height:120%;margin:unset">KARTU HASIL STUDI <br> (KHS)
		</h2></center>
		<br><br><br><center>
									<table align="center" width="100%">
										<tr>
											<td width="10%">Nama</td>
											<td width="40%">: <?php echo $data1['Nama']; ?></td>
											<td width="10%">Fakultas / Prodi</td>
											<td width="40%">: Tarbiyah / <?php echo $data1['nama_prodi']; ?></td>
										</tr>
										<tr>
											<td >NPM</td>
											<td>: <?php echo $data1['NPM']; ?></td>
											<td>Tahun Akademik</td>
											<td>: <?php echo $data1['tahun_akademik']; ?></td>
										</tr>
									 </table><br>
									<table border="1" cellspacing="0" cellpadding="10" align="center" width="100%">
										<thead>
											<tr>
												<th rowspan="2" class="text-center" style="vertical-align:middle">NO</th>
												<th rowspan="2" class="text-center" style="vertical-align:middle">MATAKULIAH</th>
												<th rowspan="2" class="text-center" style="vertical-align:middle">SMT</th>
												<th rowspan="2" class="text-center" style="vertical-align:middle">K</th>
												<th colspan="2" class="text-center">NILAI</th>
												<th rowspan="2" class="text-center" style="vertical-align:middle">K X A</th>
												<th rowspan="2" class="text-center" style="vertical-align:middle">NAMA DOSEN</th>
											</tr>
											<tr>
												<th class="text-center">H</th>
												<th class="text-center">A</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$select = "SELECT * FROM tbl_nilai
															INNER JOIN tbl_matakuliah
															ON tbl_nilai.kode_matakuliah=tbl_matakuliah.kode_matakuliah
															INNER JOIN tbl_dosen
															ON tbl_nilai.kode_dosen=tbl_dosen.kode_dosen
															WHERE NPM='$npm' AND semester='$semester'";
												$query = mysqli_query($koneksi, $select);
												$no = 1;
												$a = 0;
												$cek = mysqli_num_rows($query);
												if($cek > 0){
													while($data = mysqli_fetch_array($query))
													{
														if($data['nilai_akhir'] <= 100){
															$angka	= 4;
															$huruf 	= "A";
															$keterangan = "Baik Sekali";
														}elseif($data['nilai_akhir'] <= 79){
															$angka	= 3;
															$huruf 	= "B";
															$keterangan = "Baik";
														}elseif($data['nilai_akhir'] <= 69){
															$angka	= 2;
															$huruf 	= "C";
															$keterangan = "Cukup";
														}elseif($data['nilai_akhir'] <= 59){
															$angka	= 1;
															$huruf 	= "D";
															$keterangan = "Kurang";
														}elseif($data['nilai_akhir'] <= 49){
															$angka	= 0;
															$huruf 	= "E";
															$keterangan = "Sangat Kurang";
														}else {
															echo 0;
														}
														
														$jumlah = $data['SKS'] * $angka;
														$a++;
														$totalsks[$a] = $data['SKS'];
														$total[$a] = $jumlah;
											?>
											<tr>
												<td class="text-center"><?php echo $no; ?></td>
												<td class="text-center"><?php echo $data['matakuliah']; ?></td>
												<td class="text-center"><?php echo $data['semester']; ?></td>
												<td class="text-center"><?php echo $data['SKS']; ?></td>
												<td class="text-center"><?php echo $huruf ?></td>
												<td class="text-center"><?php echo $angka; ?></td>
												<td class="text-center"><?php echo $jumlah; ?></td>
												<td class="text-center"><?php echo $data['nama_dosen']; ?></td>
											</tr>
											<?php
													$no++;
													$jumlahsks = array_sum($totalsks);
													$jumlahkxa = array_sum($total);
													$ip = $jumlahkxa / $jumlahsks;
													} 
												} else {
													$ip = 0;
													$jumlahsks = 0;
													$jumlahkxa = 0;
												}?>	
										</tbody>
										<tfoot>
											<tr>
												<td class="text-center" colspan="2"><b>Jumlah</b></td>
												<td class="text-center"><?php  echo $jumlahsks; ?></td>
												<td class="text-center"></td>
												<td class="text-center"></td>
												<td class="text-center"><?php  echo $jumlahkxa; ?></td>
												<td class="text-center"></td>
												<td class="text-center"></td>
											</tr>
										</tfoot>
									</table><br>
									<table border="1" align="center" width="100px">
											<tr>
												<td class="text-center"><b>IP = <?php  echo $ip; ?></b></td>
											</tr>
									</table><br>
									<table width="100%">
										<tr>
											<td></td>
											<td>Darussalam, .........................................</td>
										</tr>
										<tr>
											<td><center>Dosen Pembimbing Akademik,</center></td>
											<td><center>Mahasiswa,</center></td>
										</tr>
										<tr height="100px">
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td><center>___________________________________</center></td>
											<td><center>___________________________________</center></td>
										</tr>
									</table><br><br>
									<table width="100%">
										<tr>
											<td><center>Mengetahui :<br>Ketua Prodi,</center></td>
										</tr>
										<tr>
											<td>Keterangan : <br>K = Kredit <br>H = Huruf <br>A = Angka</td>
										</tr>
										<tr height="50px">
											<td><center>___________________________________</center></td>
										</tr>
									</table>
									</center>
<script>
	window.print();
</script>