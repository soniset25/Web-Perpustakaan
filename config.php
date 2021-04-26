<?php
//koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "dbbuku");

if(mysqli_connect_error()){
    echo"gagal melakukan koneksi:" . mysqli_connect_error();
}
?>
