<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/app.css"> 
    <link rel="stylesheet" href="style/home.css">
    <title>Profil utilisateur</title>
</head>
<body>
    <?php include_once "header.php" ?>
    <section>
        <div class="search-title">
            <img id="search-img" src="images/search.png" alt="logo">
            <h1>Rechercher</h1>
        </div>
        <div class="container2">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
            <div id="input_container">
                <input id="input" class="form-ele" name="search" type="text" placeholder="Chercher commune">
                <img src="images/search.png" height="20" width="20" id="input_img">
            </div>
            </form>
        </div>
    </section>
</body>
</html>