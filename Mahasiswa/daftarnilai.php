<div class="container-fluid">
</div>
<!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Daftar Nilai
                            </h2>
                        </div>
                        <div class="body table-responsive">
						<form action="cetakCariNilai.php?npm=<?= $username;?>" method="POST" target="_blank">		
								<div class="row clearfix">
									<div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
											<label>Kolom :</label>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<div class="form-line">
												<select class="form-control show-tick" name="kolom" id="kolom" required>
													<option value="matakuliah">Matakuliah</option>
													<option value="semester">Semester</option>		
												</select>
											</div>
										</div>
									</div>
									<div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
											<label>Nilai :</label>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<div class="form-line">
												<input type="text" class="form-control" name="nilai" placeholder="Nilai yang dicari">
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<button type="submit" class="btn btn-info"><i class="material-icons">library_books</i>  Export</button>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakNilai.php?npm=<?= $username;?>" class="btn btn-info"  target="_blank"><i class="material-icons">library_books</i> Export All</a>  
										</div>
									</div>
								</div>	
							 </form>
                            <table class="table table-bordered table-striped table-hover">
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
                        </div>
                    </div>
                </div>
            </div>
<!-- #END# Bordered Table -->