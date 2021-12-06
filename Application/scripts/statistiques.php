<?php
    include_once "utils.php";
    include_once "stat_utils.php";
    include_once "consult_utils.php";


$sql1="SELECT avg(NBR_USAGER)/30 as MOYENNE_NBR_USAGERS
from
(
SELECT count(*) as NBR_USAGER, DATEDIFF(DATE(NOW()),DATE(DATE_DEPART)) as DIFFDATE
from EMPRUNT inner join VELO 
on EMPRUNT.NUMERO_REFERENCE=VELO.NUMERO_REFERENCE
where DATEDIFF(DATE(NOW()),DATE(DATE_DEPART))<=30
group by VELO.NUMERO_REFERENCE
) A;";

$result1 = $conn->query($sql1);
getMoyNbrUsagers($result);


$sql="SELECT avg(DISTANCE_TOTALE) as DISTANCE_MOYENNE
from
(
SELECT sum(DISTANCE) as DISTANCE_TOTALE, DATEDIFF(DATE(NOW()),DATE(DATE_DEPART)) as DIFFDATE
from (VELO inner join EMPRUNT on VELO.NUMERO_REFERENCE=EMPRUNT.NUMERO_REFERENCE)
inner join ETRE_DISTANT
on EMPRUNT.NUMERO_STATION_DEPART=ETRE_DISTANT.NUMERO_STATION_DEPART 
and EMPRUNT.NUMERO_STATION_ARRIVEE=ETRE_DISTANT.NUMERO_STATION_ARRIVEE 
where DATEDIFF(DATE(NOW()),DATE(DATE_DEPART))<=7
group by VELO.NUMERO_REFERENCE
) A;";
$result = $conn->query($sql);
getMoyDistParcourues($result);

$sql="SELECT *
from STATION
order by COMMUNE,NOMBRE_BORNES desc;
";
$result = $conn->query($sql);
getStations($result);

$sql="SELECT STATION.ADRESSE_STATION, VELO.*
from STATION inner join VELO 
on STATION.NUMERO_STATION=VELO.NUMERO_STATION
order by STATION.NUMERO_STATION,NIVEAU_CHARGE desc;";
$result = $conn->query($sql);
getVelosByStation($result);


?>