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
    
    }

    function addStation(){

    }

    function deleteVelo(){

    }

    function deleteStation(){

    }


?>