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
$search = "";
$searchErr = "";


function communeExists($commune){
    global $conn;
    $existingCommunes = toUpperArrayOfStrings(queryCommunes($conn));
    return in_array(strtoupper($commune),$existingCommunes);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $search = test_input($postData["search"]);
    if (empty($search)){
        $searchErr = "Aucune commune n'a été entrée";
    } else {
        if (!communeExists($search)){
            $searchErr = "Pas de station trouvée pour cette commune";
        } else {
            $searchErr = "Commune trouvée";
        }
    }

}


$conn->close();
?>