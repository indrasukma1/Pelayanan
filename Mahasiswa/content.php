<?php
   
    if(isset($_GET['halaman'])){
        $halaman = $_GET['halaman'];
    }else{
        $halaman = "";
    }
    switch($halaman){

        case "krs":
            include "KRS.php";
        break;
		
		case "daftarnilai":
            include "daftarnilai.php";
        break;
		
		case "khs":
            include "KHS.php";
        break;
		
		case "profil":
            include "profil.php";
        break;
		
        default:
			include "home.php";
        break;
    }
?>