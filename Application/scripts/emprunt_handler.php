<?php

include_once "utils.php";
include_once "utils2.php";
include_once "info_station.php";

$login = "root";
$password = "";
$servername = "localhost";

//create connetion
$conn = new mysqli($servername, $login, $password);

//check connection
if ($conn->connect_error) {
    die("Connection failed :" . $conn->connect_error);
}


$commune = $_SESSION["COMMUNE_NAME"];
$stations = getAllStationsNames(    $commune);

$postData = $_POST;
$velos = getVelosByStation($_SESSION["STATION_NAME"]);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    foreach($velos as $velo){
        $ref = strval($velo['NUMERO_REFERENCE']);
        if (isset($postData["$ref"])){
            if (!isset($_SESSION["DATE_EMPRUNT"])){
                $_SESSION["DATE_EMPRUNT"] = Date("Y-m-d h:i:s");
            }
            $_SESSION["NUM_VELO_EMPRUNTE"] = $ref;
            if (!isset($_SESSION["EMPRUNT"])){
                addEmprunt($_SESSION["LOGGED_USER"], 
                        $_SESSION["NUM_VELO_EMPRUNTE"],
                        getStationIdByName($_SESSION["STATION_NAME"]));
                $_SESSION["EMPRUNT"] = True;
            }
            break;
        }
    }
}

function addEmprunt($usagerId,$veloId,$stationId){
        global $conn;
        $date=Date('Y-m-d h:i:s');
        $sql="INSERT into FLOTTE_DE_VELOS.EMPRUNT(DATE_DEPART,NUMERO_USAGER,NUMERO_REFERENCE,NUMERO_STATION_DEPART) 
        values ('$date', '$usagerId' , '$veloId','$stationId');";
        $result = $conn->query($sql);
    }

function updateEmprunt($emprunt, $station){
        global $conn;
        $date=Date('Y-m-d h:i:s');
        $sql="UPDATE FLOTTE_DE_VELOS.EMPRUNT
                set DATE_RETOUR='$date', NUMERO_STATION_ARRIVEE='$station' 
                where NUMERO_EMPRUNT = '$emprunt'";
        $result = $conn->query($sql);
        if($result === TRUE){
            echo "Update successful<br>";
        }else {
            echo $conn->error;
        }
    }

function genStationsOptions(){
    global $stations;
    foreach($stations as $station){
        $link = strtolower(strReplaceWeirdChars($station));
        echo "<option value='$link'>$station</option>";        
    }
}
?>