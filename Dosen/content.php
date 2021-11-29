<?php
   
    if(isset($_GET['halaman'])){
        $halaman = $_GET['halaman'];
    }else{
        $halaman = "";
    }
    switch($halaman){

        case "jadwal":
            include "jadwal.php";
        break;
		
		case "view-detailJadwal":
            include "detailJadwal.php";
        break;
		
		case "input-nilai":
            include "Nilai/input.php";
        break;
		
		case "view-nilai":
            include "Nilai/view.php";
        break;
		
		case "view-detailNilai":
            include "Nilai/viewDetail.php";
        break;
		
		case "profil":
            include "profil.php";
        break;
		
		case "edit-nilai":
            include "Nilai/edit.php";
        break;
		
        default:
			include "home.php";
        break;
    }
?>