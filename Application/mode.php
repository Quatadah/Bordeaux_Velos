<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/mode.css">
    <link rel="stylesheet" href="style/app.css">
    <title>Mode</title>
</head>
<body>
    <?php include_once "header.php" ?>
    <section>
        <div class="wrapper">

            <div >
                <h1>Choix du mode</h1>
            </div>
            <div>
                <p>Choisissez le mode d'utilisation de cette application selon votre besoin</p>
            </div>
            <ul id="choix-mode" >
                <li class="choix"><a href="index.php">Utilisateur</a></li>
                <li class="choix"><a href="admin/admin.php">Administrateur</a></li>
            </ul>
        </div>
    </section>
</body>
</html>