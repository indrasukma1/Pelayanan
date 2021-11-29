<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Jadwal Mengajar
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
							<table id="example" class="table table-bordered table-striped table-hover" align="center">
								<thead>
									<th class="text-center" style="vertical-align:middle">No</th>
									<th class="text-center" style="vertical-align:middle">Nama Prodi</th>
									<th class="text-center" style="vertical-align:middle">Kelas</th>
									<th class="text-center" style="vertical-align:middle">Semester</th>
									<th class="text-center" style="vertical-align:middle">Hari</th>
									<th class="text-center" style="vertical-align:middle">Waktu</th>
									<th class="text-center" style="vertical-align:middle">Matakuliah</th>
									<th class="text-center" style="vertical-align:middle">Ruangan</th>
								</thead>
								<tbody>
									<?php
										$select = "SELECT tbl_jadwal.kode_jadwal, tbl_jadwal.kode_prodi, tbl_prodi.nama_prodi, 
													tbl_jadwal.kode_kelas, tbl_detail_jadwal.semester, tbl_detail_jadwal.hari, 
													tbl_detail_jadwal.waktu, tbl_detail_jadwal.kode_matakuliah, tbl_matakuliah.matakuliah, 
													tbl_detail_jadwal.kode_dosen, tbl_detail_jadwal.kode_ruangan FROM tbl_jadwal 
													INNER JOIN tbl_prodi ON tbl_jadwal.kode_prodi = tbl_prodi.kode_prodi 
													INNER JOIN tbl_detail_jadwal ON tbl_jadwal.kode_jadwal = tbl_detail_jadwal.kode_jadwal 
													INNER JOIN tbl_matakuliah ON tbl_detail_jadwal.kode_matakuliah = tbl_matakuliah.kode_matakuliah 
													WHERE kode_dosen='$user' ORDER BY semester ASC";
										$query = mysqli_query($koneksi, $select);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['nama_prodi']; ?></td>
										<td class="text-center"><?php echo $data['kode_kelas']; ?></td>
										<td class="text-center"><?php echo $data['semester']; ?></td>
										<td class="text-center"><?php echo $data['hari']; ?></td>
										<td class="text-center"><?php echo $data['waktu']; ?></td>
										<td class="text-center"><?php echo $data['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data['kode_ruangan']; ?></td>
									</tr>
									<?php 
										$no++; 
										}
									?>


									<!-- <td><a href="#" class="btn btn-info" ><i class="fa fa-edit"></i></a>
										<a href="#" class="btn btn-danger" ><i class="fa fa-trash"></i></a></td> -->
								</tbody>
							  
							</table>
                        </div>
                    </div>
                </div>
            </div>