<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INPUT DATA MAHASISWA
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="npm">NPM :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" maxlength="10" id="npm" name="npm" placeholder="Silahkan Masukan NPM" class="form-control" required>
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
                                                <input type="password" minlength="8" maxlength="50" id="password" name="password" placeholder="Password Harus Unik, Min. 8 karakter" class="form-control" required>
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
                                                <input type="text" maxlength="50" id="nama" name="nama" placeholder="Silahkan Masukan Nama Mahasiswa" class="form-control" required>
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
														while($data = mysqli_fetch_array($query)){
													?>
													<option value="<?= $data['nama_prodi'] ?>"><?= $data['nama_prodi']; ?>
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
													<option value="L">Laki - laki</option>
													<option value="P">Perempuan</option>
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
                                                <input type="text" id="tglLahir" name="tglLahir" placeholder="Kota, hh-bb-tttt. Contoh : Ciamis, 23-04-2000" class="form-control" required>
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
                                                <input type="text" id="alamat" name="alamat" placeholder="Silahkan Masukan Alamat Lengkap" class="form-control" required>
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
$npm     		= $_POST['npm'];
$password       = $_POST['password'];
$nama       	= $_POST['nama'];
$prodi    		= $_POST['prodi'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$tglLahir      	= $_POST['tglLahir'];
$alamat      	= $_POST['alamat'];
//validasi data
	$select = mysqli_query($koneksi,"SELECT * FROM tbl_mahasiswa WHERE NPM='$npm'");
	$cek = mysqli_num_rows($select);
	if($cek > 0){
		echo "<script>window.alert('NPM Sudah Ada')
		window.location='index.php?halaman=input-mahasiswa'</script>";
	}else{
		//mysqli_query($koneksi, query)
		//INSERT INTO nama_tabel (field) VALUES (nilai yang akan dimasukan)

		$query = "INSERT INTO tbl_mahasiswa (NPM, password, Nama, prodi, jenis_kelamin, tempatTglLahir, alamat) 
		VALUES ('$npm','$password','$nama','$prodi','$jenis_kelamin','$tglLahir','$alamat')";
		$simpan = mysqli_query($koneksi, $query);
		if($simpan)
		{
			?>   
			<script>
			alert("Data Berhasil Di simpan");
			window.location = "index.php?halaman=input-mahasiswa";
			</script>
			<?php
		}
		else{
			echo "Data Error".mysqli_error();
		}
	}
	}
?>