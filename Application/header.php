<header>
        <h1 id="name-title"><a href="index.php">Flotte de Vélos</a></h1>
        <nav class="navbar">
            <ul class="navlist">
                <li class="nav-ele"><a href="index.php">Accueil</a></li>|
                <li class="nav-ele"><a href="about.php">A propos</a></li>
                <?php if(isset($_SESSION["LOGGED_USER"])) : ?>
                |<li class="nav-ele"><a href="disconnexion.php">Se déconnecter</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
<hr id="line">