<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INPUT DETAIL KARTU RENCANA STUDI
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="Kuliah/DetailKRS/simpan.php" method="POST">
								<h4>Input 1 Data</h4>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="krs">Kode KRS :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="krs" id="krs" required>
													<option value="">-- Pilih Kode KRS --</option>
													<?php
														$krs = "SELECT * FROM tbl_krs";
														$query	= mysqli_query($koneksi, $krs);
														while($data = mysqli_fetch_array($query)){
													?>
													<option value="<?= $data['kode_krs'] ?>"><?= $data['kode_krs']; ?>
													</option>
														<?php } ?>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="matkul">Matakuliah :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <div class="body">
													<div class="row clearfix">
														<div class="col-md-4">
															<select class="form-control show-tick" name="matkul" id="matkul" required>
																<option value="">-- Pilih Matakuliah --</option>
																<?php
																	$matkul = "SELECT * FROM tbl_matakuliah";
																	$query	= mysqli_query($koneksi, $matkul);
																	while($data = mysqli_fetch_array($query)){
																?>
																<option value="<?= $data['kode_matakuliah'] ?>"><?= $data['matakuliah']; ?>
																</option>
																	<?php } ?>
															</select>
														</div>
														<div class="col-md-4">
															<select class="form-control show-tick" name="dosen" id="dosen" required>
																<option value="">-- Pilih Dosen Pengampu --</option>
																<?php
																	$dosen = "SELECT * FROM tbl_dosen";
																	$query	= mysqli_query($koneksi, $dosen);
																	while($data = mysqli_fetch_array($query)){
																?>
																<option value="<?= $data['kode_dosen'] ?>"><?= $data['nama_dosen']; ?>
																</option>
																	<?php } ?>
															</select>
														</div>
														<div class="col-md-4">
															<div class="form-line">
																<input type="text" maxlength="2" id="sks" name="sks" class="form-control" placeholder="SKS" required>
															</div>
														</div>
													</div>
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
			
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INPUT DETAIL KARTU RENCANA STUDI
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="Kuliah/DetailKRS/simpan5data.php" method="POST">
								<h4>Input 5 Data</h4>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="krs">Kode KRS :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="krs" id="krs" required>
													<option value="">-- Pilih Kode KRS --</option>
													<?php
														$krs = "SELECT * FROM tbl_krs";
														$query	= mysqli_query($koneksi, $krs);
														while($data = mysqli_fetch_array($query)){
													?>
													<option value="<?= $data['kode_krs'] ?>"><?= $data['kode_krs']; ?>
													</option>
														<?php } ?>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="matkul">Matakuliah :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <div class="body">
													<div class="row clearfix">
														<div class="col-md-4">
															<select class="form-control show-tick" name="matkul" id="matkul" required>
																<option value="">-- Pilih Matakuliah --</option>
																<?php
																	$matkul = "SELECT * FROM tbl_matakuliah";
																	$query	= mysqli_query($koneksi, $matkul);
																	while($data = mysqli_fetch_array($query)){
																?>
																<option value="<?= $data['kode_matakuliah'] ?>"><?= $data['matakuliah']; ?>
																</option>
																	<?php } ?>
															</select>
														</div>
														<div class="col-md-4">
															<select class="form-control show-tick" name="dosen" id="dosen" required>
																<option value="">-- Pilih Dosen Pengampu --</option>
																<?php
																	$dosen = "SELECT * FROM tbl_dosen";
																	$query	= mysqli_query($koneksi, $dosen);
																	while($data = mysqli_fetch_array($query)){
																?>
																<option value="<?= $data['kode_dosen'] ?>"><?= $data['nama_dosen']; ?>
																</option>
																	<?php } ?>
															</select>
														</div>
														<div class="col-md-4">
															<div class="form-line">
																<input type="text" maxlength="2" id="sks" name="sks" class="form-control" placeholder="SKS" required>
															</div>
														</div>
													</div>
												</div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="matkul">Matakuliah :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <div class="body">
													<div class="row clearfix">
														<div class="col-md-4">
															<select class="form-control show-tick" name="matkul2" id="matkul2" required>
																<option value="">-- Pilih Matakuliah --</option>
																<?php
																	$matkul = "SELECT * FROM tbl_matakuliah";
																	$query	= mysqli_query($koneksi, $matkul);
																	while($data = mysqli_fetch_array($query)){
																?>
																<option value="<?= $data['kode_matakuliah'] ?>"><?= $data['matakuliah']; ?>
																</option>
																	<?php } ?>
															</select>
														</div>
														<div class="col-md-4">
															<select class="form-control show-tick" name="dosen2" id="dosen2" required>
																<option value="">-- Pilih Dosen Pengampu --</option>
																<?php
																	$dosen = "SELECT * FROM tbl_dosen";
																	$query	= mysqli_query($koneksi, $dosen);
																	while($data = mysqli_fetch_array($query)){
																?>
																<option value="<?= $data['kode_dosen'] ?>"><?= $data['nama_dosen']; ?>
																</option>
																	<?php } ?>
															</select>
														</div>
														<div class="col-md-4">
															<div class="form-line">
																<input type="text" maxlength="2" id="sks2" name="sks2" class="form-control" placeholder="SKS" required>
															</div>
														</div>
													</div>
												</div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="matkul">Matakuliah :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <div class="body">
													<div class="row clearfix">
														<div class="col-md-4">
															<select class="form-control show-tick" name="matkul3" id="matkul3" required>
																<option value="">-- Pilih Matakuliah --</option>
																<?php
																	$matkul = "SELECT * FROM tbl_matakuliah";
																	$query	= mysqli_query($koneksi, $matkul);
																	while($data = mysqli_fetch_array($query)){
																?>
																<option value="<?= $data['kode_matakuliah'] ?>"><?= $data['matakuliah']; ?>
																</option>
																	<?php } ?>
															</select>
														</div>
														<div class="col-md-4">
															<select class="form-control show-tick" name="dosen3" id="dosen3" required>
																<option value="">-- Pilih Dosen Pengampu --</option>
																<?php
																	$dosen = "SELECT * FROM tbl_dosen";
																	$query	= mysqli_query($koneksi, $dosen);
																	while($data = mysqli_fetch_array($query)){
																?>
																<option value="<?= $data['kode_dosen'] ?>"><?= $data['nama_dosen']; ?>
																</option>
																	<?php } ?>
															</select>
														</div>
														<div class="col-md-4">
															<div class="form-line">
																<input type="text" maxlength="2" id="sks3" name="sks3" class="form-control" placeholder="SKS" required>
															</div>
														</div>
													</div>
												</div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="matkul">Matakuliah :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <div class="body">
													<div class="row clearfix">
														<div class="col-md-4">
															<select class="form-control show-tick" name="matkul4" id="matkul4" required>
																<option value="">-- Pilih Matakuliah --</option>
																<?php
																	$matkul = "SELECT * FROM tbl_matakuliah";
																	$query	= mysqli_query($koneksi, $matkul);
																	while($data = mysqli_fetch_array($query)){
																?>
																<option value="<?= $data['kode_matakuliah'] ?>"><?= $data['matakuliah']; ?>
																</option>
																	<?php } ?>
															</select>
														</div>
														<div class="col-md-4">
															<select class="form-control show-tick" name="dosen4" id="dosen4" required>
																<option value="">-- Pilih Dosen Pengampu --</option>
																<?php
																	$dosen = "SELECT * FROM tbl_dosen";
																	$query	= mysqli_query($koneksi, $dosen);
																	while($data = mysqli_fetch_array($query)){
																?>
																<option value="<?= $data['kode_dosen'] ?>"><?= $data['nama_dosen']; ?>
																</option>
																	<?php } ?>
															</select>
														</div>
														<div class="col-md-4">
															<div class="form-line">
																<input type="text" maxlength="2" id="sks4" name="sks4" class="form-control" placeholder="SKS" required>
															</div>
														</div>
													</div>
												</div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="matkul">Matakuliah :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                                <div class="body">
													<div class="row clearfix">
														<div class="col-md-4">
															<select class="form-control show-tick" name="matkul5" id="matkul5" required>
																<option value="">-- Pilih Matakuliah --</option>
																<?php
																	$matkul = "SELECT * FROM tbl_matakuliah";
																	$query	= mysqli_query($koneksi, $matkul);
																	while($data = mysqli_fetch_array($query)){
																?>
																<option value="<?= $data['kode_matakuliah'] ?>"><?= $data['matakuliah']; ?>
																</option>
																	<?php } ?>
															</select>
														</div>
														<div class="col-md-4">
															<select class="form-control show-tick" name="dosen5" id="dosen5" required>
																<option value="">-- Pilih Dosen Pengampu --</option>
																<?php
																	$dosen = "SELECT * FROM tbl_dosen";
																	$query	= mysqli_query($koneksi, $dosen);
																	while($data = mysqli_fetch_array($query)){
																?>
																<option value="<?= $data['kode_dosen'] ?>"><?= $data['nama_dosen']; ?>
																</option>
																	<?php } ?>
															</select>
														</div>
														<div class="col-md-4">
															<div class="form-line">
																<input type="text" maxlength="2" id="sks5" name="sks5" class="form-control" placeholder="SKS" required>
															</div>
														</div>
													</div>
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