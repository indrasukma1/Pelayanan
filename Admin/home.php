<div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">school</i>
                        </div>
                        <div class="content">
                            <div class="text">MAHASISWA</div>
                            <div class="number"><?php 
													$select = "SELECT COUNT(NPM) AS NPM FROM tbl_mahasiswa";
													$query = mysqli_query($koneksi, $select);
													$count = mysqli_fetch_array($query);
													
													echo $count['NPM'];
												?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">DOSEN</div>
                            <div class="number"><?php 
													$select = "SELECT COUNT(kode_dosen) AS dosen FROM tbl_dosen";
													$query = mysqli_query($koneksi, $select);
													$count = mysqli_fetch_array($query);
													
													echo $count['dosen'];
												?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <div class="content">
                            <div class="text">ADMIN</div>
                            <div class="number"><?php 
													$select = "SELECT COUNT(username) AS admin FROM tbl_admin";
													$query = mysqli_query($koneksi, $select);
													$count = mysqli_fetch_array($query);
													
													echo $count['admin'];
												?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-lime hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">event</i>
                        </div>
                        <div class="content">
                            <div class="text">TANGGAL</div>
                            <div class="number"><?php 
													date_default_timezone_set('Asia/Jakarta');
													echo date('d-M-y'); 
												?></div>
                        </div>
                    </div>
                </div>
            </div>

<!-- Profil -->
<?php
	$select = "SELECT * FROM tbl_admin WHERE username='$username'";
	$query = mysqli_query($koneksi, $select);
	$data = mysqli_fetch_array($query);
	if($data['jenis_kelamin'] = "L"){
		$jk = "Laki-laki";
	}elseif($data['jenis_kelamin'] = "P"){
		$jk = "Perempuan";
	}
?>
<div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card card-about-me">
                        <div class="header">
                            <h2>ABOUT ME</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">assignment_ind</i>
                                        Nama
                                    </div>
                                    <div class="content">
                                        <?= $data['nama_admin'];?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Alamat
                                    </div>
                                    <div class="content">
                                        <?= $data['alamat'];?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">perm_identity</i>
                                        Jenis Kelamin
                                    </div>
                                    <div class="content">
                                        <?= $jk;?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ganti Password
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="" method="POST">
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="passwordlama">Password Saat Ini :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line <?php if(isset($_GET['pesan'])){if($_GET['pesan']=="tidaksama"){ echo "focused error";}}?>">
                                                <input type="password"  maxlength="10" id="passwordlama" name="passwordlama" placeholder="<?php if(isset($_GET['pesan'])){if($_GET['pesan']=="tidaksama"){ echo "Password Tidak Sesuai!";}}else{ echo "Silahkan Masukan Password Saat Ini";}?>" class="form-control" required>
												
											</div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="passwordbaru">Password Baru :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" minlength="8" id="passwordbaru" name="passwordbaru" placeholder="Minimal 8 karakter" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="konfPassword">Konfirmasi Password :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line <?php if(isset($_GET['pesan'])){if($_GET['pesan']=="tidakkonfirm"){ echo "focused error";}}?>">
                                                <input type="password" maxlength="10" id="konfPassword" name="konfPassword" placeholder="<?php if(isset($_GET['pesan'])){if($_GET['pesan']=="tidakkonfirm"){ echo "Konfirmasi Password Tidak Sama!";}}else{ echo "Masukan Kembali Password Baru";}?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button name="simpan" type="submit" class="btn btn-primary m-t-15 waves-effect">UBAH</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
<?php
//proses
	if(isset($_POST['simpan'])) {
		$passwordlama     	= $_POST['passwordlama'];
		$passwordbaru       = $_POST['passwordbaru'];
		$konfPassword       = $_POST['konfPassword'];
		
//validasi data
	$select2 = mysqli_query($koneksi,"SELECT * FROM tbl_admin WHERE username='$username' AND password='$passwordlama'");
	$cek = mysqli_num_rows($select2);
	if(!$cek >= 1){
		echo "<script>window.alert('Password Lama Tidak Sesuai')
		window.location = 'index.php?halaman=profil&pesan=tidaksama'</script>";
		
	}elseif(($_POST['passwordbaru'])!=($_POST['konfPassword'])){
			?>
			<script>
			alert("Konfirmasi Password Tidak Sama");
			window.location = "index.php?halaman=profil&pesan=tidakkonfirm";
			</script>
			<?php
			
	}else{
		//mysqli_query($koneksi, query)
		//INSERT INTO nama_tabel (field) VALUES (nilai yang akan dimasukan)

		$query2 = "UPDATE tbl_admin SET password='$passwordbaru' WHERE username='$username'";
		$simpan = mysqli_query($koneksi, $query2);
		if($simpan)
		{
			session_destroy();
			?>   
			<script>
			alert("Password Berhasil di Ubah Silahkan Login Kembali");
			window.location = "../index.php";
			</script>
			<?php
		}
		else{
			echo "Data Error".mysqli_error();
		}
		
		
	}
	}
?>
