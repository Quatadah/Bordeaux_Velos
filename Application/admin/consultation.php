<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/consultations.css">
    <title>Consultations</title>
</head>
<body>
    <section>
        <div class="container">
            <h1>Bienvenue à l'interface administrateur</h1>
            <div id="bicycle-img">
                <img id="img" src="../images/bike.jpg" alt="velo">
            </div>
            <h2>Consultations</h2>
        
            <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <div class="selection">        
        
                    <select name="table" >
                        <option value="">--- Choose a table ---</option>
                        <option value="velo">VELOS</option>
                        <option value="usager" selected>USAGERS</option>
                        <option value="station">STATIONS</option>
                        <option value="emprunt">EMPRUNTS</option>
                        <option value="etredistant">ETRE DISTANT</option>

                    </select>
                </div>
                <div class="selection">        
        
                    <select name="nottable" >

                    </select>
                </div>
                <div class="selection">        
        
                    <select name="nottable2" >

                    </select>
                </div>
                <div>
                    <button class="btn" type="submit">Selectionner</button>
                </div>
            </form>
            <?php include "../scripts/consult.php" ?>
            <div>
                <a id="retour" href="../mode.php">Retourner vers le choix de mode</a>
            </div>
        
        </div>
    </section>
</body>
</html>