<?php 
if (!isset($_SESSION["LOGGED_USER"])){session_start();}

include_once "utils.php";
include_once "utils2.php";
include_once "info_station.php";
include_once "emprunt_handler.php";

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
$chosen_station = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $chosen_station = $postData["depose"];
    $userId = $_SESSION["LOGGED_USER"];
    $veloId = $_SESSION["NUM_VELO_EMPRUNTE"];
    $date_depart = $_SESSION["DATE_EMPRUNT"];

    $station_id = getStationIdByName($chosen_station);
    $empruntId = getEmpruntId($userId, $date_depart);

    updateEmprunt($empruntId, $station_id);
    unset($_SESSION["EMPRUNT"]);
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '../index.php';
    header("Location: http://$host$uri/$extra");
    exit;   
}

function getEmpruntId($usagerId, $empruntDate){
    global $conn;
    $sql = "SELECT NUMERO_EMPRUNT from FLOTTE_DE_VELOS.EMPRUNT
            where DATE_DEPART = '$empruntDate' and
            NUMERO_USAGER = '$usagerId'";
    $result = $conn->query($sql);
    return $result->fetch_assoc()["NUMERO_EMPRUNT"];
}


?>
