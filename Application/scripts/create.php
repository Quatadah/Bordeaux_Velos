
<?php
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

function test_input($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

$lastname = test_input($postData["name"]);
if (empty($lastname)){
    $lastnameErr = "Le champ nom est requis";
}

$firstname = test_input($postData["firstname"]);
if (empty($firstname)){
    $firstnameErr = "Le champ prénom est requis";
}

$address = test_input($postData["address"]);
if (empty($address)){
    $addressErr = "Le champ adresse est requis";
}
function dataVerified($data){
    return !empty($data);
}

function verifiedUserNonExistence($conn, $lastname, $firstname, $address) : bool{
    $sql = "SELECT * from FLOTTE_DE_VELOS.USAGER 
    where NOM_USAGER = '$lastname' and PRENOM_USAGER = '$firstname' and 
    ADRESSE_USAGER = '$address' ";
    $result = $conn->query($sql);
    return $result->num_rows === 0 ;
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

function getId() : int{
    global $conn, $lastname, $firstname, $address;
    $sql = "SELECT * from FLOTTE_DE_VELOS.USAGER
            where NOM_USAGER = '$lastname' and
            PRENOM_USAGER = '$firstname' and 
            ADRESSE_USAGER = '$address'; ";
    $result = $conn->query($sql);
    return $result->fetch_assoc()["NUMERO_USAGER"];
}

if (!empty($lastname) && !empty($firstname) && (!empty($address))){
    if(verifiedUserNonExistence($conn, $lastname, $firstname, $address)){
        addUser($conn, $lastname, $firstname, $address);
        echo "Voici ton identifiant : " . getId() . "<br>";
    } else {
        echo $existent . "<br>";
    }
}

$conn->close();
?>