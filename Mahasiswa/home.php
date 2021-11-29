			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
								<h2 align="center"><marquee>Selamat Datang di Aplikasi Pelayanan Mahasiswa Fakultas 
								Tarbiyah IAID Ciamis</marquee></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Jadwal Perkuliahan
                            </h2>
                        </div>
                        <div class="body table-responsive">
							 <div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakJadwal.php?username=<?= $username;?>" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i> Export</a>  
										</div>
									</div>
								</div>
                            <table class="table table-bordered">
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
										
										$select = "SELECT tbl_mahasiswa.NPM, tbl_detail_kelas.kode_prodi, tbl_detail_kelas.kode_kelas, tbl_jadwal.kode_jadwal, 
													tbl_detail_jadwal.hari, waktu, tbl_detail_jadwal.semester, tbl_matakuliah.kode_matakuliah, 
													tbl_matakuliah.matakuliah, tbl_dosen.kode_dosen, tbl_dosen.nama_dosen, kode_ruangan FROM tbl_mahasiswa 
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Bordered Table -->
			<!-- Line Chart -->
			<!-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Grafik Perkembangan IPK</h2>
                        </div>
                        <div class="body">
                            <div class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#222"
                                 data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(0, 150, 136)" data-spot-Color="rgb(0, 188, 212)"
                                 data-offset="90" data-width="100%" data-height="150px" data-line-Width="2" data-line-Color="rgb(0, 188, 212)"
                                 data-fill-Color="rgba(0, 188, 212, 0.3)">
                                <!-- 6,4,7,8,4,3,2,2,5,6,7,4,1,5,7,9,9,8,7,6 -->
            <!--                </div>
                        </div>
                    </div>
                </div>
			</div>
                <!-- #END# Line Chart -->