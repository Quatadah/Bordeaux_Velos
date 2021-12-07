<?php
function test_input($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

function verifiedUserNonExistence($conn, $lastname, $firstname, $address) : bool{
    $sql = "SELECT * from FLOTTE_DE_VELOS.USAGER 
    where NOM_USAGER = '$lastname' and PRENOM_USAGER = '$firstname' and 
    ADRESSE_USAGER = '$address' ";
    $result = $conn->query($sql);
    return $result->num_rows === 0 ;
}

function getId() : int{
    global $conn, $lastname, $firstname, $address;
    $sql = "SELECT * from FLOTTE_DE_VELOS.USAGER
            where NOM_USAGER = '$lastname' and
            PRENOM_USAGER = '$firstname' and 
            ADRESSE_USAGER = '$address'; ";
    $result = $conn->query($sql);
    return $result->fetch_assoc()["NUMERO_USAGER"];
}

function getFullNameById($conn, $id) : string{
    $sql = "SELECT * from FLOTTE_DE_VELOS.USAGER
            where NUMERO_USAGER = '$id';";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    return $data["NOM_USAGER"] . " " . $data["PRENOM_USAGER"];
}

function queryCommunes($conn) {
    $sql = "SELECT distinct COMMUNE from FLOTTE_DE_VELOS.STATION;";
    $result = $conn->query($sql);
    return [$result->fetch_assoc()["COMMUNE"], $result->fetch_assoc()["COMMUNE"],
    $result->fetch_assoc()["COMMUNE"]];
}

function toUpperArrayOfStrings($arrayOfStrings){
    $newUpperCasedArray = [];
    foreach($arrayOfStrings as $string){
        $newUpperCasedArray[] = strtoupper($string);
    }
    return $newUpperCasedArray;
}

function strReplaceWeirdChars($string){
    $string = str_replace(' ', '', $string);
    $string = str_replace('é', 'e', $string);
    $string = str_replace('ô', 'o', $string);
    $string = str_replace('à', 'a', $string);
    $string = str_replace('è', 'e', $string);
    $string = str_replace('â', 'a', $string);
    $string = str_replace('ù', 'u', $string);
    return $string;
}
?>