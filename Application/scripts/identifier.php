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
$identifier = "";
$identifierErr = "";
$existOrNot = "";

function checkExistence($id) : bool{
    global $conn;
    $sql = "SELECT * from FLOTTE_DE_VELOS.USAGER
            where NUMERO_USAGER = '$id' ;";
    $result = $conn->query($sql);
    return $result->num_rows == 1;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $identifier = test_input($postData["id"]);
    if (empty($identifier)){
        $identifierErr = "Le champ identifiant est requis pour se connecter";
    }else {
        if (checkExistence($identifier)){
            $_SESSION["USER_FULLNAME"] = getFullNameById($conn, $identifier);
            $_SESSION["LOGGED_USER"] = $identifier;
            sleep(1);
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'index.php';
            header("Location: http://$host$uri/$extra");
            exit;   
        } else {
            $existOrNot = "<span class='error'>Cet identifiant n'existe pas</span>";
        }
    }
    
}
$conn->close();

?>