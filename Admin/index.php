<?php 
include '../Koneksi/koneksi.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php?pesan=tidakLogin");
}elseif($_SESSION['level'] !="Admin"){
	header("location:../index.php?pesan=bukanAdmin");
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Pelayanan Mahasiswa | Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="../LogoIAIDpng.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
	
    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />
	
	<!-- Multi Select Css -->
    <link href="../plugins/multi-select/css/multi-select.css" rel="stylesheet">
	
	<!-- Bootstrap Select Css -->
    <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
	
	<!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	
    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
	
	<!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>
	
	<!-- Multi Select Plugin Js -->
    <script src="../plugins/multi-select/js/jquery.multi-select.js"></script>
	
	<!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
	
	<script>
		$(document).ready(function(){
			$('#example').DataTable({
				"scrollx": true
			});
			$('#example2').DataTable({
				"scrollx": true
			});
			$('#example3').DataTable({
				"scrollx": true
			});
		});
		
		function konfirmasi()
		{
			tanya = confirm("Anda Yakin Akan Menghapus Data ?");
			if (tanya == true) return true;
			else return false;
		}
	</script>
	
</head>

<body class="theme-indigo">
	<?php include "../Koneksi/koneksi.php"; ?>
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-indigo">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Silahkan Tunggu...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">Fakultas Tarbiyah - Institut Agama Islam Darussalam Ciamis</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nama']; ?></div>
                    <div class="email"></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="../logout.php"><i class="material-icons">input</i>Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
				<?php if(isset($_GET['halaman'])){
					$halaman = $_GET['halaman'];
				}else{
					$halaman = "";
				}
				?>
                    <li class="header">MENU NAVIGASI</li>
                    <li <?php switch($halaman){ 
					case "home" : 
					echo "class='active'"; 
					break;
					
					case "" : 
					echo "class='active'"; 
					break;}?>>
                        <a href="index.php?halaman=home">
                            <i class="material-icons">home</i>
                            <span>Beranda</span>
                        </a>
                    </li>
					<li <?php switch($halaman){ 
								case "input-mahasiswa" : 
								echo "class='active'"; 
								break;
								
								case "view-mahasiswa" : 
								echo "class='active'"; 
								break;
								
								case "edit-mahasiswa" : 
								echo "class='active'"; 
								break;}?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">school</i>
                            <span>Data Mahasiswa</span>
                        </a>
						<ul class="ml-menu">
                                    <li <?php switch($halaman){ 
												case "input-mahasiswa" : 
												echo "class='active'"; 
												break;}?>>
                                        <a href="index.php?halaman=input-mahasiswa">Input Data</a>
                                    </li>
                                    <li <?php switch($halaman){ 
												case "view-mahasiswa" : 
												echo "class='active'"; 
												break;
												
												case "edit-mahasiswa" : 
								                echo "class='active'"; 
								                break;}?>>
                                        <a href="index.php?halaman=view-mahasiswa">Lihat Data</a>
                                    </li>
                        </ul>
                    </li>
					<li <?php switch($halaman){ 
								case "input-dosen" : 
								echo "class='active'"; 
								break;
								
								case "view-dosen" : 
								echo "class='active'"; 
								break;
								
								case "edit-dosen" : 
								echo "class='active'"; 
								break;}?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Data Dosen</span>
                        </a>
						<ul class="ml-menu">
                                    <li <?php switch($halaman){ 
												case "input-dosen" : 
												echo "class='active'"; 
												break;}?>>
                                        <a href="index.php?halaman=input-dosen">Input Data</a>
                                    </li>
                                    <li <?php switch($halaman){ 
												case "view-dosen" : 
												echo "class='active'"; 
												break;
												
												case "edit-dosen" : 
								                echo "class='active'"; 
							                	break;}?>>
                                        <a href="index.php?halaman=view-dosen">Lihat Data</a>
                                    </li>
                        </ul>
                    </li>
					<li <?php switch($halaman){ 
								case "view-prodi" : 
								echo "class='active'"; 
								break;
												
								case "view-kelas" : 
								echo "class='active'"; 
								break;
								
								case "input-kelas" : 
								echo "class='active'"; 
								break;
								
								case "view-detailKelas" : 
								echo "class='active'"; 
								break;
								
								case "input-detailKelas" : 
								echo "class='active'"; 
								break;}?>>
                        <a href="index.php?halaman=view-prodi">
                            <i class="material-icons">supervisor_account</i>
                            <span>Data Prodi</span>
                        </a>
                    </li>
					<li <?php switch($halaman){ 
								case "input-matakuliah" : 
								echo "class='active'"; 
								break;
								
								case "view-matakuliah" : 
								echo "class='active'"; 
								break;
								
								case "input-KRS" : 
								echo "class='active'"; 
								break;
								
								case "view-KRS" : 
								echo "class='active'"; 
								break;
								
								case "input-detailKRS" : 
								echo "class='active'"; 
								break;
								
								case "edit-detailKRS" : 
								echo "class='active'"; 
								break;
								
								case "lihatdata-KRS" : 
								echo "class='active'"; 
								break;
								
								
								case "view-KHS" : 
								echo "class='active'"; 
								break;
								
								case "lihatmhs-KHS":
								echo "class='active'";
								break;
								
								case "lihatdata-KHS":
								echo "class='active'";
								break;}?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Data Kuliah</span>
                        </a>
						<ul class="ml-menu">
									<li <?php switch($halaman){ 
												case "input-matakuliah" : 
												echo "class='active'"; 
												break;
												
												case "view-matakuliah" : 
												echo "class='active'"; 
												break;}?> >
										<a href="javascript:void(0);" class="menu-toggle">
											<span>Data Matakuliah</span>
										</a>
										<ul class="ml-menu">
											<li <?php switch($halaman){ 
												case "input-matakuliah" : 
												echo "class='active'"; 
												break;}?>>
												<a href="index.php?halaman=input-matakuliah">Input Data</a>
											</li>
											<li <?php switch($halaman){ 
												case "view-matakuliah" : 
												echo "class='active'"; 
												break;}?>>
												<a href="index.php?halaman=view-matakuliah">Lihat Data</a>
											</li>
										</ul>
									</li>
                                    <li <?php switch($halaman){ 
												case "input-KRS" : 
												echo "class='active'"; 
												break;
												
												case "view-KRS" : 
												echo "class='active'"; 
												break;
												
												case "input-detailKRS" : 
												echo "class='active'"; 
												break;
												
												case "edit-detailKRS" : 
												echo "class='active'"; 
												break;
												
												case "lihatdata-KRS" : 
												echo "class='active'"; 
												break;}?> >
										<a href="javascript:void(0);" class="menu-toggle">
											<span>Data KRS</span>
										</a>
										<ul class="ml-menu">
											<li <?php switch($halaman){ 
												case "input-KRS" : 
												echo "class='active'"; 
												break;}?>>
												<a href="index.php?halaman=input-KRS">Input KRS</a>
											</li>
											<li <?php switch($halaman){ 
												case "input-detailKRS" : 
												echo "class='active'"; 
												break;}?>>
												<a href="index.php?halaman=input-detailKRS">Input Detail KRS</a>
											</li>
											<li <?php switch($halaman){ 
												case "view-KRS" : 
												echo "class='active'"; 
												break;
												
												case "lihatdata-KRS" : 
												echo "class='active'"; 
												break;
												
												case "edit-detailKRS" : 
												echo "class='active'"; 
												break;}?>>
												<a href="index.php?halaman=view-KRS">Lihat KRS</a>
											</li>
										</ul>
									</li>
									<li <?php switch($halaman){ 
												case "view-KHS" : 
												echo "class='active'"; 
												break;
												
												case "lihatmhs-KHS":
												echo "class='active'";
												break;
												
												case "lihatdata-KHS":
												echo "class='active'";
												break;}?>>
                                        <a href="index.php?halaman=view-KHS">Data KHS</a>
                                    </li>
									
                        </ul>
					</li>
					<li <?php switch($halaman){ 
						case "input-jadwal" : 
						echo "class='active'"; 
						break;
												
						case "view-jadwal" : 
						echo "class='active'"; 
						break;
						
						case "input-detailJadwal" : 
						echo "class='active'"; 
						break;
						
						case "view-detailJadwal" : 
						echo "class='active'"; 
						break;
						
						case "edit-detailJadwal" : 
						echo "class='active'"; 
						break;}?>>
						<a href="javascript:void(0);" class="menu-toggle">
							<i class="material-icons">schedule</i>
							<span>Jadwal Kuliah</span>
						</a>
						<ul class="ml-menu">
							<li <?php switch($halaman){ 
								case "input-jadwal" : 
								echo "class='active'"; 
								break;}?>>
								<a href="index.php?halaman=input-jadwal">Input Jadwal</a>
							</li>
							<li <?php switch($halaman){ 
								case "input-detailJadwal" : 
								echo "class='active'"; 
								break;}?>>
								<a href="index.php?halaman=input-detailJadwal">Input Detail Jadwal</a>
							</li>
							<li <?php switch($halaman){ 
								case "view-jadwal" : 
								echo "class='active'"; 
								break;
								
								case "view-detailJadwal" : 
								echo "class='active'"; 
								break;
								
								case "edit-detailJadwal" : 
								echo "class='active'"; 
								break;}?>>
								<a href="index.php?halaman=view-jadwal">Lihat Data</a>
							</li>
						</ul>
					</li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 <a href="javascript:void(0);"> Faizal Azis - AdminBSB</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
     <?php
                include "content.php"; 
     ?>
    </section>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
	
	<!-- Multi Select Plugin Js -->
    <script src="../plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

	<!-- Autosize Plugin Js -->
    <script src="../plugins/autosize/autosize.js"></script>
	
    <!-- Jquery CountTo Plugin Js -->
    <script src="../plugins/jquery-countto/jquery.countTo.js"></script>
	
    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
	<script src="../js/pages/tables/jquery-datatable.js"></script>
	<!--<script src="../js/pages/forms/advanced-form-elements.js"></script>
	<script src="../js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
	
	
	
</body>

</html>
