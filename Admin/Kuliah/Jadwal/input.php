<?php
	$select = "SELECT max(kode_jadwal) as kodeTerbesar FROM tbl_jadwal";
	$query = mysqli_query($koneksi, $select);
	$data = mysqli_fetch_array($query);
	$kode_jadwal = $data['kodeTerbesar'];
	
	
	$urutan = (int) substr($kode_jadwal, 3, 4);
	
	$urutan++;
	
	$huruf = "JDW";
	$kode_jadwal = $huruf.sprintf("%04s", $urutan);
?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INPUT JADWAL
                            </h2>
                        </div>
                        <div class="body">
							<form class="form-horizontal" action="" method="POST">
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
						
						<?php
							if (isset($_POST['lanjut'])){
								$prodi 	 	= $_POST['prodi'];
							}else{
								$prodi 	 	= "";
							}
						?>
						
						<div class="body">
                            <form class="form-horizontal" action="" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kode_jadwal">Kode Jadwal :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" maxlength="10" id="kode_jadwal" name="kode_jadwal" <?php if(!isset($_POST['lanjut'])){echo "placeholder='Silahkan Pilih Program Studi' disabled";}else{ echo "value='". $kode_jadwal."'";}?> class="form-control" readonly>
												<input type="hidden" value="<?= $prodi;?>" id="prodi" name="prodi">
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
                                                <select class="form-control show-tick" name="kelas" id="kelas" <?php if(!isset($_POST['lanjut'])){echo "disabled";}?> required>
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
		$kode_jadwal	= $_POST['kode_jadwal'];
		$prodi    		= $_POST['prodi'];
		$kelas    		= $_POST['kelas'];
		
		if($prodi == ""){
			echo "<script>window.alert('Maaf Form Harus di Isi!')
			window.location='index.php?halaman=input-jadwal'</script>";
		}else{
			//validasi data
			$select = mysqli_query($koneksi,"SELECT * FROM tbl_jadwal WHERE kode_jadwal='$kode_jadwal'");
			$cek = mysqli_num_rows($select);
			if($cek > 0){
				echo "<script>window.alert('Kode Jadwal Sudah Ada')
				window.location='index.php?halaman=input-jadwal'</script>";
			}else{
				//mysqli_query($koneksi, query)
				//INSERT INTO nama_tabel (field) VALUES (nilai yang akan dimasukan)

				$query = "INSERT INTO tbl_jadwal (kode_jadwal, kode_prodi, kode_kelas) 
				VALUES ('$kode_jadwal','$prodi','$kelas')";
				$simpan = mysqli_query($koneksi, $query);
				if($simpan)
				{
					?>   
					<script>
					alert("Data Berhasil Di simpan");
					window.location = "index.php?halaman=input-jadwal";
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
