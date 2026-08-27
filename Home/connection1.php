<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registrationform";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if ($conn) {
        //echo "Connection Ok";
    }
    else{
        echo "Connection Failed";
    }
?>