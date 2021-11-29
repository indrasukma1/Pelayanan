<?php
    $kode_jadwal 		= $_GET['kode_jadwal'];
    $semester			= $_GET['semester'];
	$hari  				= $_GET['hari'];
	$waktu  			= $_GET['waktu'];
	$kode_matakuliah	= $_GET['kode_matakuliah'];
	$kode_dosen  		= $_GET['kode_dosen'];
	$kode_ruangan  		= $_GET['kode_ruangan'];
    $jadwal    			= "SELECT * FROM tbl_detail_jadwal WHERE kode_jadwal='$kode_jadwal' AND hari='$hari' AND waktu='$waktu' 
							AND kode_matakuliah='$kode_matakuliah' AND kode_dosen='$kode_dosen' AND kode_ruangan='$kode_ruangan'";
    $query        = mysqli_query($koneksi, $jadwal);
    $data         = mysqli_fetch_array($query);
?>  

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT DETAIL JADWAL
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="Kuliah/Jadwal/updateDetail.php?hari=<?php echo $data['hari'];?>&waktu=<?php echo $data['waktu'];?>&kode_matakuliah=<?php echo $data['kode_matakuliah'];?>
										&kode_dosen=<?php echo $data['kode_dosen'];?>&kode_ruangan=<?php echo $data['kode_ruangan'];?>&kode_jadwal=<?php echo $kode_jadwal;?>" method="POST">
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kode_jadwal">Kode Jadwal :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="kode_jadwal" id="kode_jadwal">
													<option value="">-- Pilih Kode Jadwal --</option>
													<?php
														$jadwal = "SELECT * FROM tbl_jadwal";
														$query	= mysqli_query($koneksi, $jadwal);
														while($j = mysqli_fetch_array($query)){
													?>
													<option <?php if($data['kode_jadwal']==$j['kode_jadwal']){ echo "selected";}?> value="<?= $j['kode_jadwal'] ?>"><?= $j['kode_jadwal']; ?>
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
                                                <input type="text" maxlength="2" id="semester" value="<?= $semester;?>" name="semester" class="form-control" placeholder="Silahkan Masukan Semester" required>
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
													<option <?php if($data['hari']=="Senin"){ echo "selected";}?> value="Senin">Senin</option>
													<option <?php if($data['hari']=="Selasa"){ echo "selected";}?> value="Selasa">Selasa</option>
													<option <?php if($data['hari']=="Rabu"){ echo "selected";}?> value="Rabu">Rabu</option>
													<option <?php if($data['hari']=="Kamis"){ echo "selected";}?> value="Kamis">Kamis</option>
													<option <?php if($data['hari']=="Jum'at"){ echo "selected";}?> value="Jum'at">Jum'at</option>
													<option <?php if($data['hari']=="Sabtu"){ echo "selected";}?> value="Sabtu">Sabtu</option>
													<option <?php if($data['hari']=="Minggu"){ echo "selected";}?> value="Minggu">Minggu</option>
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
                                                <input type="text" maxlength="15" value="<?= $data['waktu'];?>" id="jam" name="jam" class="form-control" required>
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
													<option <?php if($data['kode_matakuliah']==$m['kode_matakuliah']){ echo "selected";}?> value="<?= $m['kode_matakuliah'] ?>"><?= $m['matakuliah']; ?>
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
													<option <?php if($data['kode_dosen']==$d['kode_dosen']){ echo "selected";}?> value="<?= $d['kode_dosen'] ?>"><?= $d['nama_dosen']; ?>
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
													<option <?php if($data['kode_ruangan']==$r['kode_ruangan']){ echo "selected";}?> value="<?= $r['kode_ruangan'] ?>"><?= $r['kode_ruangan']; ?>
													</option>
														<?php } ?>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">EDIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>