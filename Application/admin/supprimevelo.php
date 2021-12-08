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


$postData = $_POST;
$numrefvelo = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $numrefvelo = $postData["numrefvelo"];
    deleteVelo($numrefvelo);
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = './misajour.php';
    header("Location: http://$host$uri/$extra");
    exit;   
}


function deleteVelo($numrefvelo){
    global $conn;
    /*
    $verify = "SELECT from FLOTTE_DE_VELOS.VELO NUMERO_STATION
                where NUMERO_REFERENCE = '$numrefvelo';";
    $query = $conn->query($verify);
    if (is_bool($query)){
        exit;
    }else {
        */
    $sql="DELETE from FLOTTE_DE_VELOS.EMPRUNT where NUMERO_REFERENCE='$numrefvelo';
    DELETE from FLOTTE_DE_VELOS.VELO 
    where NUMERO_REFERENCE='$numrefvelo';";
    $result = $conn->multi_query($sql);
    echo "connected successfully";
    echo $conn->error;
    //}
    
}
?>
