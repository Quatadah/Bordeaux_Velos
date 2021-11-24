-- Selection des nouveaux vélos (avec des kilométrages < 100)
define kilometrage = 100 (NUMBER)

select *
from VELO
where KILOMETRAGE < kilometrage;


