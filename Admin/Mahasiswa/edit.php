<?php 

    $npm    	  = $_GET['npm'];
    $mahasiswa    = "SELECT * FROM tbl_mahasiswa WHERE NPM='$npm'";
    $query        = mysqli_query($koneksi, $mahasiswa);
    $data         = mysqli_fetch_array($query);
?>  

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT DATA MAHASISWA
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="Mahasiswa/update.php" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="npm">NPM :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $data['NPM'];?>" maxlength="10" id="npm" name="npm" class="form-control" Readonly>
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
                                                <input type="password" minlength="8" maxlength="50"  value="<?= $data['password'];?>" id="password" name="password" placeholder="Password Harus Unik, Min. 8 karakter" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama">Nama :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $data['Nama'];?>" maxlength="50" id="nama" name="nama" class="form-control" required>
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
													<option value="">-- Pilih Prodi --</option>
													<?php
														$mahasiswa = "SELECT * FROM tbl_prodi";
														$query	= mysqli_query($koneksi, $mahasiswa);
														while($m = mysqli_fetch_array($query)){
													?>
													<option <?php if($data['prodi']==$m['nama_prodi']){echo "selected";}?> value="<?= $m['nama_prodi'] ?>"><?= $m['nama_prodi']; ?>
													</option>
														<?php } ?>
												</select>
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
													<option <?php if($data['jenis_kelamin']="L"){echo "selected";}?> value="L">Laki - laki</option>
													<option <?php if($data['jenis_kelamin']="P"){echo "selected";}?> value="P">Perempuan</option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="tglLahir">Tempat dan Tanggal Lahir :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $data['tempatTglLahir'];?>" id="tglLahir" name="tglLahir" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="alamat">Alamat :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $data['alamat'];?>" id="alamat" name="alamat" class="form-control" required>
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