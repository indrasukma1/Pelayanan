<?php
	include "../Koneksi/koneksi.php";
	$username = $_GET['npm'];
	$semester = $_GET['semester'];
?>
<center><h2 style="line-height:120%;margin:unset">KARTU RENCANA STUDI <br>(KRS)</h2></center>
<br><br><br><center>				
									<?php	
									    $select11= "SELECT tbl_detail_kelas.NPM, tbl_mahasiswa.Nama, tbl_detail_kelas.kode_kelas, tbl_detail_kelas.kode_prodi, tbl_prodi.nama_prodi, tbl_krs.kode_krs, tbl_krs.tahun_akademik FROM tbl_detail_kelas
									        INNER JOIN tbl_mahasiswa ON tbl_detail_kelas.NPM = tbl_mahasiswa.NPM
									    INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas INNER JOIN tbl_detail_krs ON tbl_krs.kode_krs = tbl_detail_krs.kode_krs  WHERE tbl_detail_kelas.NPM='$username' AND semester='$semester'";
										$query11 = mysqli_query($koneksi, $select11);
										$data11 = mysqli_fetch_array($query11);
									?>
									<table align="center" width="100%">
										<tr>
											<td width="10%">Nama</td>
											<td width="40%">: <?php echo $data11['Nama']; ?></td>
											<td width="10%">Fakultas / Prodi</td>
											<td width="40%">: Tarbiyah / <?php echo $data11['nama_prodi']; ?></td>
										</tr>
										<tr>
											<td >NPM</td>
											<td>: <?php echo $data11['NPM']; ?></td>
											<td>Tahun Akademik</td>
											<td>: <?php echo $data11['tahun_akademik']; ?></td>
										</tr>
									 </table><br><br>
							<div class="body table-responsive">
                            <table border="1" cellspacing="0" cellpadding="10" align="center" width="100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>MATAKULIAH</th>
										<th>SMT</th>
                                        <th>SKS</th>
                                        <th>NAMA DOSEN</th>
                                    </tr>
                                </thead>
                                <tbody> 
									<?php
									    $select= "SELECT tbl_detail_kelas.NPM, tbl_mahasiswa.Nama, tbl_detail_kelas.kode_kelas, tbl_detail_kelas.kode_prodi, tbl_prodi.nama_prodi, tbl_krs.kode_krs, tbl_krs.tahun_akademik, tbl_krs.semester, tbl_detail_krs.kode_matakuliah, tbl_matakuliah.matakuliah, tbl_detail_krs.SKS, tbl_detail_krs.kode_dosen, tbl_dosen.nama_dosen FROM tbl_detail_kelas
									        INNER JOIN tbl_mahasiswa ON tbl_detail_kelas.NPM = tbl_mahasiswa.NPM
									    INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas INNER JOIN tbl_detail_krs ON tbl_krs.kode_krs = tbl_detail_krs.kode_krs INNER JOIN tbl_matakuliah ON tbl_detail_krs.kode_matakuliah = tbl_matakuliah.kode_matakuliah INNER JOIN tbl_dosen ON tbl_detail_krs.kode_dosen = tbl_dosen.kode_dosen WHERE tbl_detail_kelas.NPM='$username' AND semester='$semester'";
									    
									    $query = mysqli_query($koneksi, $select);
										
										$no = 1;
										$a = 0;
										$cek = mysqli_num_rows($query);
										if($cek > 0){
											while($data = mysqli_fetch_array($query))
											{
												$a++;
												$total[$a] = $data['SKS'];
												$totalSKS = array_sum($total);
									?>
									<tr>
                                        <td width="5%"><center><?php echo $no; ?></center></td>
										<td><?php echo $data['matakuliah']; ?></td>
										<td><center><?php echo $data['semester']; ?></center></td>
										<td><center><?php echo $data['SKS']; ?></center></td>
										<td><?php echo $data['nama_dosen']; ?></td>
                                    </tr>
									<?php 
											$no++; 
											}
										} else {
											$totalSKS = 0;
										
										}									
									?>
									
                                </tbody>
                            </table><br>
							
							<table border="1" cellspacing="0" cellpadding="10" align="center" width="100%">
									<tr>
                                        <td width="40%"><b>Jumlah Kredit yang Diambil</b></td>
										<td width="10%"><center><?php  echo $totalSKS; ?></center></td>
										<td width="40%"><b>IP Semester Sekarang</b></td>
										<td width="10%"><?php  ?></td>
                                    </tr>
									<tr>
                                        <td width="40%"><b>IPK Semester Lalu</b></td>
										<td width="10%"><?php   ?></td>
                                    </tr>
									<tr>
                                        <td width="40%"><b>Indek Prestasi Kumulatif</b></td>
										<td width="10%"><?php   ?></td>
                                    </tr>
							</table>
                        </div>
									<br><br><table width="100%">
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
										<tr height="100px">
											<td></td>
										</tr>
										<tr height="50px">
											<td><center>___________________________________</center></td>
										</tr>
									</table>
</center>
<script>
	window.print();
</script>