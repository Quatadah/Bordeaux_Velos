<?php if(!isset($_SESSION["LOGGED_USER"])) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/app.css"> 
    <title>A propos</title>
</head>
<body>
    <?php include "header.php"; ?>
    <section>
    
        <div class="container">
            <div id="bicycle-img">
                    <img id="img" src="./images/bike.jpg" alt="velo">
            </div>
            <div>
                <p> Ce projet a été réalisée par : Quatadah Nasdami - Doha Sadiq - Ghofrane Hamdouni
            </div>
        </div>
    </section>
</body>
</html>