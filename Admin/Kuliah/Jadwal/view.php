<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Jadwal Prodi PAI
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
							<table border="1" class="table table-bordered" style="border-collapse:collapse" align="center">
								<thead>
									<th class="text-center" style="vertical-align:middle">No</th>
									<th class="text-center" style="vertical-align:middle">Kode Jadwal</th>
									<th class="text-center" style="vertical-align:middle">Program Studi</th>
									<th class="text-center" style="vertical-align:middle">Kelas</th>
									<th class="text-center" style="vertical-align:middle">Aksi</th>
								</thead>
								<tbody>
									<?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$select = "SELECT kode_jadwal, tbl_prodi.kode_prodi, nama_prodi, kode_kelas FROM tbl_jadwal
													INNER JOIN tbl_prodi
													ON tbl_jadwal.kode_prodi=tbl_prodi.kode_prodi
													WHERE nama_prodi='S1 Pendidikan Agama Islam' OR nama_prodi='S2 Pendidikan Agama Islam'";
										$query = mysqli_query($koneksi, $select);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['kode_jadwal']; ?></td>
										<td class="text-center"><?php echo $data['nama_prodi']; ?></td>
										<td class="text-center"><?php echo $data['kode_kelas']; ?></td>
										<td class="text-center">
										<a href="index.php?halaman=view-detailJadwal&kode_jadwal=<?php echo $data['kode_jadwal']; ?>" class="btn btn-info btn-sm">DETAIL</a>
										<a onclick="return konfirmasi()" href="Kuliah/Jadwal/hapus.php?kode_jadwal=<?php echo $data['kode_jadwal']; ?>" class="btn btn-danger" ><i class="material-icons">delete_forever</i></a>
										</td>
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

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Jadwal Prodi PGMI
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
							<table border="1" class="table table-bordered" style="border-collapse:collapse" align="center">
								<thead>
									<th class="text-center" style="vertical-align:middle">No</th>
									<th class="text-center" style="vertical-align:middle">Kode Jadwal</th>
									<th class="text-center" style="vertical-align:middle">Program Studi</th>
									<th class="text-center" style="vertical-align:middle">Kelas</th>
									<th class="text-center" style="vertical-align:middle">Aksi</th>
								</thead>
								<tbody>
									<?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$select = "SELECT kode_jadwal, tbl_prodi.kode_prodi, nama_prodi, kode_kelas FROM tbl_jadwal
													INNER JOIN tbl_prodi
													ON tbl_jadwal.kode_prodi=tbl_prodi.kode_prodi
													WHERE nama_prodi='S1 Pendidikan Guru Madrasah Ibdtidaiyah'";
										$query = mysqli_query($koneksi, $select);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['kode_jadwal']; ?></td>
										<td class="text-center"><?php echo $data['nama_prodi']; ?></td>
										<td class="text-center"><?php echo $data['kode_kelas']; ?></td>
										<td class="text-center">
										<a href="index.php?halaman=view-detailJadwal&kode_jadwal=<?php echo $data['kode_jadwal']; ?>" class="btn btn-info btn-sm">DETAIL</a>
										<a onclick="return konfirmasi()" href="Kuliah/Jadwal/hapus.php?kode_jadwal=<?php echo $data['kode_jadwal']; ?>" class="btn btn-danger" ><i class="material-icons">delete_forever</i></a>
										</td>
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

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Jadwal Prodi PIAUD
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
							<table border="1" class="table table-bordered" style="border-collapse:collapse" align="center">
								<thead>
									<th class="text-center" style="vertical-align:middle">No</th>
									<th class="text-center" style="vertical-align:middle">Kode Jadwal</th>
									<th class="text-center" style="vertical-align:middle">Program Studi</th>
									<th class="text-center" style="vertical-align:middle">Kelas</th>
									<th class="text-center" style="vertical-align:middle">Aksi</th>
								</thead>
								<tbody>
									<?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$select = "SELECT kode_jadwal, tbl_prodi.kode_prodi, nama_prodi, kode_kelas FROM tbl_jadwal
													INNER JOIN tbl_prodi
													ON tbl_jadwal.kode_prodi=tbl_prodi.kode_prodi
													WHERE nama_prodi='S1 Pendidikan Islam Anak Usia Dini'";
										$query = mysqli_query($koneksi, $select);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['kode_jadwal']; ?></td>
										<td class="text-center"><?php echo $data['nama_prodi']; ?></td>
										<td class="text-center"><?php echo $data['kode_kelas']; ?></td>
										<td class="text-center">
										<a href="index.php?halaman=view-detailJadwal&kode_jadwal=<?php echo $data['kode_jadwal']; ?>" class="btn btn-info btn-sm">DETAIL</a>
										<a onclick="return konfirmasi()" href="Kuliah/Jadwal/hapus.php?kode_jadwal=<?php echo $data['kode_jadwal']; ?>" class="btn btn-danger" ><i class="material-icons">delete_forever</i></a>
										</td>
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






