<?php
	include "../../../Koneksi/koneksi.php";
	$kode_krs = $_GET['kode_krs'];
	$nama_prodi = $_GET['nama_prodi'];
	$semester 	= $_GET['semester'];
	//header("Content-type: application/vnd-ms-excel");
	//header("Content-Disposition: attachment; filename=Data KRS ".$kode_krs.".xls");
?>
<center><h2 style="line-height:120%;margin:unset">KARTU RENCANA STUDI <br>(KRS)</h2></center>
<br><br><br><center>				
									<?php	
										$select = "SELECT kode_krs, tbl_matakuliah.kode_matakuliah, matakuliah, SKS,
													tbl_dosen.kode_dosen, nama_dosen FROM tbl_detail_krs
													INNER JOIN tbl_matakuliah
													ON tbl_detail_krs.kode_matakuliah=tbl_matakuliah.kode_matakuliah
													INNER JOIN tbl_dosen
													ON tbl_detail_krs.kode_dosen=tbl_dosen.kode_dosen
													WHERE kode_krs='$kode_krs'";
										$query = mysqli_query($koneksi, $select);
										$data = mysqli_fetch_array($query);
									?>
									<table align="center" width="100%">
										<tr>
											<td width="10%">Nama</td>
											<td width="40%">: </td>
											<td width="10%">Fakultas / Prodi</td>
											<td width="40%">: Tarbiyah / <?php echo $nama_prodi; ?></td>
										</tr>
										<tr>
											<td >NPM</td>
											<td>: </td>
											<td>Tahun Akademik</td>
											<td>: </td>
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
										<td><center><?php echo $semester; ?></center></td>
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