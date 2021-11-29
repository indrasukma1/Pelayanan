<?php
    $kode_dosen    	  = $_GET['kode_dosen'];
    $dosen    = "SELECT * FROM tbl_dosen WHERE kode_dosen='$kode_dosen'";
    $query        = mysqli_query($koneksi, $dosen);
    $data         = mysqli_fetch_array($query);
?>  

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT DATA DOSEN
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="Dosen/update.php" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kode_dosen">Kode Dosen :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $data['kode_dosen'];?>" maxlength="10" id="kode_dosen" name="kode_dosen" class="form-control" Readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password">Password :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" maxlength="10" id="password" name="password" placeholder="Password Harus Unik, Max. 10 karakter" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama">Nama Dosen :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $data['nama_dosen'];?>" maxlength="50" id="nama" name="nama" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="jenis_kelamin">Jenis Kelamin :</label>
                                    </div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="jenis_kelamin" id="jenis_kelamin" required>
													<option value="">-- Pilih Jenis Kelamin --</option>
													<option <?php if($data['jenis_kelamin'] == "Laki-laki"){ echo "selected";} ?> value="Laki-laki">Laki - laki</option>
													<option <?php if($data['jenis_kelamin'] == "Perempuan"){ echo "selected";} ?>value="Perempuan">Perempuan</option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">UBAH</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>