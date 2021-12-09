
DELIMITER //
CREATE OR REPLACE PROCEDURE retourner_emprunt(date_retour DATETIME,station INT, numero_emprunt INT ) 
BEGIN
    update EMPRUNT 
    SET EMPRUNT.DATE_RETOUR= date_retour
    WHERE EMPRUNT.NUMERO_EMPRUNT=numero_emprunt;
    update EMPRUNT 
    SET EMPRUNT.STATION_RETOUR = station
    WHERE EMPRUNT.NUMERO_EMPRUNT=numero_emprunt;
END // 


DELIMITER //

CREATE OR REPLACE PROCEDURE changer_station_velo(station INT, reference INT) 
BEGIN
    update VELO 
    SET VELO.NUMERO_STATION=station
    WHERE VELO.NUMERO_REFERENCE=reference;
END // 


DELIMITER //
CREATE OR REPLACE PROCEDURE augmenter_kilometrage_velo(station_depart INT, station_arrivee INT, reference INT)
BEGIN
declare km INT;
    SELECT DISTANCE into km from ETRE_DISTANT WHERE (NUMERO_STATION_DEPART=station_depart AND NUMERO_STATION_ARRIVEE=station_arrivee); 
    update VELO
    SET VELO.KILOMETRAGE=VELO.KILOMETRAGE+km
    WHERE VELO.NUMERO_REFERENCE=reference;
END //




DELIMITER //
CREATE OR REPLACE PROCEDURE  supprimer_velo(reference INT)
BEGIN
    DELETE from VELO
    WHERE VELO.NUMERO_REFERENCE=reference;
END //



DELIMITER //
CREATE OR REPLACE PROCEDURE  supprimer_emprunt(reference INT)
BEGIN
    DELETE from EMPRUNT
    WHERE EMPRUNT.NUMERO_EMPRUNT=reference;
END //



DELIMITER //
CREATE OR REPLACE PROCEDURE  supprimer_station(reference INT)
BEGIN
    DELETE from STATION
    WHERE STATION.NUMERO_STATION=reference;
END //



DELIMITER //
CREATE OR REPLACE PROCEDURE  supprimer_usager(reference INT)
BEGIN
    DELETE from USAGER
    WHERE USAGER.NUMERO_USAGER=reference;
END //


DELIMITER //
CREATE OR REPLACE PROCEDURE diminuer_niveau_charge(reference INT, distance_parcourue DECIMAL, date_prise DATE, date_rendu DATE )
BEGIN
    DECLARE charge INT;
    DECLARE marque CHAR(20);
    DECLARE d DECIMAL;
    SELECT VELO.NIVEAU_CHARGE into charge  FROM VELO WHERE VELO.reference=reference;
    SELECT VELO.MARQUE into marque FROM VELO WHERE VELO.reference=reference;
    SELECT DATEDIFF(date_rendu, date_prise) into d;

    CASE marque 
        WHEN 'O2Feel' THEN SET charge = charge - 2/100 * (distance_parcourue+d); 
        WHEN 'Maa Bikes' THEN SET charge = charge - 3/100 * (distance_parcourue+d); 
        WHEN 'EXS' THEN SET charge = charge - 4/100 * (distance_parcourue+d);
        WHEN 'CyclO2' THEN SET charge = charge - 5/100 * (distance_parcourue+d);
    ELSE
        SET charge = charge - 6/100*(distance_parcourue+d);
   END CASE;
    UPDATE VELO SET VELO.NIVEAU_CHARGE = charge WHERE VELO.reference=reference;
END //






DELIMITER //
CREATE OR REPLACE PROCEDURE augmenter_niveau_charge(reference INT)
BEGIN
    DECLARE station INT;
    SELECT VELO.STATION into station FROM VELO WHERE VELO.reference=reference;
    IF station is not null then 
        UPDATE VELO SET VELO.NIVEAU_CHARGE = 100 WHERE VELO.reference=reference;
    END IF;
END // 


