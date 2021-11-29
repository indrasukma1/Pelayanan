<?php
	include "../Koneksi/koneksi.php";
	$username = $_GET['npm'];
?>
<center><h1 style="line-height:120%;margin:unset">DAFTAR NILAI MAHASISWA
<h4 style="margin:unset">NPM : <?= $username;?></h4></h1></center>
<br>
<table border='1' cellspacing="0" cellpadding="10" align='center'>
									<thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">Matakuliah</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">Nama Dosen</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">Semester</th>
										<th colspan="6" class="text-center">Aspek yang Dinilai</th>
										<th colspan="2" class="text-center">Nilai Akhir</th>
                                    </tr>
									<tr>
                                        <th class="text-center">K</th>
                                        <th class="text-center">T</th>
										<th class="text-center">M</th>
										<th class="text-center">Md</th>
										<th class="text-center">2A</th>
										<th class="text-center">Jumlah</th>
										<th class="text-center">Angka</th>
										<th class="text-center">Huruf</th>
                                    </tr>
								</thead>
                                <tbody>
                                    <?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$select = "SELECT * FROM tbl_nilai
													INNER JOIN tbl_matakuliah
													ON tbl_nilai.kode_matakuliah=tbl_matakuliah.kode_matakuliah
													INNER JOIN tbl_dosen
													ON tbl_nilai.kode_dosen=tbl_dosen.kode_dosen
													WHERE NPM='$username' ORDER BY semester ASC";
										$query = mysqli_query($koneksi, $select);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
											if($data['nilai_akhir'] > 79){
												$angka	= 4;
												$huruf 	= "A";
												$keterangan = "Baik Sekali";
											}elseif($data['nilai_akhir'] > 69){
												$angka	= 3;
												$huruf 	= "B";
												$keterangan = "Baik";
											}elseif($data['nilai_akhir'] > 59){
												$angka	= 2;
												$huruf 	= "C";
												$keterangan = "Cukup";
											}elseif($data['nilai_akhir'] > 49){
												$angka	= 1;
												$huruf 	= "D";
												$keterangan = "Kurang";
											}elseif($data['nilai_akhir'] >= 0){
												$angka	= 0;
												$huruf 	= "E";
												$keterangan = "Sangat Kurang";
											}else {
												echo 0;
											}
											$jumlah = $data['nilai_kehadiran'] + $data['tugas_terstruktur'] + $data['tugas_mandiri'] + $data['UTS'] + $data['UAS'];
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data['nama_dosen']; ?></td>
										<td class="text-center"><?php echo $data['semester']; ?></td>
										<td class="text-center"><?php echo $data['nilai_kehadiran']; ?></td>
										<td class="text-center"><?php echo $data['tugas_terstruktur']; ?></td>
										<td class="text-center"><?php echo $data['tugas_mandiri']; ?></td>
										<td class="text-center"><?php echo $data['UTS']; ?></td>
										<td class="text-center"><?php echo $data['UAS']; ?></td>
										<td class="text-center"><?php echo $jumlah; ?></td>
										<td class="text-center"><?php echo $data['nilai_akhir']; ?></td>
										<td class="text-center"><?php echo $huruf; ?></td>
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