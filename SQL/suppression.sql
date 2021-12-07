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


drop PROCEDURE update_date_retour_emprunt ;
drop PROCEDURE update_station_retour_emprunt ;
drop PROCEDURE changer_station_velo ;
drop PROCEDURE augmenter_kilometrage_velo ;
drop PROCEDURE supprimer_velo ;
drop PROCEDURE supprimer_station ;
drop PROCEDURE supprimer_usager ;
drop PROCEDURE supprimer_emrpunt ; 
drop PROCEDURE augmenter_niveau_charge ;
drop PROCEDURE diminuer_niveau_charge ; 



commit ;
