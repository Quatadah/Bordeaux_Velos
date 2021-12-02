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
?>