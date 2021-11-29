<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INPUT DATA DOSEN
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kode_dosen">Kode Dosen :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" maxlength="10" id="kode_dosen" name="kode_dosen" placeholder="Silahkan Masukan Kode Dosen" class="form-control">
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
                                                <input type="password" minlength="8" maxlength="10" id="password" name="password" placeholder="Password Harus Unik, Min. 8 karakter" class="form-control" required>
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
                                                <input type="text" maxlength="50" id="nama" name="nama" placeholder="Silahkan Masukan Nama Dosen" class="form-control" required>
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
													<option value="Laki-laki">Laki - laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" name="simpan" class="btn btn-primary m-t-15 waves-effect">SIMPAN</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			
<?php
//proses
	if(isset($_POST['simpan'])) {
	$kode_dosen		= $_POST['kode_dosen'];
	$password		= $_POST['password'];
	$nama    		= $_POST['nama'];
	$jenis_kelamin  = $_POST['jenis_kelamin'];
//validasi data
	$select = mysqli_query($koneksi,"SELECT * FROM tbl_dosen WHERE kode_dosen='$kode_dosen'");
	$cek = mysqli_num_rows($select);
	if($cek > 0){
		echo "<script>window.alert('Kode Dosen Sudah Ada')
		window.location='index.php?halaman=input-dosen'</script>";
	}else{
		//mysqli_query($koneksi, query)
		//INSERT INTO nama_tabel (field) VALUES (nilai yang akan dimasukan)

		$query = "INSERT INTO tbl_dosen (kode_dosen, password, nama_dosen, jenis_kelamin) 
		VALUES ('$kode_dosen','$password','$nama','$jenis_kelamin')";
		$simpan = mysqli_query($koneksi, $query);
		if($simpan)
		{
			?>   
			<script>
			alert("Data Berhasil Di simpan");
			window.location = "index.php?halaman=input-dosen";
			</script>
			<?php
		}
		else{
			echo "Data Error".mysqli_error();
		}
	}
	}
?>