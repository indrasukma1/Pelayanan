<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA MAHASISWA
                            </h2>
                        </div>
                        <div class="body">
							<form action="Mahasiswa/cetakCariMhs.php" target="_blank" method="POST">		
								<div class="row clearfix">
									<div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
											<label>Kolom :</label>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<div class="form-line">
												<select class="form-control show-tick" name="kolom" id="kolom" required>
													<option value="prodi">Program Studi</option>	
													<option value="jenis_kelamin">Jenis Kelamin</option>			
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
											<a href="Mahasiswa/cetakMhs.php" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i> Export All</a>  
										</div>
									</div>
								</div>	
							 </form>
							 
							 <hr>
                            <div class="table-responsive">
							 <table id="example" class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="vertical-align:middle">No</th>
											<th class="text-center" style="vertical-align:middle">NPM</th>
											<th class="text-center" style="vertical-align:middle">Password</th>
											<th class="text-center" style="vertical-align:middle">Nama</th>
											<th class="text-center" style="vertical-align:middle">Program Studi</th>
											<th class="text-center" style="vertical-align:middle">Jenis Kelamin</th>
											<th class="text-center" style="vertical-align:middle">Tempat, Tanggal Lahir</th>
											<th class="text-center" style="vertical-align:middle">Alamat</th>
											<th class="text-center" style="vertical-align:middle">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$selectMhs = "SELECT * FROM tbl_mahasiswa ORDER BY prodi ASC";
										$query = mysqli_query($koneksi, $selectMhs);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['NPM']; ?></td>
										<td class="text-center"><?php echo $data['password']; ?></td>
										<td class="text-center"><?php echo $data['Nama']; ?></td>
										<td class="text-center"><?php echo $data['prodi']; ?></td>
										<td class="text-center"><?php echo $data['jenis_kelamin']; ?></td>
										<td class="text-center"><?php echo $data['tempatTglLahir']; ?></td>
										<td class="text-center"><?php echo $data['alamat']; ?></td>
										<td class="text-center">
										<a href="index.php?halaman=edit-mahasiswa&npm=<?php echo $data['NPM']; ?>" class="btn btn-info" ><i class="material-icons">edit</i></a>
										<a onclick="return konfirmasi()" href="Mahasiswa/hapus.php?npm=<?php echo $data['NPM']; ?>" class="btn btn-danger" ><i class="material-icons">delete_forever</i></a>
										</td>
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
            </div>
       