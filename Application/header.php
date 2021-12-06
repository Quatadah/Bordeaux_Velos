<header>
        <h1 id="name-title"><a href="index.php">Flotte de Vélos</a></h1>
        <nav class="navbar">
        <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
            <ul class="navlist">
                <?php if(!str_contains($actual_link, "mode.php")) : ?>
                <li class="nav-ele"><a href="index.php">Accueil</a></li>|
                <?php endif; ?>
                <li class="nav-ele"><a href="about.php">A propos</a></li>
                <?php if(isset($_SESSION["LOGGED_USER"])) : ?>
                |<li class="nav-ele"><a href="disconnexion.php">Se déconnecter</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
<hr id="line">