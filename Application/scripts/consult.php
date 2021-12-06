

<?php
    include_once "utils.php";
    include_once "consult_utils.php"

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
        $table = test_input($postData["table"]);
        $sql = "SELECT * from FLOTTE_DE_VELOS.$table;";
        $result = $conn->query($sql);
        echo "$sql";
        if (strtoupper($table) == strtoupper("usager")){
            getUsagers($result);
        }    

    }
    
    

    $conn->close();
    
?>
