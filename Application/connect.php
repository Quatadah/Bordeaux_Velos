<?php
    $login = "root";
    $password = "";
    $servername = "localhost";

    //create connetion
    $conn = new mysqli($servername, $login, $password);

    //check connection
    if ($conn->connect_error) {
        die("Connection failed :" . $conn->connect_error);
    }
    echo "Connected successfully";
    
?>