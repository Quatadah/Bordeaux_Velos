<?php

function addEmprunt($usager,$velo,$station){
        global $conn;
        $date=Date('Y-m-d h:m:s');
        $sql="
            insert into FLOTTE_DE_VELOS.EMPRUNT(DATE_DEPART,NUMERO_USAGER,NUMERO_REFERENCE,NUMERO_STATION_DEPART) values ('$date', '$usager' , '$velo','$station');
        "
        $result = $conn->query($sql);
        if ($result instanceof object)
             echo "Emprunt ajouté";
        else 
            echo "Échec d'ajout de l'emprunt"
    }

function updateEmprunt($emprunt,$station){
        global $conn;
        $date=Date('Y-m-d h:m:s');
        $sql="UPDATE FLOTTE_DE_VELOS.EMPRUNT
                set DATE_RETOUR='$date', NUMERO_STATION_ARRIVEE='$station' 
                where NUMERO_EMPRUNT='$emprunt';
        "
        $result = $conn->query($sql);
        if ($result instanceof object)
             echo "Vélo retourné";
    }


?>