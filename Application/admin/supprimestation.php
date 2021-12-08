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
$numrefstation = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $numrefstation = $postData["numrefstation"];
    deleteStation($numrefstation);
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = './misajour.php';
    header("Location: http://$host$uri/$extra");
    exit;   
}

function deleteStation($numrefstation){
    global $conn;
    $sql="DELETE from FLOTTE_DE_VELOS.EMPRUNT where NUMERO_STATION_DEPART='$numrefstation' || NUMERO_STATION_ARRIVEE='$numrefstation';
    DELETE from FLOTTE_DE_VELOS.ETRE_DISTANT where NUMERO_STATION_DEPART='$numrefstation' || NUMERO_STATION_ARRIVEE='$numrefstation';
    DELETE from FLOTTE_DE_VELOS.VELO where NUMERO_STATION='$numrefstation';
    DELETE from FLOTTE_DE_VELOS.STATION where NUMERO_STATION='$numrefstation';";
    $result = $conn->multi_query($sql);
}
    

?>
