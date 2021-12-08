<?php 
if(!isset($_SESSION["LOGGED_USER"])){ 
    session_start();
    /*
    include_once "scripts/utils.php";
    $login = "root";
    $password = "";
    $servername = "localhost";

    //create connetion
    $conn = new mysqli($servername, $login, $password);

    //check connection
    if ($conn->connect_error) {
        die("Connection failed :" . $conn->connect_error);
    }

    $id = $_SESSION["LOGGED_USER"];
    $sql = "SELECT FLOTTE_DE_VELOS.EMPRUNT.* from FLOTTE_DE_VELOS.EMPRUNT 
            where NUMERO_USAGER = '$id' and NUMERO_STATION_ARRIVEE = NULL;";
    $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $_SESSION["NUM_VELO_EMPRUNTE"] = $row["NUMERO_REFERENCE"];
        $_SESSION["EMPRUNT"] = True;
        $_SESSION["DATE_EMPRUNT"] = $row["DATE_DEPART"];
        $_SESSION["STATION_NAME"] = getStationNameById($row["STATION_NAME_DEPART"]);

    echo $row["NUMERO_REFERENCE"];  
    */
    if (isset($_SESSION["EMPRUNT"])){
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'emprunt.php';
        header("Location: http://$host$uri/$extra");
        exit;   
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/app.css"> 
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/station.css">
    <title>Profil utilisateur</title>
</head>
<body>
    <?php include_once "header.php" ?>
    <section>
        <h1>
            <?php echo "Bienvenue ". $_SESSION["USER_FULLNAME"] ?>
        </h1>
        <div class="search-title">
            <img id="search-img" src="images/search.png" alt="logo">
            <h1>Rechercher</h1>
        </div>
        <div class="container2">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
            <div id="input_container">
                <input id="input" class="form-ele" name="search" type="text" placeholder="Chercher commune">
                <img src="images/search.png" height="20" width="20" id="input_img">
            </div>
            </form>
            <?php include_once "scripts/searcher.php"; ?>
            <?php  echo $searchErr; ?>
            
        </div>
    </section>
</body>
</html>