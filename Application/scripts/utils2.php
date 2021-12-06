<?php

//Administrateur : Consultation
function getUsagers() {
    global $conn;
    $sql = "SELECT * from FLOTTE_DE_VELOS.USAGER
            order by DATE_ADHESION desc;";
    $result = $conn->query($sql);
    $Array=array();
    while ($row = $result->fetch_assoc()) {
        array_push($Array,$row);
     }
    return $Array;
}

function getStations($conn) {
    $sql = "SELECT * from FLOTTE_DE_VELOS.STATION;";
    $result = $conn->query($sql);
    $Array=array();
    while ($row = $result->fetch_assoc()) {
        array_push($Array,$row);
     }
    return $Array;
}

function getEmprunts($conn) {
    $sql = "SELECT * from FLOTTE_DE_VELOS.EMPRUNT 
            order by DATE_DEPART desc;";
    $result = $conn->query($sql);
    $Array=array();
    while ($row = $result->fetch_assoc()) {
        array_push($Array,$row);
     }
    return $Array;
}

function getDistance($depart,$arrivee){
    $sql = "SELECT DISTANCE from ETRE_DISTANT 
            where NUMERO_STATION_DEPART='$depart' and NUMERO_STATION_ARRIVEE='$arrivee';";
    $result = $conn->query($sql);
    return $result->fetch_assoc()["DISTANCE"];
    
}

function getVelos($conn) {
    $sql = "SELECT * from FLOTTE_DE_VELOS.VELO;";
    $result = $conn->query($sql);
    $Array=array();
    while ($row = $result->fetch_assoc()) {
        array_push($Array,$row);
     }
    return $Array;
}

//Administrateur : Statistiques





//Utilisateur
function getStationsNamesByCommune($conn,$commune){
    $sql = "SELECT * from FLOTTE_DE_VELOS.STATION 
            where COMMUNE='$commune';";
    $result = $conn->query($sql);
    $Array=array();
    while ($row = $result->fetch_assoc()) {
        array_push($Array,$row["ADRESSE_STATION"]);
     }
    return $Array;
}

function getVelosByStation($conn,$station){
    $sql = "SELECT * from FLOTTE_DE_VELOS.VELO 
            where STATION='$station';";
    $result = $conn->query($sql);
    $Array=array();
    while ($row = $result->fetch_assoc()) {
        array_push($Array,$row);
     }
    return $Array;
}


?>