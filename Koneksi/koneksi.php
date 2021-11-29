<?php
                        //("server","username", "password", "database")
$koneksi = mysqli_connect("localhost","root","","newpelayanandb");
if($koneksi){
    echo "Koneksi Database Berhasil";
}else{
    echo "Koneksi Gagal".mysqli_error();
}
?>