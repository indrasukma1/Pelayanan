
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data KRS
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
								<a href="index.php?halaman=input-KRS" class="btn btn-success btn-sm">
								<i class="add_box"></i>Tambah Data</a>
								<hr>
							<table border="1" id="example" class="table table-bordered" style="border-collapse:collapse" align="center">
								<thead>
									<th class="text-center" style="vertical-align:middle">No</th>
									<th class="text-center" style="vertical-align:middle">Kode KRS</th>
									<th class="text-center" style="vertical-align:middle">Program Studi</th>
									<th class="text-center" style="vertical-align:middle">Kelas</th>
									<th class="text-center" style="vertical-align:middle">Tahun Akademik</th>
									<th class="text-center" style="vertical-align:middle">Semester</th>
									<th class="text-center" style="vertical-align:middle">Aksi</th>
								</thead>
								<tbody>
									<?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$select = "SELECT kode_krs, tbl_prodi.kode_prodi, kode_kelas, nama_prodi, tahun_akademik, semester 
													FROM tbl_krs
													INNER JOIN tbl_prodi
													ON tbl_krs.kode_prodi=tbl_prodi.kode_prodi";
										$query = mysqli_query($koneksi, $select);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['kode_krs']; ?></td>
										<td class="text-center"><?php echo $data['nama_prodi']; ?></td>
										<td class="text-center"><?php echo $data['kode_kelas']; ?></td>
										<td class="text-center"><?php echo $data['tahun_akademik']; ?></td>
										<td class="text-center"><?php echo $data['semester']; ?></td>
										<td class="text-center">
										<a href="index.php?halaman=lihatdata-KRS&kode_krs=<?php echo $data['kode_krs']; ?>&nama_prodi=<?php echo $data['nama_prodi']; ?>&semester=<?php echo $data['semester']; ?>" class="btn btn-info btn-sm">Lihat Data</a>
										<a onclick="return konfirmasi()" href="Kuliah/KRS/hapus.php?kode_krs=<?php echo $data['kode_krs']; ?>" class="btn btn-danger" ><i class="material-icons">delete_forever</i></a>
										
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







