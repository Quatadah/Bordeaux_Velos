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
        <h2> Bienvenue dans notre site !</h2>
        <?php //include "consult.php"; ?>
        <div class="main">
            <div id="form-user">
                <h1> Se connecter </h1>
                <form class="connexion" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <label class="form-ele" for="id">Identifiant :</label>
                    <input class="form-ele" name="id" type="text">
                    <input id="btn" class="form-ele" type="submit" value="Se connecter">
                </form>
            </div>
            <div id="form-user">
                <h3>Vous êtes un nouvel usager ?</h3>
                <a id="btn" href="connexion.php">Créer un compte</a>
            </div>
        </div>
    </section>
</body>
</html>