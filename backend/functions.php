<?php
    #connect to data base
    $conn = mysqli_connect("localhost","root","","taraauto",);
    #chek if the conect to the data base
    if(mysqli_error($conn)){
        echo "Koneksi Data base gagal";
    }
    else {
        echo "Koneksi Database Berhasil";
    }

    
?>