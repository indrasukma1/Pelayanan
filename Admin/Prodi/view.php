<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Prodi
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
							<table border="1" class="table table-bordered" style="border-collapse:collapse" align="center">
								<thead>
									<th class="text-center" style="vertical-align:middle">No</th>
									<th class="text-center" style="vertical-align:middle">Kode Prodi</th>
									<th class="text-center" style="vertical-align:middle">Nama Prodi</th>
									<th class="text-center" style="vertical-align:middle">Jumlah Mahasiswa</th>
									<th class="text-center" style="vertical-align:middle">Aksi</th>
								</thead>
								<tbody>
									<?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$prodi = "SELECT * FROM tbl_prodi";
										$query = mysqli_query($koneksi, $prodi);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
											$kode_prodi = $data['kode_prodi'];
											$selectMhs = "SELECT COUNT(NPM) AS NPM FROM tbl_detail_kelas WHERE kode_prodi='$kode_prodi'";
											$q = mysqli_query($koneksi, $selectMhs);
											$count = mysqli_fetch_array($q);
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['kode_prodi']; ?></td>
										<td class="text-center"><?php echo $data['nama_prodi']; ?></td>
										<td class="text-center"><?php echo $count['NPM']; ?></td>
										<td class="text-center">
										<a href="index.php?halaman=view-kelas&kode_prodi=<?php echo $data['kode_prodi'];?>&nama_prodi=<?php echo $data['nama_prodi']; ?>" class="btn btn-info" >DATA KELAS</a>
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
<hr>


