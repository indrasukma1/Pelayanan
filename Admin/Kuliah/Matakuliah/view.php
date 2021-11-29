
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Matakuliah
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
							<table border="1" class="table table-bordered" style="border-collapse:collapse" align="center">
								<thead>
									<th class="text-center" style="vertical-align:middle">No</th>
									<th class="text-center" style="vertical-align:middle">Kode Matakuliah</th>
									<th class="text-center" style="vertical-align:middle">Nama Matakuliah</th>
									<th class="text-center" style="vertical-align:middle">Aksi</th>
								</thead>
								<tbody>
									<?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$select = "SELECT * FROM tbl_matakuliah";
										$query = mysqli_query($koneksi, $select);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['kode_matakuliah']; ?></td>
										<td class="text-center"><?php echo $data['matakuliah']; ?></td>
										<td class="text-center">
										<a href="index.php?halaman=edit-matakuliah&kode_matkul=<?php echo $data['kode_matakuliah']; ?>" class="btn btn-info" ><i class="material-icons">edit</i></a>
										<a onclick="return konfirmasi()" href="Kuliah/Matakuliah/hapus.php?kode_matkul=<?php echo $data['kode_matakuliah']; ?>" class="btn btn-danger" ><i class="material-icons">delete_forever</i></a>
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


