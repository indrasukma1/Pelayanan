<?php
    $kode_krs  	= $_GET['kode_krs'];
	$matkul  	= $_GET['kode_matakuliah'];
	$dosen  	= $_GET['dosen'];
    $krs    	= "SELECT * FROM tbl_detail_krs WHERE kode_krs='$kode_krs' AND kode_matakuliah='$matkul' AND kode_dosen='$dosen'";
    $query      = mysqli_query($koneksi, $krs);
    $data       = mysqli_fetch_array($query);
?>  

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT DETAIL KARTU RENCANA STUDI
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="Kuliah/DetailKRS/update.php?krs1=<?= $data['kode_krs'];?>&matkul1=<?= $data['kode_matakuliah'];?>&dosen1=<?= $data['kode_dosen'];?>" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="krs">Kode KRS :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="krs" id="krs" required >
													<option value="">-- Pilih Kode KRS --</option>
													<?php
														$krs = "SELECT * FROM tbl_krs";
														$query	= mysqli_query($koneksi, $krs);
														while($k = mysqli_fetch_array($query)){
													?>
													<option <?php if($data['kode_krs']==$k['kode_krs']){echo "selected";}?> value="<?= $k['kode_krs'] ?>"><?= $k['kode_krs']; ?>
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
																	while($m = mysqli_fetch_array($query)){
																?>
																<option <?php if($data['kode_matakuliah']==$m['kode_matakuliah']){echo "selected";}?> value="<?= $m['kode_matakuliah'] ?>"><?= $m['matakuliah']; ?>
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
																	while($d = mysqli_fetch_array($query)){
																?>
																<option <?php if($data['kode_dosen']==$d['kode_dosen']){echo "selected";}?> value="<?= $d['kode_dosen'] ?>"><?= $d['nama_dosen']; ?>
																</option>
																	<?php } ?>
															</select>
														</div>
														<div class="col-md-4">
															<div class="form-line">
																<input type="text" value="<?= $data['SKS']; ?>" maxlength="2" id="sks" name="sks" class="form-control" placeholder="SKS" required>
															</div>
														</div>
													</div>
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