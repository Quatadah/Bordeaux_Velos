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

    $postData = $_POST;
    $commune = $_SESSION["COMMUNE_NAME"];
    $stations = getStationsNamesByCommune($conn, $commune);
    $links = [];
    $i = 0;
    foreach ($stations as $station){
        $links[] = strtolower(strReplaceWeirdChars($station));
        $i += 1;
    }

    $j = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        foreach ($links as $link){
            $station = $stations[$j];
            if (isset($postData[$link])){
                $_SESSION["STATION_NAME"] = $station;
                break;
            } else{
                $j += 1;
            }
        }
    }
    
    $nbVelosDisponible = getNumberOfVelos($_SESSION["STATION_NAME"]);
    $currentStation = $_SESSION["STATION_NAME"];

    function showVelosDisponible(){
        global $conn;
        global $currentStation;
        $velos = getVelosByStation($currentStation);
        foreach($velos as $velo){
            $velo_info = $velo['NUMERO_REFERENCE']." ".$velo['MARQUE']." ".$velo['KILOMETRAGE']." ".$velo['NIVEAU_CHARGE']."%";
            $ref = strval($velo['NUMERO_REFERENCE']);
            echo "<label class='velo-container'>". $velo_info;
            echo "<input type='radio' name='radio' value='$ref' >";
            echo "<span class='checkmark'></span>";
            echo "</label>";
        }
        echo "<input class='btn' type='submit' value='Emprunter'>";
        
    }


    
?>