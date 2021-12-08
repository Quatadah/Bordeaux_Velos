<?php if(!isset($_SESSION["LOGGED_USER"])) session_start();  unset($_SESSION["DATE_EMPRUNT"]); ?>
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
    <?php include_once("scripts/station_handler.php"); ?>
    <?php include_once "header.php" ?>
    <section>
        <h1>
            <?php echo "Bienvenue ". $_SESSION["USER_FULLNAME"] ?>
        </h1>

        <div class="container2">
            <h1 class="titles"><?php echo $_SESSION["STATION_NAME"] ?></h1>
            <div id="bicycle-img">
                    <img id="img" src="./images/bike.jpg" alt="velo">
            </div>
            <h2 class="titles"><?php echo $nbVelosDisponible. " vélos disponibles"; ?></h2>
            <form class='form' method="post" action="emprunt.php" >
                <?php showVelosDisponible(); ?>
            </form>
        </div>
    </section>
</body>
</html>