<?php
	$matkul 		= $_GET['matkul'];
	$nama			= $_GET['mhs'];
	$kode_matkul	= $_GET['kode_matkul'];
	$npm			= $_GET['npm'];
	$sks			= $_GET['sks'];
	$semester       = $_GET['semester'];
	
	$nilai    		= "SELECT * FROM tbl_nilai WHERE NPM='$npm' AND kode_matakuliah='$kode_matkul' AND kode_dosen='$user' AND semester='$semester'";
    $query        	= mysqli_query($koneksi, $nilai);
    $data         	= mysqli_fetch_array($query);
?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT DATA NILAI
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="Nilai/update.php?kode_dosen=<?php echo $user;?>" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama">Nama Mahasiswa :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $nama;?>" id="nama" name="nama" class="form-control" readonly>
												<input type="hidden" value="<?= $npm;?>" id="npm" name="npm" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="matakuliah">Matakuliah :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $matkul;?>" id="matakuliah" name="matakuliah" class="form-control" readonly>
												<input type="hidden" value="<?= $kode_matkul;?>" id="kode_matakuliah" name="kode_matakuliah" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="sks">SKS :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $sks;?>" id="sks" name="sks" class="form-control" readonly>
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
                                                <input type="text" value="<?= $semester;?>" id="semester" name="semester" class="form-control" readonly>	
											</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="tahun">Tahun Akademik :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" value="<?= $data['tahun_akademik'];?>" id="tahun" name="tahun" class="form-control" readonly>	
											</div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kehadiran">Nilai Kehadiran :</label>
                                    </div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" value="<?= $data['nilai_kehadiran'];?>" maxlength="3" id="kehadiran" name="kehadiran" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="tgs_terstruktur">Nilai Tugas Terstruktur :</label>
                                    </div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" value="<?= $data['tugas_terstruktur'];?>" maxlength="3" id="tgs_terstruktur" name="tgs_terstruktur" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="tgs_mandiri">Nilai Tugas Mandiri :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" value="<?= $data['tugas_mandiri'];?>"id="tgs_mandiri" name="tgs_mandiri" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="uts">Nilai UTS :</label>
                                    </div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" value="<?= $data['UTS'];?>" id="uts" name="uts" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="uas">Nilai UAS :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" value="<?= $data['UAS'];?>" id="uas" name="uas" class="form-control" required>
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