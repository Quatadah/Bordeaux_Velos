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
        <div class="main">
            <h1>Créer un nouveau compte </h1>
            <form class="connexion" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label class="form-ele" for="name">Nom</label>
                <input type=text id="name" name="name">
                <label class="form-ele" for="firstname">Prénom</label>
                <input type=text id="firstname" name="firstname">
                <label class="form-ele" for="address">Adresse</label>
                <input type="text" id="adress" name="address">
                <input id="btn" type=submit value="Créer compte">
            </form>
        </div>
    </section>
</body>
</html>