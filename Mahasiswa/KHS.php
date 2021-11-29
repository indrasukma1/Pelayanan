<?php
	$select1 = "SELECT tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, tbl_detail_kelas.NPM, tbl_prodi.kode_prodi, tbl_prodi.nama_prodi,
				tbl_krs.tahun_akademik, tbl_krs.semester FROM tbl_detail_kelas
				INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi=tbl_prodi.kode_prodi
				INNER JOIN tbl_krs ON tbl_detail_kelas.kode_prodi=tbl_krs.kode_prodi
				WHERE NPM='$username'";
	$query1 = mysqli_query($koneksi, $select1);
	$data1 = mysqli_fetch_array($query1);
?>
<div class="container-fluid">
</div>
<!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Semester 1
                            </h2>
                        </div>
                        <div class="body table-responsive">	
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKhs.php?npm=<?= $username;?>&semester=1" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>	
									<?php	
										$select11 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, tbl_prodi.nama_prodi, tbl_krs.tahun_akademik, tbl_krs.semester FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas WHERE tbl_detail_kelas.NPM='$username' AND semester='1'";
										$query11 = mysqli_query($koneksi, $select11);
										$data11 = mysqli_fetch_array($query11);
									?>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data11['nama_prodi']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data11['tahun_akademik']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            <table id="" class="table table-bordered table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">Matakuliah</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K</th>
										<th colspan="2" class="text-center">Nilai</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K X A</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">Nama Dosen</th>
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
													WHERE NPM='$username' AND semester='1'";
										$query = mysqli_query($koneksi, $select);
										$no = 1;
										$a = 0;
										$cek = mysqli_num_rows($query);
										if($cek > 0){
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
												
												$jumlah = $data['SKS'] * $angka;
												$a++;
												$totalsks[$a] = $data['SKS'];
												$total[$a] = $jumlah;
									?>
                                    <tr>
                                        <td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['matakuliah']; ?></td>
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
                                    </tr>
								</tfoot>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>IP</b></td>
										<td class="text-center"><?php  echo round($ip,2); ?></td>
                                    </tr>
							</table>
							
                        </div>
                    </div>
                </div>
            </div>
<!-- #END# Bordered Table -->

<!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Semester 2
                            </h2>
                        </div>
                        <div class="body table-responsive">
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKhs.php?npm=<?= $username;?>&semester=2" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>
									<?php	
										$select22 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, tbl_prodi.nama_prodi, tbl_krs.tahun_akademik, tbl_krs.semester FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas WHERE tbl_detail_kelas.NPM='$username' AND semester='2'";
										$query22 = mysqli_query($koneksi, $select22);
										$data22 = mysqli_fetch_array($query22)
									?>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data22['nama_prodi']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data22['tahun_akademik']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            <table id="" class="table table-bordered table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">Matakuliah</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K</th>
										<th colspan="2" class="text-center">Nilai</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K X A</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">Nama Dosen</th>
                                    </tr>
									<tr>
                                        <th class="text-center">H</th>
                                        <th class="text-center">A</th>
                                    </tr>
                                </thead>
                                <tbody>
											<?php
												$select2 = "SELECT * FROM tbl_nilai
        													INNER JOIN tbl_matakuliah
        													ON tbl_nilai.kode_matakuliah=tbl_matakuliah.kode_matakuliah
        													INNER JOIN tbl_dosen
        													ON tbl_nilai.kode_dosen=tbl_dosen.kode_dosen
        													WHERE NPM='$username' AND semester='2'";
												$query2 = mysqli_query($koneksi, $select2);
												$no2 = 1;
												$a2 = 0;
												$cek2 = mysqli_num_rows($query2);
												if($cek2 > 0){
													while($data2 = mysqli_fetch_array($query2))
													{
														if($data2['nilai_akhir'] > 79){
            												$angka	= 4;
            												$huruf 	= "A";
            												$keterangan = "Baik Sekali";
            											}elseif($data2['nilai_akhir'] > 69){
            												$angka	= 3;
            												$huruf 	= "B";
            												$keterangan = "Baik";
            											}elseif($data2['nilai_akhir'] > 59){
            												$angka	= 2;
            												$huruf 	= "C";
            												$keterangan = "Cukup";
            											}elseif($data2['nilai_akhir'] > 49){
            												$angka	= 1;
            												$huruf 	= "D";
            												$keterangan = "Kurang";
            											}elseif($data2['nilai_akhir'] >= 0){
            												$angka	= 0;
            												$huruf 	= "E";
            												$keterangan = "Sangat Kurang";
            											}else {
            												echo 0;
            											}
														
														$jumlah2 = $data2['SKS'] * $angka;
														$a2++;
														$totalsks2[$a2] = $data2['SKS'];
														$total2[$a2] = $jumlah2;
											?>
											<tr>
												<td class="text-center"><?php echo $no2; ?></td>
												<td class="text-center"><?php echo $data2['matakuliah']; ?></td>
												<td class="text-center"><?php echo $data2['SKS']; ?></td>
												<td class="text-center"><?php echo $huruf; ?></td>
												<td class="text-center"><?php echo $angka; ?></td>
												<td class="text-center"><?php echo $jumlah2; ?></td>
												<td class="text-center"><?php echo $data2['nama_dosen']; ?></td>
											</tr>
											<?php
													$no2++;
													$jumlahsks2 = array_sum($totalsks2);
													$jumlahkxa2 = array_sum($total2);
													$ip2 = $jumlahkxa2 / $jumlahsks2;
													} 
												} else {
													$ip2 = 0;
													$jumlahsks2 = 0;
													$jumlahkxa2 = 0;
												}?>	
										</tbody>
										<tfoot>
											<tr>
												<td class="text-center" colspan="2"><b>Jumlah</b></td>
												<td class="text-center"></td>
												<td class="text-center"><?php  echo $jumlahsks2; ?></td>
												<td class="text-center"></td>
												<td class="text-center"><?php  echo $jumlahkxa2; ?></td>
												<td class="text-center"></td>
											</tr>
										</tfoot>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>IP</b></td>
										<td class="text-center"><?php  echo round($ip2,2); ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
<!-- #END# Bordered Table -->

<!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Semester 3
                            </h2>
                        </div>
                        <div class="body table-responsive">
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKhs.php?npm=<?= $username;?>&semester=3" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>
									<?php	
										$select33 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, tbl_prodi.nama_prodi, tbl_krs.tahun_akademik, tbl_krs.semester FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas WHERE tbl_detail_kelas.NPM='$username' AND semester='3'";
										$query33 = mysqli_query($koneksi, $select33);
										$data33 = mysqli_fetch_array($query33)
									?>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data33['nama_prodi']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data33['tahun_akademik']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            <table id="" class="table table-bordered table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">Matakuliah</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K</th>
										<th colspan="2" class="text-center">Nilai</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K X A</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">Nama Dosen</th>
                                    </tr>
									<tr>
                                        <th class="text-center">H</th>
                                        <th class="text-center">A</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$select3 = "SELECT * FROM tbl_nilai
													INNER JOIN tbl_matakuliah
													ON tbl_nilai.kode_matakuliah=tbl_matakuliah.kode_matakuliah
													INNER JOIN tbl_dosen
													ON tbl_nilai.kode_dosen=tbl_dosen.kode_dosen
													WHERE NPM='$username' AND semester='3'";
										$query3 = mysqli_query($koneksi, $select3);
										$no3 = 1;
										$a = 0;
										$cek = mysqli_num_rows($query3);
										if($cek > 0){
											while($data3 = mysqli_fetch_array($query3))
											{
											        	if($data3['nilai_akhir'] > 79){
            												$angka	= 4;
            												$huruf 	= "A";
            												$keterangan = "Baik Sekali";
            											}elseif($data3['nilai_akhir'] > 69){
            												$angka	= 3;
            												$huruf 	= "B";
            												$keterangan = "Baik";
            											}elseif($data3['nilai_akhir'] > 59){
            												$angka	= 2;
            												$huruf 	= "C";
            												$keterangan = "Cukup";
            											}elseif($data3['nilai_akhir'] > 49){
            												$angka	= 1;
            												$huruf 	= "D";
            												$keterangan = "Kurang";
            											}elseif($data3['nilai_akhir'] >= 0){
            												$angka	= 0;
            												$huruf 	= "E";
            												$keterangan = "Sangat Kurang";
            											}else {
            												echo 0;
            											}
												
												$jumlah3 = $data3['SKS'] * $angka;
												$a++;
												$totalsks3[$a] = $data3['SKS'];
												$total3[$a] = $jumlah3;
									?>
                                    <tr>
                                        <td class="text-center"><?php echo $no3; ?></td>
										<td class="text-center"><?php echo $data3['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data3['SKS']; ?></td>
                                        <td class="text-center"><?php echo $huruf ?></td>
										<td class="text-center"><?php echo $angka; ?></td>
                                        <td class="text-center"><?php echo $jumlah3; ?></td>
                                        <td class="text-center"><?php echo $data3['nama_dosen']; ?></td>
                                    </tr>
									<?php
											$no++;
											$jumlahsks3 = array_sum($totalsks3);
											$jumlahkxa3 = array_sum($total3);
											$ip3 = $jumlahkxa3 / $jumlahsks3;
											} 
										} else {
											$ip3 = 0;
											$jumlahsks3 = 0;
											$jumlahkxa3 = 0;
										}?>	
                                </tbody>
								<tfoot>
									<tr>
                                        <td class="text-center" colspan="2"><b>Jumlah</b></td>
										<td class="text-center"><?php  echo $jumlahsks3; ?></td>
										<td class="text-center"></td>
										<td class="text-center"></td>
										<td class="text-center"><?php  echo $jumlahkxa3; ?></td>
										<td class="text-center"></td>
                                    </tr>
								</tfoot>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>IP</b></td>
										<td class="text-center"><?php  echo round($ip3,2); ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
<!-- #END# Bordered Table -->

<!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Semester 4
                            </h2>
                        </div>
                        <div class="body table-responsive">
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKhs.php?npm=<?= $username;?>&semester=4" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>
									<?php	
										$select44 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, tbl_prodi.nama_prodi, tbl_krs.tahun_akademik, tbl_krs.semester FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas WHERE tbl_detail_kelas.NPM='$username' AND semester='4'";
										$query44 = mysqli_query($koneksi, $select44);
										$data44 = mysqli_fetch_array($query44)
									?>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data44['nama_prodi']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data44['tahun_akademik']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            <table id="" class="table table-bordered table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">Matakuliah</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K</th>
										<th colspan="2" class="text-center">Nilai</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K X A</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">Nama Dosen</th>
                                    </tr>
									<tr>
                                        <th class="text-center">H</th>
                                        <th class="text-center">A</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$select4 = "SELECT * FROM tbl_nilai
													INNER JOIN tbl_matakuliah
													ON tbl_nilai.kode_matakuliah=tbl_matakuliah.kode_matakuliah
													INNER JOIN tbl_dosen
													ON tbl_nilai.kode_dosen=tbl_dosen.kode_dosen
													WHERE NPM='$username' AND semester='4'";
										$query4 = mysqli_query($koneksi, $select4);
										$no4 = 1;
										$a = 0;
										$cek = mysqli_num_rows($query4);
										if($cek > 0){
											while($data4 = mysqli_fetch_array($query4))
											{
												        if($data4['nilai_akhir'] > 79){
            												$angka	= 4;
            												$huruf 	= "A";
            												$keterangan = "Baik Sekali";
            											}elseif($data4['nilai_akhir'] > 69){
            												$angka	= 3;
            												$huruf 	= "B";
            												$keterangan = "Baik";
            											}elseif($data4['nilai_akhir'] > 59){
            												$angka	= 2;
            												$huruf 	= "C";
            												$keterangan = "Cukup";
            											}elseif($data4['nilai_akhir'] > 49){
            												$angka	= 1;
            												$huruf 	= "D";
            												$keterangan = "Kurang";
            											}elseif($data4['nilai_akhir'] >= 0){
            												$angka	= 0;
            												$huruf 	= "E";
            												$keterangan = "Sangat Kurang";
            											}else {
            												echo 0;
            											}
												
												$jumlah4 = $data4['SKS'] * $angka;
												$a++;
												$totalsks4[$a] = $data4['SKS'];
												$total4[$a] = $jumlah4;
									?>
                                    <tr>
                                        <td class="text-center"><?php echo $no4; ?></td>
										<td class="text-center"><?php echo $data4['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data4['SKS']; ?></td>
                                        <td class="text-center"><?php echo $huruf ?></td>
										<td class="text-center"><?php echo $angka; ?></td>
                                        <td class="text-center"><?php echo $jumlah4; ?></td>
                                        <td class="text-center"><?php echo $data4['nama_dosen']; ?></td>
                                    </tr>
									<?php
											$no++;
											$jumlahsks4 = array_sum($totalsks4);
											$jumlahkxa4 = array_sum($total4);
											$ip4 = $jumlahkxa4 / $jumlahsks4;
											} 
										} else {
											$ip4 = 0;
											$jumlahsks4 = 0;
											$jumlahkxa4 = 0;
										}?>	
                                </tbody>
								<tfoot>
									<tr>
                                        <td class="text-center" colspan="2"><b>Jumlah</b></td>
										<td class="text-center"><?php  echo $jumlahsks4; ?></td>
										<td class="text-center"></td>
										<td class="text-center"></td>
										<td class="text-center"><?php  echo $jumlahkxa4; ?></td>
										<td class="text-center"></td>
                                    </tr>
								</tfoot>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>IP</b></td>
										<td class="text-center"><?php  echo round($ip4,2); ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
<!-- #END# Bordered Table -->

<!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Semester 5
                            </h2>
                        </div>
                        <div class="body table-responsive">
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKhs.php?npm=<?= $username;?>&semester=5" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>
									<?php	
										$select55 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, tbl_prodi.nama_prodi, tbl_krs.tahun_akademik, tbl_krs.semester FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas WHERE tbl_detail_kelas.NPM='$username' AND semester='5'";
										$query55 = mysqli_query($koneksi, $select55);
										$data55 = mysqli_fetch_array($query55)
									?>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data55['nama_prodi']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data55['tahun_akademik']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            <table id="" class="table table-bordered table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">Matakuliah</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K</th>
										<th colspan="2" class="text-center">Nilai</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K X A</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">Nama Dosen</th>
                                    </tr>
									<tr>
                                        <th class="text-center">H</th>
                                        <th class="text-center">A</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$select5 = "SELECT * FROM tbl_nilai
													INNER JOIN tbl_matakuliah
													ON tbl_nilai.kode_matakuliah=tbl_matakuliah.kode_matakuliah
													INNER JOIN tbl_dosen
													ON tbl_nilai.kode_dosen=tbl_dosen.kode_dosen
													WHERE NPM='$username' AND semester='5'";
										$query5 = mysqli_query($koneksi, $select5);
										$no5 = 1;
										$a = 0;
										$cek = mysqli_num_rows($query5);
										if($cek > 0){
											while($data5 = mysqli_fetch_array($query5))
											{
											        	if($data5['nilai_akhir'] > 79){
            												$angka	= 4;
            												$huruf 	= "A";
            												$keterangan = "Baik Sekali";
            											}elseif($data5['nilai_akhir'] > 69){
            												$angka	= 3;
            												$huruf 	= "B";
            												$keterangan = "Baik";
            											}elseif($data5['nilai_akhir'] > 59){
            												$angka	= 2;
            												$huruf 	= "C";
            												$keterangan = "Cukup";
            											}elseif($data5['nilai_akhir'] > 49){
            												$angka	= 1;
            												$huruf 	= "D";
            												$keterangan = "Kurang";
            											}elseif($data5['nilai_akhir'] >= 0){
            												$angka	= 0;
            												$huruf 	= "E";
            												$keterangan = "Sangat Kurang";
            											}else {
            												echo 0;
            											}
												
												$jumlah5 = $data5['SKS'] * $angka;
												$a++;
												$totalsks5[$a] = $data5['SKS'];
												$total5[$a] = $jumlah5;
									?>
                                    <tr>
                                        <td class="text-center"><?php echo $no5; ?></td>
										<td class="text-center"><?php echo $data5['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data5['SKS']; ?></td>
                                        <td class="text-center"><?php echo $huruf ?></td>
										<td class="text-center"><?php echo $angka; ?></td>
                                        <td class="text-center"><?php echo $jumlah5; ?></td>
                                        <td class="text-center"><?php echo $data5['nama_dosen']; ?></td>
                                    </tr>
									<?php
											$no++;
											$jumlahsks5 = array_sum($totalsks5);
											$jumlahkxa5 = array_sum($total5);
											$ip5 = $jumlahkxa5 / $jumlahsks5;
											} 
										} else {
											$ip5 = 0;
											$jumlahsks5 = 0;
											$jumlahkxa5 = 0;
										}?>	
                                </tbody>
								<tfoot>
									<tr>
                                        <td class="text-center" colspan="2"><b>Jumlah</b></td>
										<td class="text-center"><?php  echo $jumlahsks5; ?></td>
										<td class="text-center"></td>
										<td class="text-center"></td>
										<td class="text-center"><?php  echo $jumlahkxa5; ?></td>
										<td class="text-center"></td>
                                    </tr>
								</tfoot>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>IP</b></td>
										<td class="text-center"><?php  echo round($ip5,2); ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
<!-- #END# Bordered Table -->

<!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Semester 6
                            </h2>
                        </div>
                        <div class="body table-responsive">
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKhs.php?npm=<?= $username;?>&semester=6" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>
									<?php	
										$select66 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, tbl_prodi.nama_prodi, tbl_krs.tahun_akademik, tbl_krs.semester FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas WHERE tbl_detail_kelas.NPM='$username' AND semester='6'";
										$query66 = mysqli_query($koneksi, $select66);
										$data66 = mysqli_fetch_array($query66)
									?>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data66['nama_prodi']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data66['tahun_akademik']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            <table id="" class="table table-bordered table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">Matakuliah</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K</th>
										<th colspan="2" class="text-center">Nilai</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K X A</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">Nama Dosen</th>
                                    </tr>
									<tr>
                                        <th class="text-center">H</th>
                                        <th class="text-center">A</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$select6 = "SELECT * FROM tbl_nilai
													INNER JOIN tbl_matakuliah
													ON tbl_nilai.kode_matakuliah=tbl_matakuliah.kode_matakuliah
													INNER JOIN tbl_dosen
													ON tbl_nilai.kode_dosen=tbl_dosen.kode_dosen
													WHERE NPM='$username' AND semester='6'";
										$query6 = mysqli_query($koneksi, $select6);
										$no6 = 1;
										$a = 0;
										$cek = mysqli_num_rows($query6);
										if($cek > 0){
											while($data6 = mysqli_fetch_array($query6))
											{
											        	if($data6['nilai_akhir'] > 79){
            												$angka	= 4;
            												$huruf 	= "A";
            												$keterangan = "Baik Sekali";
            											}elseif($data6['nilai_akhir'] > 69){
            												$angka	= 3;
            												$huruf 	= "B";
            												$keterangan = "Baik";
            											}elseif($data6['nilai_akhir'] > 59){
            												$angka	= 2;
            												$huruf 	= "C";
            												$keterangan = "Cukup";
            											}elseif($data6['nilai_akhir'] > 49){
            												$angka	= 1;
            												$huruf 	= "D";
            												$keterangan = "Kurang";
            											}elseif($data6['nilai_akhir'] >= 0){
            												$angka	= 0;
            												$huruf 	= "E";
            												$keterangan = "Sangat Kurang";
            											}else {
            												echo 0;
            											}
												
												$jumlah6 = $data6['SKS'] * $angka;
												$a++;
												$totalsks6[$a] = $data6['SKS'];
												$total6[$a] = $jumlah6;
									?>
                                    <tr>
                                        <td class="text-center"><?php echo $no6; ?></td>
										<td class="text-center"><?php echo $data6['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data6['SKS']; ?></td>
                                        <td class="text-center"><?php echo $huruf ?></td>
										<td class="text-center"><?php echo $angka; ?></td>
                                        <td class="text-center"><?php echo $jumlah6; ?></td>
                                        <td class="text-center"><?php echo $data6['nama_dosen']; ?></td>
                                    </tr>
									<?php
											$no++;
											$jumlahsks6 = array_sum($totalsks6);
											$jumlahkxa6 = array_sum($total6);
											$ip6 = $jumlahkxa6 / $jumlahsks6;
											} 
										} else {
											$ip6 = 0;
											$jumlahsks6 = 0;
											$jumlahkxa6 = 0;
										}?>	
                                </tbody>
								<tfoot>
									<tr>
                                        <td class="text-center" colspan="2"><b>Jumlah</b></td>
										<td class="text-center"><?php  echo $jumlahsks6; ?></td>
										<td class="text-center"></td>
										<td class="text-center"></td>
										<td class="text-center"><?php  echo $jumlahkxa6; ?></td>
										<td class="text-center"></td>
                                    </tr>
								</tfoot>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>IP</b></td>
										<td class="text-center"><?php  echo round($ip6,2); ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
<!-- #END# Bordered Table -->

<!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Semester 7
                            </h2>
                        </div>
                        <div class="body table-responsive">
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKhs.php?npm=<?= $username;?>&semester=7" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>
									<?php	
										$select77 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, tbl_prodi.nama_prodi, tbl_krs.tahun_akademik, tbl_krs.semester FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas WHERE tbl_detail_kelas.NPM='$username' AND semester='7'";
										$query77 = mysqli_query($koneksi, $select77);
										$data77 = mysqli_fetch_array($query77)
									?>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data77['nama_prodi']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data77['tahun_akademik']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            <table id="" class="table table-bordered table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">Matakuliah</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K</th>
										<th colspan="2" class="text-center">Nilai</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K X A</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">Nama Dosen</th>
                                    </tr>
									<tr>
                                        <th class="text-center">H</th>
                                        <th class="text-center">A</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$select7 = "SELECT * FROM tbl_nilai
													INNER JOIN tbl_matakuliah
													ON tbl_nilai.kode_matakuliah=tbl_matakuliah.kode_matakuliah
													INNER JOIN tbl_dosen
													ON tbl_nilai.kode_dosen=tbl_dosen.kode_dosen
													WHERE NPM='$username' AND semester='7'";
										$query7 = mysqli_query($koneksi, $select7);
										$no7 = 1;
										$a = 0;
										$cek = mysqli_num_rows($query7);
										if($cek > 0){
											while($data7 = mysqli_fetch_array($query7))
											{
												        if($data7['nilai_akhir'] > 79){
            												$angka	= 4;
            												$huruf 	= "A";
            												$keterangan = "Baik Sekali";
            											}elseif($data7['nilai_akhir'] > 69){
            												$angka	= 3;
            												$huruf 	= "B";
            												$keterangan = "Baik";
            											}elseif($data7['nilai_akhir'] > 59){
            												$angka	= 2;
            												$huruf 	= "C";
            												$keterangan = "Cukup";
            											}elseif($data7['nilai_akhir'] > 49){
            												$angka	= 1;
            												$huruf 	= "D";
            												$keterangan = "Kurang";
            											}elseif($data7['nilai_akhir'] >= 0){
            												$angka	= 0;
            												$huruf 	= "E";
            												$keterangan = "Sangat Kurang";
            											}else {
            												echo 0;
            											}
												
												$jumlah7 = $data7['SKS'] * $angka;
												$a++;
												$totalsks7[$a] = $data7['SKS'];
												$total7[$a] = $jumlah7;
									?>
                                    <tr>
                                        <td class="text-center"><?php echo $no7; ?></td>
										<td class="text-center"><?php echo $data7['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data7['SKS']; ?></td>
                                        <td class="text-center"><?php echo $huruf ?></td>
										<td class="text-center"><?php echo $angka; ?></td>
                                        <td class="text-center"><?php echo $jumlah7; ?></td>
                                        <td class="text-center"><?php echo $data7['nama_dosen']; ?></td>
                                    </tr>
									<?php
											$no++;
											$jumlahsks7 = array_sum($totalsks7);
											$jumlahkxa7 = array_sum($total7);
											$ip7 = $jumlahkxa7 / $jumlahsks7;
											} 
										} else {
											$ip7 = 0;
											$jumlahsks7 = 0;
											$jumlahkxa7 = 0;
										}?>	
                                </tbody>
								<tfoot>
									<tr>
                                        <td class="text-center" colspan="2"><b>Jumlah</b></td>
										<td class="text-center"><?php  echo $jumlahsks7; ?></td>
										<td class="text-center"></td>
										<td class="text-center"></td>
										<td class="text-center"><?php  echo $jumlahkxa7; ?></td>
										<td class="text-center"></td>
                                    </tr>
								</tfoot>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>IP</b></td>
										<td class="text-center"><?php  echo round($ip7,2); ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
<!-- #END# Bordered Table -->

<!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Semester 8
                            </h2>
                        </div>
                        <div class="body table-responsive">
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKhs.php?npm=<?= $username;?>&semester=8" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>
									<?php	
										$select88 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, tbl_prodi.nama_prodi, tbl_krs.tahun_akademik, tbl_krs.semester FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas WHERE tbl_detail_kelas.NPM='$username' AND semester='8'";
										$query88 = mysqli_query($koneksi, $select88);
										$data88 = mysqli_fetch_array($query88)
									?>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data88['nama_prodi']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $data88['tahun_akademik']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            <table id="" class="table table-bordered table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">Matakuliah</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K</th>
										<th colspan="2" class="text-center">Nilai</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">K X A</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">Nama Dosen</th>
                                    </tr>
									<tr>
                                        <th class="text-center">H</th>
                                        <th class="text-center">A</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$select8 = "SELECT * FROM tbl_nilai
													INNER JOIN tbl_matakuliah
													ON tbl_nilai.kode_matakuliah=tbl_matakuliah.kode_matakuliah
													INNER JOIN tbl_dosen
													ON tbl_nilai.kode_dosen=tbl_dosen.kode_dosen
													WHERE NPM='$username' AND semester='8'";
										$query8 = mysqli_query($koneksi, $select8);
										$no8 = 1;
										$a = 0;
										$cek = mysqli_num_rows($query8);
										if($cek > 0){
											while($data8 = mysqli_fetch_array($query8))
											{
												    if($data8['nilai_akhir'] > 79){
            												$angka	= 4;
            												$huruf 	= "A";
            												$keterangan = "Baik Sekali";
            											}elseif($data8['nilai_akhir'] > 69){
            												$angka	= 3;
            												$huruf 	= "B";
            												$keterangan = "Baik";
            											}elseif($data8['nilai_akhir'] > 59){
            												$angka	= 2;
            												$huruf 	= "C";
            												$keterangan = "Cukup";
            											}elseif($data8['nilai_akhir'] > 49){
            												$angka	= 1;
            												$huruf 	= "D";
            												$keterangan = "Kurang";
            											}elseif($data8['nilai_akhir'] >= 0){
            												$angka	= 0;
            												$huruf 	= "E";
            												$keterangan = "Sangat Kurang";
            											}else {
            												echo 0;
            											}
												
												$jumlah8 = $data8['SKS'] * $angka;
												$a++;
												$totalsks8[$a] = $data8['SKS'];
												$total8[$a] = $jumlah8;
									?>
                                    <tr>
                                        <td class="text-center"><?php echo $no8; ?></td>
										<td class="text-center"><?php echo $data8['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data8['SKS']; ?></td>
                                        <td class="text-center"><?php echo $huruf ?></td>
										<td class="text-center"><?php echo $angka; ?></td>
                                        <td class="text-center"><?php echo $jumlah8; ?></td>
                                        <td class="text-center"><?php echo $data8['nama_dosen']; ?></td>
                                    </tr>
									<?php
											$no++;
											$jumlahsks8 = array_sum($totalsks8);
											$jumlahkxa8 = array_sum($total8);
											$ip8 = $jumlahkxa8 / $jumlahsks8;
											} 
										} else {
											$ip8 = 0;
											$jumlahsks8 = 0;
											$jumlahkxa8 = 0;
										}?>	
                                </tbody>
								<tfoot>
									<tr>
                                        <td class="text-center" colspan="2"><b>Jumlah</b></td>
										<td class="text-center"><?php  echo $jumlahsks8; ?></td>
										<td class="text-center"></td>
										<td class="text-center"></td>
										<td class="text-center"><?php  echo $jumlahkxa8; ?></td>
										<td class="text-center"></td>
                                    </tr>
								</tfoot>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>IP</b></td>
										<td class="text-center"><?php  echo round($ip8,2); ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
<!-- #END# Bordered Table -->


