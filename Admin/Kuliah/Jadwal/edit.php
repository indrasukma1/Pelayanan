<?php
    $kode_jadwal  = $_GET['kode_jadwal'];
    $jadwal    = "SELECT * FROM tbl_jadwal WHERE kode_jadwal='$kode_jadwal'";
    $query        = mysqli_query($koneksi, $jadwal);
    $data         = mysqli_fetch_array($query);
?>  

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT JADWAL
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="Kuliah/Jadwal/update.php" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kode_jadwal">Kode Jadwal :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $data['kode_jadwal'];?>" maxlength="10" id="kode_jadwal" name="kode_jadwal" class="form-control" required>
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
													<option <?php if($data['kode_prodi']==$p['kode_prodi']){echo "selected";}?> value="<?= $p['kode_prodi'] ?>"><?= $p['nama_prodi']; ?>
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
														while($m = mysqli_fetch_array($query)){
													?>
													<option <?php if($data['kode_matakuliah']==$m['kode_matakuliah']){echo "selected";}?> value="<?= $m['kode_matakuliah'] ?>"><?= $m['matakuliah']; ?>
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
														while($d = mysqli_fetch_array($query)){
													?>
													<option <?php if($data['kode_dosen']==$d['kode_dosen']){echo "selected";}?> value="<?= $d['kode_dosen'] ?>"><?= $d['nama_dosen']; ?>
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
														while($r = mysqli_fetch_array($query)){
													?>
													<option <?php if($data['kode_ruangan']==$r['kode_ruangan']){echo "selected";}?> value="<?= $r['kode_ruangan'] ?>"><?= $r['kode_ruangan']; ?>
													</option>
														<?php } ?>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="jam">Jam Ke :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $data['jam_ke'];?>" maxlength="2" id="jam" name="jam" class="form-control" required>
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
													<option <?php if($data['hari']=="Senin"){echo "selected";}?> value="Senin">Senin</option>
													<option <?php if($data['hari']=="Selasa"){echo "selected";}?>value="Selasa">Selasa</option>
													<option <?php if($data['hari']=="Rabu"){echo "selected";}?>value="Rabu">Rabu</option>
													<option <?php if($data['hari']=="Kamis"){echo "selected";}?>value="Kamis">Kamis</option>
													<option <?php if($data['hari']=="Jum'at"){echo "selected";}?>value="Jum'at">Jum'at</option>
													<option <?php if($data['hari']=="Sabtu"){echo "selected";}?>value="Sabtu">Sabtu</option>
													<option <?php if($data['hari']=="Minggu"){echo "selected";}?>value="Minggu">Minggu</option>
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