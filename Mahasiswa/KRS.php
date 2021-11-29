<div class="container-fluid">
            <div class="block-header">
                <h1>Kartu Rencana Studi</h1>
            </div>
</div>
<!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Semester 1
                            </h2>
                        </div>
									
                        <div class="body table-responsive">
							<form action="cetakCariKrs.php?npm=<?= $username;?>&semester=1" method="POST">		
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKrs.php?npm=<?= $username;?>&semester=1" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>	
							 </form>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Matakuliah</th>
                                        <th>SKS</th>
                                        <th>Nama Dosen</th>
                                    </tr>
                                </thead>
                                <tbody> 
									<?php
									    $select = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_kelas, tbl_detail_kelas.kode_prodi, tbl_prodi.nama_prodi, tbl_krs.kode_krs, tbl_krs.tahun_akademik, tbl_krs.semester, tbl_detail_krs.kode_matakuliah, tbl_matakuliah.matakuliah, tbl_detail_krs.SKS, tbl_detail_krs.kode_dosen, tbl_dosen.nama_dosen FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas INNER JOIN tbl_detail_krs ON tbl_krs.kode_krs = tbl_detail_krs.kode_krs INNER JOIN tbl_matakuliah ON tbl_detail_krs.kode_matakuliah = tbl_matakuliah.kode_matakuliah INNER JOIN tbl_dosen ON tbl_detail_krs.kode_dosen = tbl_dosen.kode_dosen WHERE NPM='$username' AND semester='1'";
										$query = mysqli_query($koneksi, $select);
										
										$no = 1;
										$a = 0;
										$cek = mysqli_num_rows($query);
										if($cek > 0){
											while($data = mysqli_fetch_array($query))
											{
												$a++;
												$total[$a] = $data['SKS'];
												$totalSKS = array_sum($total);
									?>
									<tr>
                                        <td class="text-center"><?php echo $no; ?></td>
										<td class="text-center"><?php echo $data['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data['SKS']; ?></td>
										<td class="text-center"><?php echo $data['nama_dosen']; ?></td>
                                    </tr>
									<?php 
											$no++; 
											}
										} else {
											$totalSKS = 0;
										
										}									
									?>
									
                                </tbody>
                            </table>
							
							<table class="table table-bordered">
									<tr>
                                        <td class="text-center" colspan="2"><b>Jumlah Kredit yang Diambil</b></td>
										<td class="text-center"><?php  echo $totalSKS; ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
	
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Semester 2
                            </h2>
                        </div>
									
                        <div class="body table-responsive">
							<form action="cetakCariKrs.php?npm=<?= $username;?>&semester=2" method="POST">		
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKrs.php?npm=<?= $username;?>&semester=2" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>	
							 </form>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Matakuliah</th>
                                        <th>SKS</th>
                                        <th>Nama Dosen</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
									    $select2 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_kelas, tbl_detail_kelas.kode_prodi, tbl_prodi.nama_prodi, tbl_krs.kode_krs, tbl_krs.tahun_akademik, tbl_krs.semester, tbl_detail_krs.kode_matakuliah, tbl_matakuliah.matakuliah, tbl_detail_krs.SKS, tbl_detail_krs.kode_dosen, tbl_dosen.nama_dosen FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas INNER JOIN tbl_detail_krs ON tbl_krs.kode_krs = tbl_detail_krs.kode_krs INNER JOIN tbl_matakuliah ON tbl_detail_krs.kode_matakuliah = tbl_matakuliah.kode_matakuliah INNER JOIN tbl_dosen ON tbl_detail_krs.kode_dosen = tbl_dosen.kode_dosen WHERE NPM='$username' AND semester='2'";
										$query2 = mysqli_query($koneksi, $select2);
									
										//mysqli_fetch_array($variabel yang menampung fungsi query)
										
										//mysli_query($koneksi, "query")
										$no2 = 1;
										$a2 = 0;
										$cek2 = mysqli_num_rows($query2);
										if($cek2 > 0){
											while($data2 = mysqli_fetch_array($query2))
											{
												$a2++;
												$total2[$a2] = $data2['SKS'];
												$totalSKS2 = array_sum($total2);
									?> 
									<tr>
                                        <td class="text-center"><?php echo $no2; ?></td>
										<td class="text-center"><?php echo $data2['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data2['SKS']; ?></td>
										<td class="text-center"><?php echo $data2['nama_dosen']; ?></td>
                                    </tr>
									<?php 
											$no2++; 
											}
										} else {
											$totalSKS2 = 0;
											
										}									
									?>
									
                                </tbody>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>Jumlah Kredit yang Diambil</b></td>
										<td class="text-center"><?php  echo $totalSKS2; ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Semester 3
                            </h2>
                        </div>
									
                        <div class="body table-responsive">
							<form action="cetakCariKrs.php?npm=<?= $username;?>&semester=3" method="POST">		
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKrs.php?npm=<?= $username;?>&semester=3" target="_blank"  class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>	
							 </form>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Matakuliah</th>
                                        <th>SKS</th>
                                        <th>Nama Dosen</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$select3 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_kelas, tbl_detail_kelas.kode_prodi, tbl_prodi.nama_prodi, tbl_krs.kode_krs, tbl_krs.tahun_akademik, tbl_krs.semester, tbl_detail_krs.kode_matakuliah, tbl_matakuliah.matakuliah, tbl_detail_krs.SKS, tbl_detail_krs.kode_dosen, tbl_dosen.nama_dosen FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas INNER JOIN tbl_detail_krs ON tbl_krs.kode_krs = tbl_detail_krs.kode_krs INNER JOIN tbl_matakuliah ON tbl_detail_krs.kode_matakuliah = tbl_matakuliah.kode_matakuliah INNER JOIN tbl_dosen ON tbl_detail_krs.kode_dosen = tbl_dosen.kode_dosen WHERE NPM='$username' AND semester='3'";
										$query3 = mysqli_query($koneksi, $select3);
										
										$no3 = 1;
										$a3 = 0;
										$cek3 = mysqli_num_rows($query3);
										if($cek3 > 0){
											while($data3 = mysqli_fetch_array($query3))
											{
												$a3++;
												$total3[$a3] = $data3['SKS'];
												$totalSKS3 = array_sum($total3);
									?> 
									<tr>
                                        <td class="text-center"><?php echo $no3; ?></td>
										<td class="text-center"><?php echo $data3['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data3['SKS']; ?></td>
										<td class="text-center"><?php echo $data3['nama_dosen']; ?></td>
                                    </tr>
									<?php 
											$no3++; 
											}
										} else {
											$totalSKS3 = 0;
											
										}									?>
                                </tbody>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>Jumlah Kredit yang Diambil</b></td>
										<td class="text-center"><?php  echo $totalSKS3; ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Semester 4
                            </h2>
                        </div>
									
                        <div class="body table-responsive">
							<form action="cetakCariKrs.php?npm=<?= $username;?>&semester=4" method="POST">		
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKrs.php?npm=<?= $username;?>&semester=4" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>	
							 </form>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Matakuliah</th>
                                        <th>SKS</th>
                                        <th>Nama Dosen</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$select4 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_kelas, tbl_detail_kelas.kode_prodi, tbl_prodi.nama_prodi, tbl_krs.kode_krs, tbl_krs.tahun_akademik, tbl_krs.semester, tbl_detail_krs.kode_matakuliah, tbl_matakuliah.matakuliah, tbl_detail_krs.SKS, tbl_detail_krs.kode_dosen, tbl_dosen.nama_dosen FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas INNER JOIN tbl_detail_krs ON tbl_krs.kode_krs = tbl_detail_krs.kode_krs INNER JOIN tbl_matakuliah ON tbl_detail_krs.kode_matakuliah = tbl_matakuliah.kode_matakuliah INNER JOIN tbl_dosen ON tbl_detail_krs.kode_dosen = tbl_dosen.kode_dosen WHERE NPM='$username' AND semester='4'";
										$query4 = mysqli_query($koneksi, $select4);
									
										$no4 = 1;
										$a4 = 0;
										$cek4 = mysqli_num_rows($query4);
										if($cek4 > 0){
											while($data4 = mysqli_fetch_array($query4))
											{
												$a4++;
												$total4[$a4] = $data4['SKS'];
												$totalSKS4 = array_sum($total4);
									?> 
									<tr>
                                        <td class="text-center"><?php echo $no4; ?></td>
										<td class="text-center"><?php echo $data4['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data4['SKS']; ?></td>
										<td class="text-center"><?php echo $data4['nama_dosen']; ?></td>
                                    </tr>
									<?php 
											$no4++; 
											}
										} else {
											$totalSKS4 = 0;
											
										}									
									?>
                                </tbody>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>Jumlah Kredit yang Diambil</b></td>
										<td class="text-center"><?php  echo $totalSKS4; ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Semester 5
                            </h2>
                        </div>
									
                        <div class="body table-responsive">
							<form action="cetakCariKrs.php?npm=<?= $username;?>&semester=5" method="POST">		
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKrs.php?npm=<?= $username;?>&semester=5" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>	
							 </form>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Matakuliah</th>
                                        <th>SKS</th>
                                        <th>Nama Dosen</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$select5 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_kelas, tbl_detail_kelas.kode_prodi, tbl_prodi.nama_prodi, tbl_krs.kode_krs, tbl_krs.tahun_akademik, tbl_krs.semester, tbl_detail_krs.kode_matakuliah, tbl_matakuliah.matakuliah, tbl_detail_krs.SKS, tbl_detail_krs.kode_dosen, tbl_dosen.nama_dosen FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas INNER JOIN tbl_detail_krs ON tbl_krs.kode_krs = tbl_detail_krs.kode_krs INNER JOIN tbl_matakuliah ON tbl_detail_krs.kode_matakuliah = tbl_matakuliah.kode_matakuliah INNER JOIN tbl_dosen ON tbl_detail_krs.kode_dosen = tbl_dosen.kode_dosen WHERE NPM='$username' AND semester='5'";
										$query5 = mysqli_query($koneksi, $select5);
									
										$no5 = 1;
										$a5 = 0;
										$cek5 = mysqli_num_rows($query5);
										if($cek5 > 0){
											while($data5 = mysqli_fetch_array($query5))
											{
												$a5++;
												$total5[$a5] = $data5['SKS'];
												$totalSKS5 = array_sum($total5);
									?> 
									<tr>
                                        <td class="text-center"><?php echo $no5; ?></td>
										<td class="text-center"><?php echo $data5['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data5['SKS']; ?></td>
										<td class="text-center"><?php echo $data5['nama_dosen']; ?></td>
                                    </tr>
									<?php 
											$no5++; 
											}
										} else {
											$totalSKS5 = 0;
											
										}									
									?>
                                </tbody>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>Jumlah Kredit yang Diambil</b></td>
										<td class="text-center"><?php  echo $totalSKS5; ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Semester 6
                            </h2>
                        </div>
									
                        <div class="body table-responsive">
							<form action="cetakCariKrs.php?npm=<?= $username;?>&semester=6" method="POST">		
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKrs.php?npm=<?= $username;?>&semester=6" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>	
							 </form>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Matakuliah</th>
                                        <th>SKS</th>
                                        <th>Nama Dosen</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$select6 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_kelas, tbl_detail_kelas.kode_prodi, tbl_prodi.nama_prodi, tbl_krs.kode_krs, tbl_krs.tahun_akademik, tbl_krs.semester, tbl_detail_krs.kode_matakuliah, tbl_matakuliah.matakuliah, tbl_detail_krs.SKS, tbl_detail_krs.kode_dosen, tbl_dosen.nama_dosen FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas INNER JOIN tbl_detail_krs ON tbl_krs.kode_krs = tbl_detail_krs.kode_krs INNER JOIN tbl_matakuliah ON tbl_detail_krs.kode_matakuliah = tbl_matakuliah.kode_matakuliah INNER JOIN tbl_dosen ON tbl_detail_krs.kode_dosen = tbl_dosen.kode_dosen WHERE NPM='$username' AND semester='6'";
										$query6 = mysqli_query($koneksi, $select6);
									
										$no6 = 1;
										$a6 = 0;
										$cek6 = mysqli_num_rows($query6);
										if($cek6 > 0){
											while($data6 = mysqli_fetch_array($query6))
											{
												$a6++;
												$total6[$a6] = $data6['SKS'];
												$totalSKS6 = array_sum($total6);
									?> 
									<tr>
                                        <td class="text-center"><?php echo $no6; ?></td>
										<td class="text-center"><?php echo $data6['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data6['SKS']; ?></td>
										<td class="text-center"><?php echo $data6['nama_dosen']; ?></td>
                                    </tr>
									<?php 
											$no6++; 
											}
										} else {
											$totalSKS6 = 0;
											
										}									
									?>
                                </tbody>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>Jumlah Kredit yang Diambil</b></td>
										<td class="text-center"><?php  echo $totalSKS6; ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Semester 7
                            </h2>
                        </div>
									
                        <div class="body table-responsive">
							<form action="cetakCariKrs.php?npm=<?= $username;?>&semester=7" method="POST">		
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKrs.php?npm=<?= $username;?>&semester=7" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>	
							 </form>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Matakuliah</th>
                                        <th>SKS</th>
                                        <th>Nama Dosen</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$select7 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_kelas, tbl_detail_kelas.kode_prodi, tbl_prodi.nama_prodi, tbl_krs.kode_krs, tbl_krs.tahun_akademik, tbl_krs.semester, tbl_detail_krs.kode_matakuliah, tbl_matakuliah.matakuliah, tbl_detail_krs.SKS, tbl_detail_krs.kode_dosen, tbl_dosen.nama_dosen FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas INNER JOIN tbl_detail_krs ON tbl_krs.kode_krs = tbl_detail_krs.kode_krs INNER JOIN tbl_matakuliah ON tbl_detail_krs.kode_matakuliah = tbl_matakuliah.kode_matakuliah INNER JOIN tbl_dosen ON tbl_detail_krs.kode_dosen = tbl_dosen.kode_dosen WHERE NPM='$username' AND semester='7'";
										$query7 = mysqli_query($koneksi, $select7);
									
										$no7 = 1;
										$a7 = 0;
										$cek7 = mysqli_num_rows($query7);
										if($cek7 > 0){
											while($data7 = mysqli_fetch_array($query7))
											{
												$a7++;
												$total7[$a7] = $data7['SKS'];
												$totalSKS7 = array_sum($total7);
									?> 
									<tr>
                                        <td class="text-center"><?php echo $no7; ?></td>
										<td class="text-center"><?php echo $data7['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data7['SKS']; ?></td>
										<td class="text-center"><?php echo $data7['nama_dosen']; ?></td>
                                    </tr>
									<?php 
											$no7++; 
											}
										} else {
											$totalSKS7 = 0;
											
										}									
									?>
                                </tbody>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>Jumlah Kredit yang Diambil</b></td>
										<td class="text-center"><?php  echo $totalSKS7; ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Semester 8
                            </h2>
                        </div>
									
                        <div class="body table-responsive">
							<form action="cetakCariKrs.php?npm=<?= $username;?>&semester=8" method="POST">		
								<div class="row clearfix">
									<div class="col-md-2">
										<div class="form-group">
											<a href="cetakKrs.php?npm=<?= $username;?>&semester=8" target="_blank" class="btn btn-info" ><i class="material-icons">library_books</i>  Export</a>  
										</div>
									</div>
								</div>	
							 </form>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Matakuliah</th>
                                        <th>SKS</th>
                                        <th>Nama Dosen</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$select8 = "SELECT tbl_detail_kelas.NPM, tbl_detail_kelas.kode_kelas, tbl_detail_kelas.kode_prodi, tbl_prodi.nama_prodi, tbl_krs.kode_krs, tbl_krs.tahun_akademik, tbl_krs.semester, tbl_detail_krs.kode_matakuliah, tbl_matakuliah.matakuliah, tbl_detail_krs.SKS, tbl_detail_krs.kode_dosen, tbl_dosen.nama_dosen FROM tbl_detail_kelas INNER JOIN tbl_prodi ON tbl_detail_kelas.kode_prodi = tbl_prodi.kode_prodi INNER JOIN tbl_krs ON tbl_detail_kelas.kode_kelas = tbl_krs.kode_kelas INNER JOIN tbl_detail_krs ON tbl_krs.kode_krs = tbl_detail_krs.kode_krs INNER JOIN tbl_matakuliah ON tbl_detail_krs.kode_matakuliah = tbl_matakuliah.kode_matakuliah INNER JOIN tbl_dosen ON tbl_detail_krs.kode_dosen = tbl_dosen.kode_dosen WHERE NPM='$username' AND semester='8'";
										$query8 = mysqli_query($koneksi, $select8);
									
										$no8 = 1;
										$a8 = 0;
										$cek8 = mysqli_num_rows($query8);
										if($cek8 > 0){
											while($data8 = mysqli_fetch_array($query8))
											{
												$a8++;
												$total8[$a8] = $data8['SKS'];
												$totalSKS8 = array_sum($total8);
									?> 
									<tr>
                                        <td class="text-center"><?php echo $no8; ?></td>
										<td class="text-center"><?php echo $data8['matakuliah']; ?></td>
										<td class="text-center"><?php echo $data8['SKS']; ?></td>
										<td class="text-center"><?php echo $data8['nama_dosen']; ?></td>
                                    </tr>
									<?php 
											$no8++; 
											}
										} else {
											$totalSKS8 = 0;
											
										}									
									?>
                                </tbody>
                            </table>
							
							<table class="table table-bordered ">
									<tr>
                                        <td class="text-center" colspan="2"><b>Jumlah Kredit yang Diambil</b></td>
										<td class="text-center"><?php  echo $totalSKS8; ?></td>
                                    </tr>
							</table>
                        </div>
                    </div>
                </div>
            </div>
<!-- #END# Bordered Table -->