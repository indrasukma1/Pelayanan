<?php
	$select = "SELECT max(kode_matakuliah) as kodeTerbesar FROM tbl_matakuliah";
	$query = mysqli_query($koneksi, $select);
	$data = mysqli_fetch_array($query);
	$kode_matakuliah = $data['kodeTerbesar'];
	
	
	$urutan = (int) substr($kode_matakuliah, 3, 3);
	
	$urutan++;
	
	$huruf = "MTK";
	$kode_matakuliah = $huruf.sprintf("%03s", $urutan);
?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INPUT MATAKULIAH
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="" method="POST" id="dynamic_field" >
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kode_matkul">Kode Matakuliah :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" maxlength="10" value="<?= $kode_matakuliah; ?>" id="kode_matkul" name="kode_matkul" class="form-control" readonly>
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
                                                <input type="text" maxlength="50" id="matkul" name="matkul" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<br><br>
								<div id="insert-form"></div>
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
	$kode_matkul    = $_POST['kode_matkul'];
	$matkul       	= $_POST['matkul'];
//validasi data
	$select = mysqli_query($koneksi,"SELECT * FROM tbl_matakuliah WHERE kode_matakuliah='$kode_matkul' or matakuliah='$matkul'");
	$cek = mysqli_num_rows($select);
	if($cek > 0){
		echo "<script>window.alert('Kode Matakuliah atau Matakuliah Sudah Ada')
		window.location='index.php?halaman=input-matakuliah'</script>";
	}else{
		//mysqli_query($koneksi, query)
		//INSERT INTO nama_tabel (field) VALUES (nilai yang akan dimasukan)

		$query = "INSERT INTO tbl_matakuliah (kode_matakuliah, matakuliah) 
		VALUES ('$kode_matkul','$matkul')";
		$simpan = mysqli_query($koneksi, $query);
		if($simpan)
		{
			?>   
			<script>
			alert("Data Berhasil Di simpan");
			window.location = "index.php?halaman=input-matakuliah";
			</script>
			<?php
		}
		else{
			echo "Data Error".mysqli_error();
		}
	}
	}
?>