<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/app.css">
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
        
                    <select name="table" value="--- Choose a table ---">
                        <option value="">--- Choose a table ---</option>
                        <option value="VELO">VELOS</option>
                        <option value="USAGER">USAGERS</option>
                        <option value="STATION">STATIONS</option>
                        <option value="EMPRUNT">EMPRUNTS</option>
                        <option value="ETRE_DISTANT">ETRE DISTANT</option>

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
                <a class="sub" href="../mode.php">Retourner vers le choix de mode</a>
            </div>
        
        </div>
    </section>
</body>
</html>