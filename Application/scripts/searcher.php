<?php

include_once "utils.php";
include_once "utils2.php";


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
$station = "";

function communeExists($commune){
    global $conn;
    $existingCommunes = toUpperArrayOfStrings(queryCommunes($conn));
    return in_array(strtoupper($commune),$existingCommunes);
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $search = test_input($postData["search"]);
    $_SESSION["COMMUNE_NAME"] = $search;
    if (empty($search)){
        $searchErr = "Aucune commune n'a été entrée";
    } else {
        if (!communeExists($search)){
            $searchErr = "Pas de station trouvée pour cette commune";
        } else {
            $stations = getStationsNamesByCommune($conn, $search);
            $links = [];
            $i = 0;

            foreach ($stations as $station){
                $links[] = strtolower(strReplaceWeirdChars($station));
                $i += 1;
            }



            $j = 0;
            echo "<form method='post' action='station.php'>";
            echo "<div class='stations'>";
            foreach($stations as $station){
                echo "<button class='btn' type='submit' name='$links[$j]' class='station-ele'>$station</button>";
                $j += 1;
            }
            echo "</div>";
            echo "</form>";
            
        }
    }

}


$conn->close();
?>