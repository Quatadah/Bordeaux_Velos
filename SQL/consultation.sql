-- Selection des nouveaux vélos (avec des kilométrages < 100)
define kilometrage = 100 (NUMBER)

select *
from VELO
where KILOMETRAGE < kilometrage;


-- Selection des nouveaux vélos (avec des kilométrages < 100)
define kilometrage = 100 (NUMBER)

select *
from VELO
where KILOMETRAGE < kilometrage;


---- liste de vélos par station

SELECT * 
from VELO join STATION 
on VELO.NUMERO_STATION=STATION.NUMERO_STATION
group by STATION.NUMERO_STATION ;  


----liste de vélos en cours d'utilisation


SELECT * 
from VELO join EMPRUNT  
on VELO.NUMERO_REFERENCE=EMPRUNT.NUMERO_REFERENCE
where EMPRUNT.DATE_RETOUR=null;

-------liste de station dans une commune donnée 

SELECT *
from STATION 
where STATION.COMMUNE=''; 


------Liste des adhérents qui ont emprunté plusieurs au moins deux vélos différents pour un jour
------donné

SELECT USAGER
from USAGER join EMPRUNT
on USAGER.NUMERO_USAGER=EMPRUNT.NUMERO_USAGER
where  EMPRUNT.DATE_DEPART='' and (count(*)
      SELECT distinct VELO.MARQUE 
      from VELO 
      where EMPRUNT.NUMERO_REFERENCE=VELO.NUMERO_REFERENCE  ) >=2 