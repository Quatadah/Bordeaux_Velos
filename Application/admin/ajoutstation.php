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

$adresse = "";
$ndbornes = "";
$commune = "";


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $adresse = $postData["adresse"];
    $ndbornes = $postData["ndbornes"];
    $commune = $postData["commune"];
    addStation($adresse, $ndbornes, $commune);
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = './misajour.php';
    header("Location: http://$host$uri/$extra");
    exit;   
}

function addStation($adresse, $ndbornes, $commune){
    global $conn;
    $sql="INSERT into FLOTTE_DE_VELOS.STATION(ADRESSE_STATION,NOMBRE_BORNES,COMMUNE) values ('$adresse', '$ndbornes' , '$commune');";
    $result = $conn->query($sql);
    echo "Connected successfully";
    echo $conn->error;
}
?>

