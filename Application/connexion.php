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
    <?php include "header.php"; ?>
    <section>
            <div class="container">
                <div id="bicycle-img">
                    <img id="img" src="./images/bike.jpg" alt="velo">
                </div>
                <div class="main">
                    <div id="form-user-account-creation">
                        <h1>Créer un nouveau compte </h1>
                        <form class="connexion" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input placeholder="Nom" class="form-ele" type=text id="name" name="name">
                            <input placeholder="Prénom" class="form-ele" type=text id="firstname" name="firstname">
                            <input placeholder="Adresse" class="form-ele" type="text" id="adress" name="address">
                            <input class="form-ele" id="btn" type=submit value="Créer compte">
                        </form>
                    </div>
                </div>
            </div>
    </section>
</body>
</html>