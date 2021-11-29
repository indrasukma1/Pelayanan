<?php
	$kode_jadwal = $_GET['kode_jadwal'];
?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Detail Jadwal
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
						<form action="Kuliah/Jadwal/cetakCariJadwal.php?kode_jadwal=<?= $kode_jadwal;?>" target="_blank" method="POST">		
								<div class="row clearfix">
									<div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
											<label>Kolom :</label>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<div class="form-line">
												<select class="form-control show-tick" name="kolom" id="kolom" required>
													<option value="semester">Semester</option>		
													<option value="nama_dosen">Dosen Pengampu</option>
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
											<a href="Kuliah/Jadwal/cetakJadwal.php?kode_jadwal=<?= $kode_jadwal;?>" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i> Export All</a>  
										</div>
									</div>
								</div>	
							 </form>
							<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kode_jadwal">Kode Jadwal :</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $kode_jadwal;?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<table border="1" class="table table-bordered" style="border-collapse:collapse" align="center">
								<thead>
									<th class="text-center" style="vertical-align:middle">No</th>
									<th class="text-center" style="vertical-align:middle">Semester</th>
									<th class="text-center" style="vertical-align:middle">Hari</th>
									<th class="text-center" style="vertical-align:middle">Waktu</th>
									<th class="text-center" style="vertical-align:middle">Matakuliah</th>
									<th class="text-center" style="vertical-align:middle">Dosen Pengampu</th>
									<th class="text-center" style="vertical-align:middle">Ruangan</th>
									<th class="text-center" style="vertical-align:middle">Aksi</th>
								</thead>
								<tbody>
									<?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$select = "SELECT semester, tbl_matakuliah.kode_matakuliah, matakuliah, 
													tbl_dosen.kode_dosen, nama_dosen, kode_ruangan, waktu, hari FROM tbl_detail_jadwal
													INNER JOIN tbl_matakuliah
													ON tbl_detail_jadwal.kode_matakuliah=tbl_matakuliah.kode_matakuliah
													INNER JOIN tbl_dosen
													ON tbl_detail_jadwal.kode_dosen=tbl_dosen.kode_dosen
													WHERE kode_jadwal='$kode_jadwal' ORDER BY semester ASC";
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
										<td class="text-center">
										<a href="index.php?halaman=edit-detailJadwal&semester=<?php echo $data['semester'];?>&hari=<?php echo $data['hari'];?>&waktu=<?php echo $data['waktu'];?>&kode_matakuliah=<?php echo $data['kode_matakuliah'];?>
										&kode_dosen=<?php echo $data['kode_dosen'];?>&kode_ruangan=<?php echo $data['kode_ruangan'];?>&kode_jadwal=<?php echo $kode_jadwal;?>" class="btn btn-info" ><i class="material-icons">edit</i></a>
										<a onclick="return konfirmasi()" href="Kuliah/Jadwal/hapusDetail.php?hari=<?php echo $data['hari'];?>&waktu=<?php echo $data['waktu'];?>&kode_matakuliah=<?php echo $data['kode_matakuliah'];?>
										&kode_dosen=<?php echo $data['kode_dosen'];?>&kode_ruangan=<?php echo $data['kode_ruangan'];?>&kode_jadwal=<?php echo $kode_jadwal;?>" class="btn btn-danger" ><i class="material-icons">delete_forever</i></a>
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