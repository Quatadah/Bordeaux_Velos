-- ============================================================
--   Nom de la base   :  VELO                                
--   Nom de SGBD      :  MySql                  
--   Date de creation :  14/11/21  15:32                       
-- ============================================================

create database FLOTTE_DE_VELOS;
use FLOTTE_DE_VELOS;
-- ============================================================
--   Table : VELO                                            
-- ============================================================
create table VELO
(
    NUMERO_REFERENCE                INT(3)              not null AUTO_INCREMENT,
    MARQUE                          CHAR(20)                       ,                      
    KILOMETRAGE                     INT(6)                       ,
    DATE_DE_MISE_EN_SERVICE         DATE                           ,
    NIVEAU_CHARGE                   DECIMAL(4)                      ,
    NUMERO_STATION                  INT(4)                        ,
    constraint pk_velo primary key (NUMERO_REFERENCE)
); 


-- ============================================================
--   Index : VELO_FK1                                         
-- ============================================================
create index VELO_FK1 on VELO (NUMERO_STATION asc);


-- ============================================================
--   Table : USAGER                                             
-- ============================================================
create table USAGER
(
    NUMERO_USAGER                   INT(4)              not null AUTO_INCREMENT,
    NOM_USAGER                      CHAR(20)               not null,
    PRENOM_USAGER                   CHAR(20)                       ,
    ADRESSE_USAGER                  CHAR(20)                       ,
    DATE_ADHESION                    DATE                           ,
    constraint pk_usager primary key (NUMERO_USAGER)
); 

-- ============================================================
--   Table : STATION                                             
-- ============================================================
create table STATION
(
    NUMERO_STATION                   INT(4)              not null AUTO_INCREMENT,
    ADRESSE_STATION                  CHAR(20)                       ,
    NOMBRE_BORNES                    INT(4)                      ,
    COMMUNE                          CHAR(20)                       ,
    constraint pk_station primary key (NUMERO_STATION)
); 


-- ============================================================
--   Table : EMPRUNT                                             
-- ============================================================
create table EMPRUNT
(
    NUMERO_EMPRUNT                  INT(3)              not null AUTO_INCREMENT,
    DATE_DEPART               DATETIME                          ,
    DATE_RETOUR               DATETIME                           ,
    NUMERO_USAGER             INT(4)                      not null,
    NUMERO_REFERENCE          INT(4)                      not null,
    NUMERO_STATION_DEPART            INT(4)               not null,
    NUMERO_STATION_ARRIVEE            INT(4)              ,
    constraint pk_emprunt primary key (NUMERO_EMPRUNT)
); 


-- ============================================================
--   Index : EMPRUNT_FK1                                         
-- ============================================================
create index EMPRUNT_FK1 on EMPRUNT (NUMERO_USAGER asc);

-- ============================================================
--   Index : EMPRUNT_FK2                                         
-- ============================================================
create index EMPRUNT_FK2 on EMPRUNT (NUMERO_REFERENCE asc);

-- ============================================================
--   Index : EMPRUNT_FK3                                         
-- ============================================================
create index EMPRUNT_FK3 on EMPRUNT (NUMERO_STATION_DEPART asc);

-- ============================================================
--   Index : EMPRUNT_FK4                                        
-- ============================================================
create index EMPRUNT_FK4 on EMPRUNT (NUMERO_STATION_ARRIVEE asc);

-- ============================================================
--   Table : ETRE_DISTANT                                            
-- ============================================================

create table ETRE_DISTANT
(
    NUMERO_STATION_DEPART            INT(4)               not null,
    NUMERO_STATION_ARRIVEE            INT(4)              not null, 
    DISTANCE                          DECIMAL(4)                                      ,
    constraint pk_etre_distant primary key (NUMERO_STATION_DEPART, NUMERO_STATION_ARRIVEE)
);

-- ============================================================
--   Index : ETRE_DISTANT_FK1                                        
-- ============================================================
create index ETRE_DISTANT_FK1 on ETRE_DISTANT (NUMERO_STATION_DEPART asc);

-- ============================================================
--   Index : ETRE_DISTANT_FK2                                        
-- ============================================================
create index ETRE_DISTANT_FK2 on ETRE_DISTANT (NUMERO_STATION_ARRIVEE asc);

-- ============================================================
--   Clés étrangères                                             
-- ============================================================

alter table VELO
    add constraint fk1_velo foreign key (NUMERO_STATION)
       references STATION (NUMERO_STATION);

alter table EMPRUNT
    add constraint fk1_emprunt foreign key (NUMERO_USAGER)
       references USAGER (NUMERO_USAGER);

alter table EMPRUNT
    add constraint fk2_emprunt foreign key (NUMERO_REFERENCE)
       references VELO (NUMERO_REFERENCE);

alter table EMPRUNT
    add constraint fk3_emprunt foreign key (NUMERO_STATION_DEPART)
       references STATION (NUMERO_STATION);

alter table EMPRUNT
    add constraint fk4_emprunt foreign key (NUMERO_STATION_ARRIVEE)
       references STATION (NUMERO_STATION);

