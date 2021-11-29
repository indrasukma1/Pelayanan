<?php
	$select = "SELECT max(kode_krs) as kodeTerbesar FROM tbl_krs";
	$query = mysqli_query($koneksi, $select);
	$data = mysqli_fetch_array($query);
	$kode_terbesar = $data['kodeTerbesar'];
	
	$urutan = (int) substr($kode_terbesar, 3, 4);
	
	$urutan++;
	
	$huruf = "KRS";
	$kode_krs = $huruf.sprintf("%04s", $urutan);
?>

			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INPUT KARTU RENCANA STUDI
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kode_krs">Kode KRS :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" maxlength="10" value="<?= $kode_krs;?>" id="kode_krs" name="kode_krs" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="prodi">Program Studi :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="prodi" id="prodi" required>
													<option value="">-- Pilih Program Studi --</option>
													<?php
														$prodi = "SELECT * FROM tbl_prodi";
														$query	= mysqli_query($koneksi, $prodi);
														while($data = mysqli_fetch_array($query)){
													?>
													<option <?php 
																if(isset($_POST['lanjut'])){
																	$kode_prodi = $_POST['prodi'];
																	if($kode_prodi == $data['kode_prodi']){echo "selected";}}
															?> value="<?= $data['kode_prodi'] ?>"><?= $data['nama_prodi']; ?>
													</option>
														<?php } ?>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" name="lanjut" class="btn btn-primary m-t-15 waves-effect">OK</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			
			<?php
				if (isset($_POST['lanjut'])){
					$kode_krs 	= $_POST['kode_krs'];
					$prodi 	 	= $_POST['prodi'];
				}else{
					$kode_krs 	= "";
					$prodi 	 	= "";
				}
			?>
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form class="form-horizontal" action="" method="POST">
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kelas">Kelas :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="kelas" id="kelas" required <?php if(!isset($_POST['lanjut'])){
												echo "disabled";}?>>
													<?php
														if(!isset($_POST['lanjut'])){
															echo "<option value=''>Silahkan Pilih Program Studi</option>";
														}else{ 
															echo "<option value=''>-- Pilih Kelas --</option>";
														}
														$kelas = "SELECT * FROM tbl_kelas WHERE kode_prodi='$prodi'";
														$query	= mysqli_query($koneksi, $kelas);
														while($data = mysqli_fetch_array($query)){
													?>
													<option value="<?= $data['kode_kelas'] ?>"><?= $data['kode_kelas']; ?>
													</option>
														<?php } ?>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="tahun_akademik">Tahun Akademik:</label>
                                    </div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" maxlength="10" id="tahun_akademik" name="tahun_akademik" class="form-control" <?php if(!isset($_POST['lanjut'])){echo "placeholder='Silahkan Pilih Program Studi' disabled";}else{echo "placeholder='Silahkan Masukan Tahun Akademik'";}?> required>
												<input type="hidden" maxlength="10" value="<?= $kode_krs;?>" id="kode_krs" name="kode_krs">
												<input type="hidden" value="<?= $prodi;?>" id="prodi" name="prodi">
											</div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="semester">Semester :</label>
                                    </div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" maxlength="2" id="semester" name="semester" class="form-control" <?php if(!isset($_POST['lanjut'])){echo "placeholder='Silahkan Pilih Program Studi' disabled";}else{echo "placeholder='Silahkan Masukan Semester'";}?> required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" name="simpan" class="btn btn-primary m-t-15 waves-effect">SIMPAN</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			
			
			
<?php
//proses
	if(isset($_POST['simpan'])) {
		$kode_krs	   	= $_POST['kode_krs'];
		$kode_prodi    	= $_POST['prodi'];
		$kode_kelas    	= $_POST['kelas'];
		$tahun    		= $_POST['tahun_akademik'];
		$semester     	= $_POST['semester'];
		
		if($kode_krs == ""){
			echo "<script>window.alert('Maaf Form Harus di Isi!')
			window.location='index.php?halaman=input-KRS'</script>";
		}else{
			//validasi data
			$select = mysqli_query($koneksi,"SELECT * FROM tbl_krs WHERE kode_krs='$kode_krs'");
			$cek = mysqli_num_rows($select);
			if($cek > 0){
				echo "<script>window.alert('Kode KRS Sudah Ada')
				window.location='index.php?halaman=input-KRS'</script>";
			}else{
				//mysqli_query($koneksi, query)
				//INSERT INTO nama_tabel (field) VALUES (nilai yang akan dimasukan)

				$query = "INSERT INTO tbl_krs (kode_krs, kode_prodi, kode_kelas, tahun_akademik, semester) 
				VALUES ('$kode_krs','$kode_prodi','$kode_kelas','$tahun','$semester')";
				$simpan = mysqli_query($koneksi, $query);
				if($simpan)
				{
					?>   
					<script>
					alert("Data Berhasil Di simpan");
					window.location = "index.php?halaman=input-KRS";
					</script>
					<?php
				}
				else{
					echo "Data Error".mysqli_error();
				}
			}
		}
	}
	
?>

<!--
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="prodi">Program Studi :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="prodi" id="prodi" required>
													<option value="">-- Pilih Program Studi --</option>
													<?php
														$prodi = "SELECT * FROM tbl_prodi";
														$query	= mysqli_query($koneksi, $prodi);
														while($data = mysqli_fetch_array($query)){
													?>
													<option value="<?= $data['kode_prodi'] ?>"><?= $data['nama_prodi']; ?>
													</option>
														<?php } ?>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kelas">Kelas :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="kelas" id="kelas" required>
													<option value="">-- Pilih Kelas --</option>
													<?php
														$kelas = "SELECT * FROM tbl_kelas";
														$query	= mysqli_query($koneksi, $kelas);
														while($data = mysqli_fetch_array($query)){
													?>
													<option value="<?= $data['kode_kelas'] ?>"><?= $data['kode_kelas']; ?>
													</option>
														<?php } ?>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->