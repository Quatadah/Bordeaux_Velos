<?php if(!isset($_SESSION["LOGGED_USER"])) session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/app.css"> 
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/station.css">
    <link rel="stylesheet" href="style/emprunt.css">
    <title>Profil utilisateur</title>
</head>
<body>
    <?php include_once("scripts/emprunt_handler.php"); ?>
    <?php include_once "header.php" ?>
    <section>
        <h1>
            <?php echo "Bienvenue ". $_SESSION["USER_FULLNAME"] ?>
        </h1>

        <div class="container2">
            <h1 class="titles">Votre emprunt actuel</h1>
            <div id="bicycle-img">
                    <img id="img" src="./images/bike.jpg" alt="velo">
            </div>
            <div class="infos">
                <p class="info-emprunt">Data emprunt : <?php echo $_SESSION["DATE_EMPRUNT"]; ?> </p>
                <p class="info-emprunt">Numéro vélo : <?php echo $_SESSION["NUM_VELO_EMPRUNTE"] ?></p>
                <p class="info-emprunt">Emprunté de la station : <?php echo $_SESSION["STATION_NAME"] ?></p>
                <form method="post" action="scripts/depose_emprunt.php">
                    <select class="form-ele" name="depose">
                        <?php genStationsOptions(); ?>
                    </select>                     
                    <input class="btn" type="submit" value="Déposer">                    
                </form>
            </div>
            
        </div>
    </section>
</body>
</html>