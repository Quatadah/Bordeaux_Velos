--Informations sur les vélos, les stations, les adhérents.
SELECT * from VELO;
SELECT * from STATION;
SELECT * from USAGER;

-- Selection des nouveaux vélos (avec des kilométrages < 100)
select *
from VELO
where KILOMETRAGE < 100;


---- liste de vélos par station
SELECT STATION.ADRESSE_STATION, VELO.* 
from VELO inner join STATION 
on VELO.NUMERO_STATION=STATION.NUMERO_STATION
order by VELO.NUMERO_STATION;


----liste de vélos en cours d'utilisation
SELECT VELO.* 
from VELO inner join EMPRUNT  
on VELO.NUMERO_REFERENCE=EMPRUNT.NUMERO_REFERENCE
where EMPRUNT.DATE_RETOUR IS NULL;

-------liste de station dans une commune donnée 
SELECT *
from STATION 
where STATION.COMMUNE='Bordeaux'; 


------Liste des adhérents qui ont emprunté plusieurs au moins deux vélos différents pour un jour
------donné
SELECT USAGER.*
from USAGER inner join EMPRUNT 
on USAGER.NUMERO_USAGER=EMPRUNT.NUMERO_USAGER
where DATE(EMPRUNT.DATE_DEPART)='2021-11-30'
group by USAGER.NUMERO_USAGER
having count(NUMERO_REFERENCE)>=2;


