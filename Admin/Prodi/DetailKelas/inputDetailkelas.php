<?php
    $kode_prodi    	  = $_GET['kode_prodi'];
	$kode_kelas    	  = $_GET['kode_kelas'];
	$nama_prodi    	  = $_GET['nama_prodi'];
?> 
			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INPUT DETAIL KELAS
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="Prodi/DetailKelas/simpan.php?&kode_prodi=<?php echo $kode_prodi; ?>&kode_kelas=<?php echo $kode_kelas; ?>&nama_prodi=<?php echo $nama_prodi; ?>" method="POST">
							<h4>Input 1 Data</h4>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="prodi">Nama Prodi :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="prodi" id="prodi" required>
													<?php
														$prodi = "SELECT * FROM tbl_prodi WHERE kode_prodi='$kode_prodi'";
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
                                        <label for="kelas">Nama Kelas :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="kelas" id="kelas" required>
													<option value="">-- Pilih Kelas --</option>
													<?php
														$kelas = "SELECT * FROM tbl_kelas WHERE kode_prodi='$kode_prodi'";
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
                                        <label for="mahasiswa">Nama Mahasiswa :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
												<select class="form-control show-tick" name="mahasiswa" id="mahasiswa" required>
													<option value="">-- Pilih Mahasiswa --</option>
													<?php
														$selectMhs = "SELECT * FROM tbl_mahasiswa WHERE prodi='$nama_prodi'";
														$query	= mysqli_query($koneksi, $selectMhs);
														while($data = mysqli_fetch_array($query)){
													?>
													<option value="<?= $data['NPM'] ?>"><?= $data['Nama']; ?>
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
			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INPUT DETAIL KELAS
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="Prodi/DetailKelas/simpan5data.php?&kode_prodi=<?php echo $kode_prodi; ?>&kode_kelas=<?php echo $kode_kelas; ?>&nama_prodi=<?php echo $nama_prodi; ?>" method="POST">
							<h4>Input 5 Data</h4>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="prodi">Nama Prodi :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="prodi" id="prodi" required>
													<?php
														$prodi = "SELECT * FROM tbl_prodi WHERE kode_prodi='$kode_prodi'";
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
                                        <label for="kelas">Nama Kelas :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="kelas" id="kelas" required>
													<option value="">-- Pilih Kelas --</option>
													<?php
														$kelas = "SELECT * FROM tbl_kelas WHERE kode_prodi='$kode_prodi'";
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
                                        <label for="mahasiswa">Nama Mahasiswa :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
												<select class="form-control show-tick" name="mahasiswa" id="mahasiswa" required>
													<option value="">-- Pilih Mahasiswa --</option>
													<?php
														$selectMhs = "SELECT * FROM tbl_mahasiswa WHERE prodi='$nama_prodi'";
														$query	= mysqli_query($koneksi, $selectMhs);
														while($data = mysqli_fetch_array($query)){
													?>
													<option value="<?= $data['NPM'] ?>"><?= $data['Nama']; ?>
													</option>
														<?php } ?>
												</select>  
											</div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="mahasiswa2">Nama Mahasiswa :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
												<select class="form-control show-tick" name="mahasiswa2" id="mahasiswa2" required>
													<option value="">-- Pilih Mahasiswa --</option>
													<?php
														$selectMhs = "SELECT * FROM tbl_mahasiswa WHERE prodi='$nama_prodi'";
														$query	= mysqli_query($koneksi, $selectMhs);
														while($data = mysqli_fetch_array($query)){
													?>
													<option value="<?= $data['NPM'] ?>"><?= $data['Nama']; ?>
													</option>
														<?php } ?>
												</select>  
											</div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="mahasiswa3">Nama Mahasiswa :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
												<select class="form-control show-tick" name="mahasiswa3" id="mahasiswa3" required>
													<option value="">-- Pilih Mahasiswa --</option>
													<?php
														$selectMhs = "SELECT * FROM tbl_mahasiswa WHERE prodi='$nama_prodi'";
														$query	= mysqli_query($koneksi, $selectMhs);
														while($data = mysqli_fetch_array($query)){
													?>
													<option value="<?= $data['NPM'] ?>"><?= $data['Nama']; ?>
													</option>
														<?php } ?>
												</select>  
											</div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="mahasiswa4">Nama Mahasiswa :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
												<select class="form-control show-tick" name="mahasiswa4" id="mahasiswa4" required>
													<option value="">-- Pilih Mahasiswa --</option>
													<?php
														$selectMhs = "SELECT * FROM tbl_mahasiswa WHERE prodi='$nama_prodi'";
														$query	= mysqli_query($koneksi, $selectMhs);
														while($data = mysqli_fetch_array($query)){
													?>
													<option value="<?= $data['NPM'] ?>"><?= $data['Nama']; ?>
													</option>
														<?php } ?>
												</select>  
											</div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="mahasiswa5">Nama Mahasiswa :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
												<select class="form-control show-tick" name="mahasiswa5" id="mahasiswa5" required>
													<option value="">-- Pilih Mahasiswa --</option>
													<?php
														$selectMhs = "SELECT * FROM tbl_mahasiswa WHERE prodi='$nama_prodi'";
														$query	= mysqli_query($koneksi, $selectMhs);
														while($data = mysqli_fetch_array($query)){
													?>
													<option value="<?= $data['NPM'] ?>"><?= $data['Nama']; ?>
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