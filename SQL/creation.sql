-- ============================================================
--   Nom de la base   :  VELO                                
--   Nom de SGBD      :  ORACLE Version 7.0                    
--   Date de creation :  14/11/21  15:32                       
-- ============================================================
drop index VELO_PK;

drop index VELO_FK1;  

drop table VELO cascade constraints; 

--drop index USAGER_PK;

drop table USAGER cascade constraints;

--drop index STATION_PK;

drop table STATION cascade constraints;

--drop index EMPRUNT_PK;

drop index EMPRUNT_FK1;  

drop index EMPRUNT_FK2;

drop index EMPRUNT_FK3;  

drop index EMPRUNT_FK4;

drop table EMPRUNT cascade constraints; 

--drop index ETRE_DISTANT_PK;

drop index ETRE_DISTANT_FK1;  

drop index ETRE_DISTANT_FK2;

drop table ETRE_DISTANT cascade constraints; 





-- ============================================================
--   Table : VELO                                            
-- ============================================================
create table VELO
(
    NUMERO_REFERENCE                NUMBER(4)              not null,
    MARQUE                          CHAR(20)                       ,                      
    KILOMETRAGE                     NUMBER(4)                       ,
    DATE_DE_MISE_EN_SERVICE         DATE                           ,
    NIVEAU_CHARGE                   DECIMAL(4)                      ,
    NUMERO_STATION                  NUMBER(4)                        ,
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
    NUMERO_USAGER                   NUMBER(4)              not null,
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
    NUMERO_STATION                   NUMBER(4)              not null,
    ADRESSE_STATION                  CHAR(20)                       ,
    NOMBRE_BORNES                    NUMBER(4)                      ,
    COMMUNE                          CHAR(20)                       ,
    constraint pk_station primary key (NUMERO_STATION)
); 


-- ============================================================
--   Table : EMPRUNT                                             
-- ============================================================
create table EMPRUNT
(
    NUMERO_EMPRUNT                  NUMBER(3)              not null,
    DATE_DEPART               DATE                           ,
    DATE_RETOUR               DATE                           ,
    NUMERO_USAGER             NUMBER(4)                      not null,
    NUMERO_REFERENCE          NUMBER(4)                      not null,
    NUMERO_STATION_DEPART            NUMBER(4)               not null,
    NUMERO_STATION_ARRIVEE            NUMBER(4)              ,
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
    NUMERO_STATION_DEPART            NUMBER(4)               not null,
    NUMERO_STATION_ARRIVEE            NUMBER(4)              not null, 
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