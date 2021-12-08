

<?php
    include_once "utils.php";
    include_once "consult_utils.php";

    $login = "root";
    $password = "";
    $servername = "localhost";
    
    //create connetion
    $conn = new mysqli($servername, $login, $password);
    
    //check connection      
    if ($conn->connect_error) {
        die("Connection failed :" . $conn->connect_error);
    }

    $table = "";
    $postData = $_POST;
    $sql = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $table = $postData["table"];
        $sql = "SELECT * from FLOTTE_DE_VELOS.$table;";
        $result = $conn->query($sql);

        if (strtoupper($table) == strtoupper("usager")){
            getUsagers($result);
        }
        else if (strtoupper($table) == strtoupper("velo")){
            getVelos($result);
        }
        else if (strtoupper($table) == strtoupper("station")){
            getStations($result);
        }
        else if (strtoupper($table) == strtoupper("emprunt")){
            getEmprunts($result);
        }
        else if (strtoupper($table) == strtoupper("etre_distant")){
            getEtreDistant($result);
        }   
    }
    
    

    $conn->close();
    
?>
