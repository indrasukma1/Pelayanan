<?php

    $kode_matkul  = $_GET['kode_matkul'];
    $matakuliah    = "SELECT * FROM tbl_matakuliah WHERE kode_matakuliah='$kode_matkul'";
    $query        = mysqli_query($koneksi, $matakuliah);
    $data         = mysqli_fetch_array($query);
?>  

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EIDT MATAKULIAH
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="Kuliah/Matakuliah/update.php" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kode_matkul">Kode Matakuliah :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" maxlength="10" value="<?= $data['kode_matakuliah']; ?>" id="kode_matkul" name="kode_matkul" class="form-control" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="matkul">Nama Matakuliah :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" maxlength="50" value="<?= $data['matakuliah']; ?>" id="matkul" name="matkul" class="form-control" required>
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