<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Nilai
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
							 <table id="example" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
									<th class="text-center" style="vertical-align:middle">No</th>
									<th class="text-center" style="vertical-align:middle">Program Studi</th>
									<th class="text-center" style="vertical-align:middle">Semester</th>
									<th class="text-center" style="vertical-align:middle">Kelas</th>
									<th class="text-center" style="vertical-align:middle">Matakuliah</th>
									<th class="text-center" style="vertical-align:middle">Nama Mahasiswa</th>
									<th class="text-center" style="vertical-align:middle">Aksi</th>
								</thead>
								<tbody>
									<?php
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$select = "SELECT tbl_detail_krs.kode_dosen, tbl_detail_krs.kode_matakuliah, tbl_matakuliah.matakuliah, tbl_krs.kode_prodi, 
													tbl_prodi.nama_prodi, tbl_krs.kode_kelas, tbl_krs.semester, tbl_detail_kelas.NPM, tbl_mahasiswa.Nama FROM tbl_detail_krs 
													INNER JOIN tbl_matakuliah ON tbl_detail_krs.kode_matakuliah=tbl_matakuliah.kode_matakuliah 
													INNER JOIN tbl_krs ON tbl_detail_krs.kode_krs=tbl_krs.kode_krs 
													INNER JOIN tbl_prodi ON tbl_krs.kode_prodi=tbl_prodi.kode_prodi
													INNER JOIN tbl_detail_kelas ON tbl_krs.kode_kelas=tbl_detail_kelas.kode_kelas 
													INNER JOIN tbl_mahasiswa ON tbl_detail_kelas.NPM=tbl_mahasiswa.NPM 
													WHERE kode_dosen='$user'";
										$query = mysqli_query($koneksi, $select);
										$no = 1;
										while($data = mysqli_fetch_array($query))
										{
									?>   
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['nama_prodi']; ?></td>
										<td class="text-center"><?php echo $data['semester']; ?></td>
										<td class="text-center"><?php echo $data['kode_kelas']; ?></td>
										<td class="text-center"><?php echo $data['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data['Nama']; ?></td>
										<td class="text-center">
										<a href="index.php?halaman=input-nilai&matkul=<?php echo $data['matakuliah']; ?>&semester=<?php echo $data['semester']; ?>&kode_matkul=<?php echo $data['kode_matakuliah']; ?>&npm=<?php echo $data['NPM']; ?>&mhs=<?php echo $data['Nama']; ?>" class="btn btn-info btn-sm">Input Nilai</a>
										<a href="index.php?halaman=view-detailNilai&matkul=<?php echo $data['matakuliah']; ?>&kode_matkul=<?php echo $data['kode_matakuliah']; ?>&npm=<?php echo $data['NPM']; ?>&mhs=<?php echo $data['Nama']; ?>" class="btn btn-info btn-sm">Lihat Nilai</a>
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
            </div>