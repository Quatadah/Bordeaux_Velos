<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/consultations.css">
    <title>Mise à jour</title>
</head>
<body>
    <section>
        <div class="container">
            <h1>Bienvenue à l'interface administrateur</h1>
            <div id="bicycle-img">
                <img id="img" src="../images/bike.jpg" alt="velo">
            </div>
            <h2>Mise à jour</h2>
            <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >
                <div class="selection">
                    <select name="majchoice">        
                        <option value="ajoutvelo" >Ajouter un vélo</button>
                        <option value="ajoutstation" >Ajouter une station</button>
                        <option value="supprimevelo" >Supprimer un vélo</button>
                        <option value="supprimestation" >Supprimer une station</button>
                    </select>
                </div>
                <div>
                    <button class="btn" type="submit">Selectionner</button>
                </div>
            </form>
            <?php include "../scripts/maj.php" ?>
            <?php if ($maj == "ajoutvelo"): ?>
                <form class="maj-form" method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
                    <input name="marque" placeholder="Marque">
                    <input name="kilometrage" placeholder="Kilométrage">
                    <input name="ndc" placeholder="Niveau de charge">
                    <input name="nds" placeholder="Numéro de station">
                    <input class="btn" type="submit" value="Ajouter">
                </form>
            <?php endif; ?>
            
            <?php if ($maj == "ajoutstation"): ?>
                <form class="maj-form" method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
                    <input name="adresse" placeholder="Adresse de station">
                    <input name="ndbornes" placeholder="Nombre de bornes">
                    <input name="commune" placeholder="Commune">
                    <input class="btn" type="submit" id="ajoutvelo" value="Ajouter">
                </form>
            <?php endif; ?>

            <?php if ($maj == "supprimevelo"): ?>
                <form class="maj-form" method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
                    <input name="numrefvelo" placeholder="Numéro de référence du vélo">
                    <input class="btn" type="submit" value="Supprimer">
                </form>
            <?php endif; ?>

            <?php if ($maj == "supprimestation"): ?>
                <form class="maj-form" method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
                    <input name="numrefstation" placeholder="Numéro de référence de la station">
                    <input class="btn" type="submit" value="Supprimer">
                </form>
            <?php endif; ?>
            

            <div>
                <a id="retour" href="../mode.php">Retourner vers le choix de mode</a>
            </div>
        
        </div>
    </section>
</body>
</html>