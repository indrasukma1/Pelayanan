<?php

    $kode_krs  = $_GET['kode_krs'];
    $krs    = "SELECT * FROM tbl_krs WHERE kode_krs='$kode_krs'";
    $query        = mysqli_query($koneksi, $krs);
    $data         = mysqli_fetch_array($query);
?>  

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT KARTU RENCANA STUDI
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="Kuliah/KRS/update.php" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kode_krs">Kode KRS :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $data['kode_krs'];?>" maxlength="10" id="kode_krs" name="kode_krs" class="form-control" readonly required>
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
														while($p = mysqli_fetch_array($query)){
													?>
													<option  <?php if($data['kode_prodi']==$p['kode_prodi']){echo "selected";}?> value="<?= $p['kode_prodi'] ?>"><?= $p['nama_prodi']; ?>
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
														while($k = mysqli_fetch_array($query)){
													?>
													<option <?php if($data['kode_kelas']==$k['kode_kelas']){echo "selected";}?> value="<?= $k['kode_kelas'] ?>"><?= $k['nama_kelas']; ?>
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
                                                <input type="text" value="<?= $data['tahun_akademik'];?>" maxlength="10" id="tahun_akademik" name="tahun_akademik" class="form-control" required>
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
                                                <input type="text" value="<?= $data['semester'];?>" maxlength="2" id="semester" name="semester" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SIMPAN</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>