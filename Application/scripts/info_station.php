<?php
 
 function getVelosByStation($adresse_station){
    global $conn;
    $sql = "SELECT VELO.* from FLOTTE_DE_VELOS.VELO inner join FLOTTE_DE_VELOS.STATION
            on  FLOTTE_DE_VELOS.VELO.NUMERO_STATION=FLOTTE_DE_VELOS.STATION.NUMERO_STATION 
            where ADRESSE_STATION='$adresse_station';";
    $result = $conn->query($sql);
    $Array=array();
    while ($row = $result->fetch_assoc()) {
        $subarray=array(
            "NUMERO_REFERENCE" => $row["NUMERO_REFERENCE"],
            "MARQUE" => $row["MARQUE"],
            "KILOMETRAGE" => $row["KILOMETRAGE"],
            "NIVEAU_CHARGE" => $row["NIVEAU_CHARGE"]
        );
        array_push($Array,$subarray);
     }
    return $Array;
}

function getNumberOfVelos($adresse_station){
    global $conn;
    $sql = "SELECT count(*) as NBR_VELOS from FLOTTE_DE_VELOS.VELO inner join FLOTTE_DE_VELOS.STATION
            on  FLOTTE_DE_VELOS.VELO.NUMERO_STATION=FLOTTE_DE_VELOS.STATION.NUMERO_STATION 
            where ADRESSE_STATION='$adresse_station';";
    $result = $conn->query($sql);
    $data=$result->fetch_assoc()["NBR_VELOS"];
    return $data;
}

?>