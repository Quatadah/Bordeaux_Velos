<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/app.css"> 
    <title>Flotte de vélos</title>
</head>
<body>
    <?php include_once "header.php"; ?>
    <section>
        <?php //include_once "consult.php"; ?>
        

        <?php if(!isset($_SESSION["LOGGED_USER"])) : ?>
            <div class="container">
                <div id="bicycle-img">
                    <img id="img" src="./images/bike.jpg" alt="velo">
                </div>
                <div class  ="main">
                    <div id="form-user">
                        <h1> Se connecter </h1>
                        <?php include_once "scripts/identifier.php"; ?>
                        <form class="connexion" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                            <input class="form-ele" name="id" type="text" placeholder="Identifiant">
                            <span class="error"> <?php echo $identifierErr ?></span>
                            <a href="index.php"><input id="btn" class="form-ele" type="submit" value="Se connecter"></a>
                            <?php echo $existOrNot; ?>
                        </form> 

                        <div id="creer-compte">
                            <p>Vous êtes un nouvel utilisateur ?</p>
                            <a class="sub" href="connexion.php">Créer un compte</a>
                            <a class="sub" href="mode.php">Retourner vers choix du mode</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <?php include_once "home.php"; ?>
        <?php endif; ?>
    </section>
</body>
</html>