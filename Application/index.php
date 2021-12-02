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
    <?php include "header.php"; ?>
    <section>
        <?php include "consult.php"; ?>
        <div class="container">
            <div id="bicycle-img">
                <img id="img" src="./images/bike.jpg" alt="velo">
            </div>
            <div class  ="main">
                <div id="form-user">
                    <h1> Se connecter </h1>
                    <form class="connexion" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                        <input class="form-ele" name="id" type="text" placeholder="Identifiant">
                        <a href="index.php"><input id="btn" class="form-ele" type="submit" value="Se connecter"></a>
                    </form> 
                    <div id="creer-compte">
                        <p>Vous êtes un nouvel usager ?</p>
                        <a id="a" href="connexion.php">Créer un compte</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>