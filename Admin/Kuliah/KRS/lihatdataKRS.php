<?php
    $kode_krs  	= $_GET['kode_krs'];
	$nama_prodi = $_GET['nama_prodi'];
	$semester 	= $_GET['semester'];
?>  
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Detail KRS
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">	
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="Kuliah/KRS/cetakKrs.php?kode_krs=<?= $kode_krs;?>&nama_prodi=<?= $nama_prodi;?>&semester=<?php echo $semester; ?>" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>	
								<a href="index.php?halaman=input-detailKRS" class="btn btn-success btn-sm">
								<i class="add_box"></i>Tambah Data</a>
								<hr>
							<table border="1" class="table table-bordered" style="border-collapse:collapse" align="center">
								<thead>
									<th class="text-center" style="vertical-align:middle">No</th>
									<th class="text-center" style="vertical-align:middle">Kode KRS</th>
									<th class="text-center" style="vertical-align:middle">Matakuliah</th>
									<th class="text-center" style="vertical-align:middle">SKS</th>
									<th class="text-center" style="vertical-align:middle">Dosen Pengampu</th>
									<th class="text-center" style="vertical-align:middle">Aksi</th>
								</thead>
								<tbody>
									<?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$select = "SELECT kode_krs, tbl_matakuliah.kode_matakuliah, matakuliah, SKS,
													tbl_dosen.kode_dosen, nama_dosen FROM tbl_detail_krs
													INNER JOIN tbl_matakuliah
													ON tbl_detail_krs.kode_matakuliah=tbl_matakuliah.kode_matakuliah
													INNER JOIN tbl_dosen
													ON tbl_detail_krs.kode_dosen=tbl_dosen.kode_dosen
													WHERE kode_krs='$kode_krs'";
										$query = mysqli_query($koneksi, $select);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['kode_krs']; ?></td>
										<td class="text-center"><?php echo $data['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data['SKS']; ?></td>
										<td class="text-center"><?php echo $data['nama_dosen']; ?></td>
										
										<td class="text-center">
										<a href="index.php?halaman=edit-detailKRS&kode_krs=<?php echo $data['kode_krs'];?>&kode_matakuliah=<?php echo $data['kode_matakuliah'];?>&dosen=<?php echo $data['kode_dosen'];?>" class="btn btn-info" ><i class="material-icons">edit</i></a>
										<a onclick="return konfirmasi()" href="Kuliah/DetailKRS/hapus.php?kode_krs=<?php echo $data['kode_krs']; ?>&kode_matakuliah=<?php echo $data['kode_matakuliah'];?>&dosen=<?php echo $data['kode_dosen'];?>" class="btn btn-danger" ><i class="material-icons">delete_forever</i></a>
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