alter table ETRE_DISTANT
    add constraint fk1_etre_distant foreign key (NUMERO_STATION_DEPART)
       references STATION (NUMERO_STATION);

alter table ETRE_DISTANT
    add constraint fk2_etre_distant foreign key (NUMERO_STATION_ARRIVEE)
       references STATION (NUMERO_STATION);


-- ============================================================
--   Procédures utiles pour les triggers                                              
-- ============================================================
DELIMITER //

CREATE PROCEDURE validite_dates(date1 DATETIME,date2 DATETIME) 
BEGIN
if date2 is not null then 
    if date1 > date2 then 
        signal SQLSTATE'45000' set MESSAGE_TEXT= 'La date de retour doit être supérieure à la date de départ';
    end if; 
end if; 
END //

DELIMITER //

CREATE PROCEDURE changer_station_velo(station INT, reference INT) 
BEGIN
    update VELO 
    set VELO.NUMERO_STATION=station
    where VELO.NUMERO_REFERENCE=reference;
END //

DELIMITER //

CREATE PROCEDURE augmenter_kilometrage_velo(station_depart INT, station_arrivee INT, reference INT)
BEGIN
    declare km;
    select DISTANCE into km from ETRE_DISTANT where (NUMERO_STATION_DEPART=station_depart AND NUMERO_STATION_ARRIVEE=station_arrivee); 
    update VELO
    set VELO.KILOMETRAGE+=km
    where VELO.NUMERO_REFERENCE=reference;
END //
-- ============================================================
--   Triggers                                             
-- ============================================================

--Avant toute insertion dans velo: vérifier que nombre de bornes de la station du velo n'est pas atteint 
DELIMITER //

create or replace trigger NOMBRE_BORNES
before insert on VELO
for each row 
begin 
    declare nb int ;
    declare lim int;
    select count(*) into nb from VELO where NUMERO_STATION=NEW.NUMERO_STATION;
    select NOMBRE_BORNES into lim from STATION where NUMERO_STATION=NEW.NUMERO_STATION;
    if nb >= lim then 
       signal SQLSTATE'45000' set MESSAGE_TEXT= 'nombre de bornes dépassé!';
    end if;
end //

--ajout d'un emprunt sans date de retour: la nouvelle valeur de la station du vélo devient null 
DELIMITER //

create or replace trigger TAKE_VELO
after INSERT on EMPRUNT
for each row
BEGIN 
if new.DATE_RETOUR is null then 
    CALL changer_station_velo(null,new.NUMERO_REFERENCE);
end if;
end //

--ajout d'un emprunt avec date de retour: changer la station du velo + augmenter son kilometrage
DELIMITER //

create or replace trigger RETURN_VELO
after INSERT on EMPRUNT
for each row
BEGIN 
if new.DATE_RETOUR is not null then 
    CALL changer_station_velo(new.NUMERO_STATION_ARRIVEE,new.NUMERO_REFERENCE);
    CALL augmenter_kilometrage_velo(new.NUMERO_STATION_DEPART,new.NUMERO_STATION_ARRIVEE,new.NUMERO_REFERENCE);
end if;
end //



DELIMITER //

create or replace trigger BEFORE_INSERT_EMPRUNT
before INSERT on EMPRUNT
for each row
BEGIN 
declare station int;
select NUMERO_STATION into station from VELO where NUMERO_REFERENCE=new.NUMERO_REFERENCE;
if new.NUMERO_STATION_DEPART!=station then
    signal SQLSTATE'45000' set MESSAGE_TEXT= 'Le vélo sélectionné ne se trouve pas dans la station de départ';
end if;
CALL validite_dates(new.DATE_DEPART,new.DATE_RETOUR);    
if new.NUMERO_USAGER IN (SELECT NUMERO_USAGER from EMPRUNT where EMPRUNT.DATE_RETOUR IS NULL) then
    signal SQLSTATE'45000' set MESSAGE_TEXT= 'Cet usager a déjà un emprunt en cours';
end if;
end //


DELIMITER //

create or replace trigger BEFORE_UPDATE_EMPRUNT
before UPDATE on EMPRUNT
for each row
BEGIN
if new.DATE_RETOUR!=OLD.DATE_RETOUR then 
    CALL validite_dates(new.DATE_DEPART,new.DATE_RETOUR);             
end if;
end //


DELIMITER //

create or replace trigger AFTER_UPDATE_EMPRUNT
after UPDATE on EMPRUNT
for each row
BEGIN
if new.NUMERO_STATION_ARRIVEE!=old.NUMERO_STATION_ARRIVEE then 
    if new.DATE_RETOUR is not null then 
        CALL changer_station_velo(new.NUMERO_STATION_ARRIVEE,new.NUMERO_REFERENCE);
        CALL augmenter_kilometrage_velo(new.NUMERO_STATION_DEPART,new.NUMERO_STATION_ARRIVEE,new.NUMERO_REFERENCE);
    end if;       
end if;
end //
