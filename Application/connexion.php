<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/app.css"> 
    <link rel="stylesheet" href="style/conn.css">
    <title>Connexion</title>
</head>
<body>
    <?php include_once "header.php"; ?>
    
    <section>
            <div class="container">
                <div id="bicycle-img">
                    <img id="img" src="./images/bike.jpg" alt="velo">
                </div>
                <div class="main">
                    <div id="form-user-account-creation">
                        <h1>Créer un nouveau compte </h1>
                        <?php include_once "scripts/create.php"; ?>
                        <form class="connexion" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input placeholder="Nom" class="form-ele" type=text id="name" name="name">
                            <span class="error"><?php echo $lastnameErr ?></span>
                            <input placeholder="Prénom" class="form-ele" type=text id="firstname" name="firstname">
                            <span class="error"><?php echo $firstnameErr ?></span>
                            <input placeholder="Adresse" class="form-ele" type="text" id="address" name="address">
                            <span class="error"><?php echo $addressErr ?></span>
                            <input class="form-ele" id="btn" type=submit value="Créer compte">
                            <?php echo $added . "<br>" ?>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</body>
</html>