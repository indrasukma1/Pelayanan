<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Dosen
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
						<form action="Dosen/cetakCariDsn.php" target="_blank" method="POST">		
								<div class="row clearfix">
									<div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
											<label>Kolom :</label>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<div class="form-line">
												<select class="form-control show-tick" name="kolom" id="kolom" required>
													<option value="nama_dosen">Nama Dosen</option>			
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
											<a href="Dosen/cetakDsn.php" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i> Export All</a>  
										</div>
									</div>
								</div>	
							 </form>
							 
							 <hr>
							<table id="example" border="1" class="table table-bordered" style="border-collapse:collapse" align="center">
								<thead>
									<th class="text-center" style="vertical-align:middle">No</th>
									<th class="text-center" style="vertical-align:middle">Kode Dosen</th>
									<th class="text-center" style="vertical-align:middle">Password</th>
									<th class="text-center" style="vertical-align:middle">Nama</th>
									<th class="text-center" style="vertical-align:middle">Jenis Kelamin</th>
									<th class="text-center" style="vertical-align:middle">Aksi</th>
								</thead>
								<tbody>
									<?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$selectMhs = "SELECT * FROM tbl_dosen";
										$query = mysqli_query($koneksi, $selectMhs);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['kode_dosen']; ?></td>
										<td class="text-center"><?php echo $data['password']; ?></td>
										<td class="text-center"><?php echo $data['nama_dosen']; ?></td>
										<td class="text-center"><?php echo $data['jenis_kelamin']; ?></td>
										<td class="text-center">
										<a href="index.php?halaman=edit-dosen&kode_dosen=<?php echo $data['kode_dosen']; ?>" class="btn btn-info" ><i class="material-icons">edit</i></a>
										<a onclick="return konfirmasi()" href="Dosen/hapus.php?kode_dosen=<?php echo $data['kode_dosen']; ?>" class="btn btn-danger" ><i class="material-icons">delete_forever</i></a>
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


