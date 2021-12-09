
<?php

include_once "utils.php";

$login = "root";
$password = "";
$servername = "localhost";
//create connetion
$conn = new mysqli($servername, $login, $password);
//check connection
if ($conn->connect_error) {
    die("Connection failed :" . $conn->connect_error);
}

$postData = $_POST;
$lastname = "";
$lastnameErr = "";
$firstname = "";
$firstnameErr = "";
$address = "";
$addressErr = "";


$added = "";
$existent = "<span class='error'> Utilisateur dèja existant </span>";


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $lastname = test_input($postData["name"]);
    if (empty($lastname)){
        $lastnameErr = "Le champ nom est requis";
    }
    
    $firstname = test_input($postData["firstname"]);
    if (empty($firstname)){
        $firstnameErr = "Le champ prénom est requis";
    }
    
    $address = $postData["address"];
    if (empty($address)){
        $addressErr = "Le champ adresse est requis";
    }
}
function dataVerified($data){
    return !empty($data);
}



function addUser($conn, $lastname, $firstname, $address){
    global $added;
    $date = Date('Y-m-d');
    $sql = "INSERT INTO FLOTTE_DE_VELOS.USAGER(NOM_USAGER, PRENOM_USAGER, 
    ADRESSE_USAGER, DATE_ADHESION) VALUES ('$lastname', '$firstname', '$address', '$date')";
    $result = $conn->query($sql);
    
    if ($result == false ){ 
        echo "<span class='error'>Le système n'a pas pu ajouter cet utilisateur </span><br>";
    }else {$added = "L'utilisateur a été ajouté<br>";}
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (!empty($lastname) && !empty($firstname) && (!empty($address))){
        if(verifiedUserNonExistence($conn, $lastname, $firstname, $address)){
            addUser($conn, $lastname, $firstname, $address);
            echo "Voici ton identifiant : " . getId() . "<br>";
        } else {
            echo $existent . "<br>";
        }
    }
}

$conn->close();
?>