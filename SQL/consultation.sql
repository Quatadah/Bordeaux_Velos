--Informations sur les vélos, les stations, les adhérents.
SELECT * from VELO;
SELECT * from STATION;
SELECT * from USAGER;

-- Selection des vélos par leur kilométrage 
DELIMITER //
CREATE OR REPLACE PROCEDURE  condition_kilometrage(km INT)
BEGIN
select *
from VELO
where KILOMETRAGE < km;
END //
CALL condition_kilometrage(100);


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
DELIMITER //
CREATE OR REPLACE PROCEDURE  station_par_commune(commune CHAR(20))
BEGIN
SELECT *
from STATION 
where STATION.COMMUNE=commune; 
END //


CALL station_par_commune('Bordeaux');

------Liste des adhérents qui ont emprunté plusieurs au moins deux vélos différents pour un jour
------donné
DELIMITER //
CREATE OR REPLACE PROCEDURE  adherants_avec_plusieurs_velos_par_jour(date DATE)
BEGIN
SELECT USAGER.*
from USAGER inner join EMPRUNT 
on USAGER.NUMERO_USAGER=EMPRUNT.NUMERO_USAGER
where DATE(EMPRUNT.DATE_DEPART)=date
group by USAGER.NUMERO_USAGER
having count(NUMERO_REFERENCE)>=2;
END //

CALL adherants_avec_plusieurs_velos_par_jour('2021-11-30');

