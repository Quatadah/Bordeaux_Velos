<?php
    $login = "username";
    $password = "********";
    $servername = "oracle/oracle";

    //create connetion
    $conn = oci_connect($login, $password, $servername);

    //check connection
    if (!$conn){
        $m = oci_error();
        print $m['message'];
        exit;
    } else {
        print "Connected to Oracle";
    }

    oci_close($conn);
?>