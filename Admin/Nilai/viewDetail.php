<?php
	$matkul 		= $_GET['matkul'];
	$nama			= $_GET['mhs'];
	$kode_matkul	= $_GET['kode_matkul'];
	$npm			= $_GET['npm'];
?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Nilai
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
							<table border="1" class="table table-bordered" style="border-collapse:collapse" align="center">
								<thead>
									<tr>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align:middle">Matakuliah</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">Semester</th>
										<th colspan="6" class="text-center">Aspek yang Dinilai</th>
										<th colspan="2" class="text-center">Nilai Akhir</th>
										<th rowspan="2" class="text-center" style="vertical-align:middle">Aksi</th>
                                    </tr>
									<tr>
                                        <th class="text-center">K</th>
                                        <th class="text-center">T</th>
										<th class="text-center">M</th>
										<th class="text-center">Md</th>
										<th class="text-center">2A</th>
										<th class="text-center">Jumlah</th>
										<th class="text-center">Angka</th>
										<th class="text-center">Huruf</th>
                                    </tr>
								</thead>
								<tbody>
									<?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$select = "SELECT * FROM tbl_nilai
													WHERE kode_dosen='$user' AND kode_matakuliah='$kode_matkul' AND NPM='$npm'";
										$query = mysqli_query($koneksi, $select);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
											$jumlah = $data['nilai_kehadiran'] + $data['tugas_terstruktur'] + $data['tugas_mandiri'] + $data['UTS'] + $data['UAS'];
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $matkul; ?></td>
										<td class="text-center"><?php echo $data['semester']; ?></td>
										<td class="text-center"><?php echo $data['nilai_kehadiran']; ?></td>
										<td class="text-center"><?php echo $data['tugas_terstruktur']; ?></td>
										<td class="text-center"><?php echo $data['tugas_mandiri']; ?></td>
										<td class="text-center"><?php echo $data['UTS']; ?></td>
										<td class="text-center"><?php echo $data['UAS']; ?></td>
										<td class="text-center"><?php echo $jumlah; ?></td>
										<td class="text-center"><?php echo $data['nilai_akhir']; ?></td>
										<td class="text-center"><?php  ?></td>
										<td class="text-center">
										<a href="index.php?halaman=edit-nilai&matkul=<?php echo $matkul; ?>&kode_matkul=<?php echo $data['kode_matakuliah']; ?>&npm=<?php echo $data['NPM']; ?>&mhs=<?php echo $nama; ?>" class="btn btn-info" ><i class="material-icons">edit</i></a>
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





