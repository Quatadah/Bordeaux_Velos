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

$marque = "";
$kilometrage = "";
$ndc = "";
$nds = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $marque = $postData["marque"]; 
    $kilometrage = $postData["kilometrage"]; 
    $ndc = $postData["ndc"]; 
    $nds = $postData["nds"];
    addVelo($marque, $kilometrage, $ndc, $nds);
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = './misajour.php';
    header("Location: http://$host$uri/$extra");
    exit;   
}

function addVelo($marque, $kilometrage, $ndc, $nds){
        global $conn;
        $date=Date('Y-m-d');
        $sql="INSERT into FLOTTE_DE_VELOS.VELO(MARQUE,KILOMETRAGE,DATE_DE_MISE_EN_SERVICE,NIVEAU_CHARGE,NUMERO_STATION) values ('$marque', '$kilometrage' , '$date','$ndc', '$nds' );";
        $result = $conn->query($sql);
        echo $conn->error;
    }

?>
