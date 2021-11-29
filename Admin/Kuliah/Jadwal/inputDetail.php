<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INPUT DETAIL JADWAL
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="Kuliah/Jadwal/simpanDetail.php" method="POST">
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kode_jadwal">Kode Jadwal :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="kode_jadwal" id="kode_jadwal" required>
													<option value="">-- Pilih Kode Jadwal --</option>
													<?php
														$jadwal = "SELECT * FROM tbl_jadwal";
														$query	= mysqli_query($koneksi, $jadwal);
														while($data = mysqli_fetch_array($query)){
													?>
													<option value="<?= $data['kode_jadwal'] ?>"><?= $data['kode_jadwal']; ?>
													</option>
														<?php } ?>
												</select>
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
                                                <input type="text" maxlength="2" id="semester" name="semester" class="form-control" placeholder="Silahkan Masukan Semester" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="hari">Hari :</label>
                                    </div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="hari" id="hari" required>
													<option value="">-- Pilih Hari --</option>
													<option value="Senin">Senin</option>
													<option value="Selasa">Selasa</option>
													<option value="Rabu">Rabu</option>
													<option value="Kamis">Kamis</option>
													<option value="Jum'at">Jum'at</option>
													<option value="Sabtu">Sabtu</option>
													<option value="Minggu">Minggu</option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="jam">Waktu :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" maxlength="15" id="jam" name="jam" class="form-control" placeholder="Silahkan Masukan Waktu" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kode_matkul">Matakuliah :</label>
                                    </div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="kode_matkul" id="kode_matkul" required>
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
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kode_dosen">Dosen Pengampu :</label>
                                    </div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="kode_dosen" id="kode_dosen" required>
													<option value="">-- Pilih Dosen --</option>
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
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="ruangan">Ruangan :</label>
                                    </div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="ruangan" id="ruangan" required>
													<option value="">-- Pilih Ruangan --</option>
													<?php
														$ruangan = "SELECT * FROM tbl_ruangan";
														$query	= mysqli_query($koneksi, $ruangan);
														while($data = mysqli_fetch_array($query)){
													?>
													<option value="<?= $data['kode_ruangan'] ?>"><?= $data['kode_ruangan']; ?>
													</option>
														<?php } ?>
												</select>
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