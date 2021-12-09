<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/mode.css">
    <link rel="stylesheet" href="style/general.css">
    <link rel="stylesheet" href="style/app.css">
    <title>Mode</title>
</head>
<body>
    <?php include_once "header.php" ?>
    <section>
        <div class="container container2">
            <div id="choix-mode">
                <h1>Choix du mode</h1>
            </div>
            <div id="parag">
                <p>
                    Choississez le mode selon lequel vous voulez utiliser l'application </p>
            </div>  
            <ul class="mode-list">
                <li class="choix"><a href="index.php">Utilisateur</a></li>
                <li class="choix"><a href="admin/admin.php">Administrateur</a></li>
            </ul>
        </div>
    </section>
</body>
</html>