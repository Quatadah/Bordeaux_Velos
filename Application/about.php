<?php if(!isset($_SESSION["LOGGED_USER"])) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/app.css"> 
    <link rel="stylesheet" href="style/general.css"> 
    <title>A propos</title>
</head>
<body>
    <?php include "header.php"; ?>
    <section>
    
        <div class="container">
            <div id="bicycle-img">
                    <img id="img" src="./images/bike.jpg" alt="velo">
            </div>
            <div id="apropos">
                <p> Ce projet a été réalisée par :</p>
                <p><em>Quatadah Nasdami</em></p>
                <p><em>Doha Sadiq</em></p>
                <p><em>Ghofrane Hamdouni</em></p>


            </div>
        </div>
    </section>
</body>
</html>