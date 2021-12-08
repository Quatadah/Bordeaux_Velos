<?php
    include_once "utils.php";

    $postData = $_POST;
    $maj = "";
    
    $counter = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($postData["majchoice"])){
            $maj = $postData["majchoice"];
        }
    }

?>