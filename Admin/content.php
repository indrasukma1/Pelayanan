<?php
   
    if(isset($_GET['halaman'])){
        $halaman = $_GET['halaman'];
    }else{
        $halaman = "";
    }
    switch($halaman){
		
		case "input-user":
            include "User/input.php";
        break;
		
		case "view-user":
            include "User/view.php";
        break;
		
		case "edit-user":
            include "User/edit.php";
        break;
		
		case "input-admin":
            include "Admin/input.php";
        break;
		
		case "view-admin":
            include "Admin/view.php";
        break;
		
		case "edit-admin":
            include "Admin/edit.php";
        break;
		
        case "input-mahasiswa":
            include "Mahasiswa/input.php";
        break;
		
		case "view-mahasiswa":
            include "Mahasiswa/view.php";
        break;
		
		case "edit-mahasiswa":
            include "Mahasiswa/edit.php";
        break;
		
		case "input-dosen":
            include "Dosen/input.php";
        break;
		
		case "view-dosen":
            include "Dosen/view.php";
        break;
		
		case "edit-dosen":
            include "Dosen/edit.php";
        break;
		
		case "input-kelas":
            include "Prodi/Kelas/input.php";
        break;
		
		case "view-prodi":
            include "Prodi/view.php";
        break;
		
		case "view-kelas":
            include "Prodi/Kelas/viewKelas.php";
        break;
		
		case "input-detailKelas":
            include "Prodi/DetailKelas/inputDetailkelas.php";
        break;
		
		case "view-detailKelas":
            include "Prodi/DetailKelas/detailKelas.php";
        break;
		
		case "edit-kelas":
            include "Prodi/edit.php";
        break;
		
		case "input-matakuliah":
            include "Kuliah/Matakuliah/input.php";
        break;
		
		case "view-matakuliah":
            include "Kuliah/Matakuliah/view.php";
        break;
		
		case "edit-matakuliah":
            include "Kuliah/Matakuliah/edit.php";
        break;
		
		case "input-KRS":
            include "Kuliah/KRS/input.php";
        break;
		
		case "view-KRS":
            include "Kuliah/KRS/view.php";
        break;
		
		case "edit-KRS":
            include "Kuliah/KRS/edit.php";
        break;
		
		case "input-detailKRS":
            include "Kuliah/DetailKRS/input.php";
        break;
		
		case "edit-detailKRS":
            include "Kuliah/DetailKRS/edit.php";
        break;
		
		case "lihatdata-KRS":
            include "Kuliah/KRS/lihatdataKRS.php";
        break;
		
		case "view-KHS":
            include "Kuliah/KHS/view.php";
        break;
		
		case "lihatmhs-KHS":
            include "Kuliah/KHS/viewDetail.php";
        break;
		
		case "lihatdata-KHS":
            include "Kuliah/KHS/viewKHS.php";
        break;
		
		case "input-jadwal":
            include "Kuliah/Jadwal/input.php";
        break;
		
		case "input-detailJadwal":
            include "Kuliah/Jadwal/inputDetail.php";
        break;
		
		case "edit-jadwal":
            include "Kuliah/Jadwal/edit.php";
        break;
		
		case "edit-detailJadwal":
            include "Kuliah/Jadwal/editDetail.php";
        break;
		
		case "view-jadwal":
            include "Kuliah/Jadwal/view.php";
        break;
		
		case "view-detailJadwal":
            include "Kuliah/Jadwal/detailJadwal.php";
        break;
		
		/* case "input-nilai":
            include "Nilai/input.php";
        break;
		
		case "view-nilai":
            include "Nilai/view.php";
        break;
		
		case "edit-nilai":
            include "Nilai/edit.php";
        break; */
		
        default:
			include "home.php";
        break;
    }
?>