<?php
    include_once "utils.php";
    include_once "stat_utils.php";
    include_once "consult_utils.php";


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
$stat = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $stat = $postData["stat"];
    if ($stat == "moynombre"){
        $reply = getMoyNombre();
        echo $reply;
    } else if ($stat == "moydistance"){
        $reply = getMoyDistance();
        echo $reply;
    } else if ($stat == "classementstation"){
        classementStations();
    } else if ($stat == "classementvelo"){
        classementVelos();
    }

}


function getMoyNombre(){
    global $conn;
    
    $sql="SELECT avg(NBR_USAGER)/30 as MOYENNE_NBR_USAGERS
    from
    (
        SELECT count(*) as NBR_USAGER, DATEDIFF(DATE(NOW()),DATE(DATE_DEPART)) as DIFFDATE
        from FLOTTE_DE_VELOS.EMPRUNT inner join FLOTTE_DE_VELOS.VELO 
        on FLOTTE_DE_VELOS.EMPRUNT.NUMERO_REFERENCE = FLOTTE_DE_VELOS.VELO.NUMERO_REFERENCE
        where DATEDIFF(DATE(NOW()),DATE(DATE_DEPART))<=30
        group by FLOTTE_DE_VELOS.VELO.NUMERO_REFERENCE
    ) A;";
    
    $result = $conn->query($sql);
    return $result->fetch_assoc()["MOYENNE_NBR_USAGERS"];
}

function getMoyDistance(){
    global $conn;
    $sql="SELECT avg(DISTANCE_TOTALE) as DISTANCE_MOYENNE
    from
    (
    SELECT sum(DISTANCE) as DISTANCE_TOTALE, DATEDIFF(DATE(NOW()),DATE(DATE_DEPART)) as DIFFDATE
    from (FLOTTE_DE_VELOS.VELO inner join FLOTTE_DE_VELOS.EMPRUNT on FLOTTE_DE_VELOS.VELO.NUMERO_REFERENCE=FLOTTE_DE_VELOS.EMPRUNT.NUMERO_REFERENCE)
    inner join FLOTTE_DE_VELOS.ETRE_DISTANT
    on FLOTTE_DE_VELOS.EMPRUNT.NUMERO_STATION_DEPART=FLOTTE_DE_VELOS.ETRE_DISTANT.NUMERO_STATION_DEPART 
    and FLOTTE_DE_VELOS.EMPRUNT.NUMERO_STATION_ARRIVEE=FLOTTE_DE_VELOS.ETRE_DISTANT.NUMERO_STATION_ARRIVEE 
    where DATEDIFF(DATE(NOW()),DATE(DATE_DEPART))<=7
    group by FLOTTE_DE_VELOS.VELO.NUMERO_REFERENCE
    ) A;";
    $result = $conn->query($sql);
    return $result->fetch_assoc()["DISTANCE_MOYENNE"];
}
function classementStations(){
    global $conn;
    $sql="SELECT *
    from FLOTTE_DE_VELOS.STATION
    order by COMMUNE,NOMBRE_BORNES desc;
    ";
    $result = $conn->query($sql);
    getStations($result);
}

function classementVelos(){
    global $conn;
    $sql="SELECT FLOTTE_DE_VELOS.STATION.ADRESSE_STATION, VELO.*
    from FLOTTE_DE_VELOS.STATION inner join FLOTTE_DE_VELOS.VELO 
    on FLOTTE_DE_VELOS.STATION.NUMERO_STATION=FLOTTE_DE_VELOS.VELO.NUMERO_STATION
    order by FLOTTE_DE_VELOS.STATION.NUMERO_STATION,NIVEAU_CHARGE desc;";
    $result = $conn->query($sql);
    getVelosByStation($result);
}

    $conn->close();

?>