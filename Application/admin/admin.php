<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/general.css">
    <title>Administateur</title>
</head>
<body>
    <section>
        <div class="container">
            <h1>Bienvenue à l'interface administrateur</h1>
            <div id="bicycle-img">
                <img id="img" src="../images/bike.jpg" alt="velo">
            </div>
            <p id="parag">L'interface administrateur permet la gestion de base de données
                des vélos de Bordeaux Métropole. Vous avez la possibilité de consulter, 
                mettre à jour les lables de votre base ainsi que de voir les statistiques.
            </p>
            <ul id="choice-list">
                <li class="choice-ele"><a href="consultation.php">Consultation</a></li>
                <li class="choice-ele"><a href="misajour.php">Mis à jour</a></li>
                <li class="choice-ele"><a href="stats.php">Statistiques</a></li>
            </ul>
            <div>
                <a class="sub" href="../mode.php">Retourner vers le choix de mode</a>
            </div>
        
        </div>
    </section>
</body>
</html>