<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/consultations.css">
    <title>Statistiques</title>
</head>
<body>
    <section>
        <div class="container">
            <h1>Bienvenue à l'interface administrateur</h1>
            <div id="bicycle-img">
                <img id="img" src="../images/bike.jpg" alt="velo">
            </div>
            <h2>Statistiques</h2>
            <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >
                <div class="selection">        
                    <select name="stat">
                        <option value="moynombre">Moyenne du nombre d’usagers par vélo par jour</option>
                        <option value="moydistance">Moyenne des distances parcourues par les vélos sur une semaine</option>
                        <option value="classementstation">Classement des stations par nombre de places disponibles par commune</option>
                        <option value="classementvelo">Classement des vélos les plus chargés par station</option>
                    </select>
                </div>
                <div>
                    <button class="btn" type="submit">Selectionner</button>
                </div>
            </form>
            <?php include "../scripts/statistiques.php" ?>
            <div>
                <a id="retour" href="../mode.php">Retourner vers le choix de mode</a>
            </div>
        
        </div>
    </section>
</body>
</html>