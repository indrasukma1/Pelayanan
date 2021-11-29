<?php
    $kode_prodi    	  = $_GET['kode_prodi'];
	$nama_prodi    	  = $_GET['nama_prodi'];
?>  
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Kelas
                            </h2>
                        </div>
                        <div class="body table-responsive">
						<a href="index.php?halaman=input-kelas&kode_prodi=<?= $kode_prodi; ?>" class="btn btn-success btn-sm">
								<i class="add_box"></i>Tambah Data</a>
								<hr>
							<table border="1" class="table table-bordered" style="border-collapse:collapse" align="center">
							<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="prodi">Program Studi :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $nama_prodi;?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<thead>
									<th class="text-center" style="vertical-align:middle">No</th>
									<th class="text-center" style="vertical-align:middle">Kode Prodi</th>
									<th class="text-center" style="vertical-align:middle">Kode Kelas</th>
									<th class="text-center" style="vertical-align:middle">Jumlah Mahasiswa</th>
									<th class="text-center" style="vertical-align:middle">Aksi</th>
								</thead>
								<tbody>
									<?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$prodi = "SELECT * FROM tbl_kelas WHERE kode_prodi='$kode_prodi'";
										$query = mysqli_query($koneksi, $prodi);
										
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
											$kode_kelas = $data['kode_kelas'];
											$selectKelas = "SELECT COUNT(NPM) AS NPM FROM tbl_detail_kelas WHERE kode_kelas='$kode_kelas' AND kode_prodi='$kode_prodi'";
											$q = mysqli_query($koneksi, $selectKelas);
											$count = mysqli_fetch_array($q);
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['kode_prodi']; ?></td>
										<td class="text-center"><?php echo $data['kode_kelas']; ?></td>
										<td class="text-center"><?php echo $count['NPM']; ?></td>
										<td class="text-center">
										<a href="index.php?halaman=view-detailKelas&kode_prodi=<?php echo $data['kode_prodi']; ?>&nama_prodi=<?php echo $nama_prodi; ?>&kode_kelas=<?php echo $data['kode_kelas']; ?>" class="btn btn-info" >DETAIL</a>
										<a onclick="return konfirmasi()" href="Prodi/Kelas/hapus.php?kode_prodi=<?php echo $data['kode_prodi']; ?>&kode_kelas=<?php echo $data['kode_kelas']; ?>&nama_prodi=<?php echo $nama_prodi; ?>" class="btn btn-danger" ><i class="material-icons">delete_forever</i></a>
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


