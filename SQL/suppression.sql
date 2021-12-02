-- ============================================================
--    suppression des donnees
-- ============================================================
drop index VELO_FK1;  

drop table VELO cascade constraints; 

drop table USAGER cascade constraints;

drop table STATION cascade constraints;

drop index EMPRUNT_FK1;  

drop index EMPRUNT_FK2;

drop index EMPRUNT_FK3;  

drop index EMPRUNT_FK4;

drop table EMPRUNT cascade constraints; 

drop index ETRE_DISTANT_FK1;  

drop index ETRE_DISTANT_FK2;

drop table ETRE_DISTANT cascade constraints; 




delete from VELO ;
delete from USAGER ;
delete from STATION ;
delete from EMPRUNT ;
delete from ETRE_DISTANT ;

commit ;
