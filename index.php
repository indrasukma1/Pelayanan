<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="gagal"){?>
			<script>alert("Username dan Password yang anda masukan tidak sesuai!");</script>
			<?php
			}
			if($_GET['pesan']=="tidakLogin"){?>
			<script>alert("Silahkan Login Terlebih Dahulu!!");</script>
			<?php
			}
			if($_GET['pesan']=="bukanMhs"){?>
			<script>alert("Maaf Anda Tidak Terdaftar Sebagai Mahasiswa");</script>
			<?php
			}
			if($_GET['pesan']=="bukanAdmin"){?>
			<script>alert("Maaf Anda Tidak Memiliki Hak Akses!!");</script>
			<?php
			}
			if($_GET['pesan']=="bukanDosen"){?>
			<script>alert("Maaf Anda Tidak Terdaftar Sebagai Dosen");</script>
			<?php
			}
			
		}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Pelayanan Mahasiswa | Login</title>
    <!-- Favicon-->
    <link rel="icon" href="LogoIAIDpng.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">PELAYANAN MAHASISWA</a>
            <small>Institut Agama Islam Darussalam</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="ceklogin.php">
                    <div class="msg">Silahkan Login Untuk Melanjutkan Sesi</div>
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_circle</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control show-tick" name="status" id="status" required>
								<option value="">-- Pilih Status Anda --</option>
								<option value="mahasiswa">Mahasiswa</option>
								<option value="dosen">Dosen</option>
								<option value="admin">Admin</option>
							</select>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" maxlength="10" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" minlength="8" maxlength="50" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">LOG IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>