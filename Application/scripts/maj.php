<?php
    include_once "utils.php";

    $postData = $_POST;
    $maj = "";
    
    // Pour ajouter un vélo
    $marque = "";
    $kilometrage = "";
    $ndc = "";
    $nds = "";

    // Pour ajouter une station
    $adresse = "";
    $ndbornes = "";
    $commune = "";

    // Pour supprimer un vélo
    $numrefvelo = 0;

    // Pour supprimer une station 
    $numrefstation = 0;

    if (!isset($_POST["ajoutvelo"])){
        echo "hello it's me<br> ";  
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $maj = $postData["majchoice"];
            echo "$maj";
    }
}

    $hello = "";
    if ($maj == "ajoutvelo"){
        echo "hello if1";
        if ($_SERVER["REQUEST_METHOD"] == "POST"){     
            $marque = $postData["marque"];
            $kilometrage = $postData["kilometrage"];
            $ndc = $postData["ndc"];
            $nds = $postData["nds"];
            echo "Ajout velo reussi";
            echo "La marque est $marque <br>";
        }
    }
        
    
    echo "hello vaut : $hello<br>";

    function addVelo(){
        $date=Date('Y-m-d');
        $sql="
            insert into FLOTTE_DE_VELOS.VELO(MARQUE,KILOMETRAGE,DATE_DE_MISE_EN_SERVICE,NIVEAU_CHARGE,NUMERO_STATION) values ('$marque', '$kilometrage' , '$date','$nbc', '$nds' );
        "
        $result = $conn->query($sql);
        if ($result instanceof object)
             echo "Vélo ajouté";
        else 
            echo "Échec d'ajout du vélo"
            
    }

    function addStation(){
        $sql="insert into FLOTTE_DE_VELOS.STATION(ADRESSE_STATION,NOMBRE_BORNES,COMMUNE) values ('$adresse', '$ndbornes' , '$commune');
        "
        $result = $conn->query($sql);
        if ($result instanceof object)
            echo "Station ajoutée"
        else
            echo "Échec d'ajout de la station"
    }

    function deleteVelo(){
        $sql="DELETE from FLOTTE_DE_VELOS.EMPRUNT where NUMERO_REFERENCE=$numrefvelo;
        DELETE from FLOTTE_DE_VELOS.VELO where NUMERO_REFERENCE=$numrefvelo;"
        $result = $conn->query($sql);
     
        if ($result instanceof object)
            echo "Vélo supprimé";
        else
            echo "Échec de supprssion du vélo"
    }
    }

    function deleteStation(){
        
        $sql="DELETE from FLOTTE_DE_VELOS.EMPRUNT where NUMERO_STATION_DEPART=$numrefstation || NUMERO_STATION_ARRIVEE=$numrefstation;
        DELETE from FLOTTE_DE_VELOS.ETRE_DISTANT where NUMERO_STATION_DEPART=$numrefstation || NUMERO_STATION_ARRIVEE=$numrefstation;
        DELETE from FLOTTE_DE_VELOS.VELO where NUMERO_STATION=$numrefstation;
        DELETE from FLOTTE_DE_VELOS.STATION where NUMERO_STATION=$numrefstation;"
        $result = $conn->query($sql);
        if ($result instanceof object)
            echo "Station supprimée"
        else
            echo "Échec de suppression de la station"
    }


?>