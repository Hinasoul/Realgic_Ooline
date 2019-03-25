<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title?></title>
    <link rel="stylesheet"  href="public/style.css">
</head>
<body>
    <header id="bandeau" role="banner">
    <div id="logo">
        <h1>Realgic_<span id="TwoOO">OO</span>line</h1>
    </div>


    <nav id="menu_principal">
        <ul>
             <li><a href="index.php">Évenements</a></li>
        </ul>
    </nav>

    <div id="menu_connexion">

<?php if (!isset($_SESSION['nickname'])): ?>
  <a href="index.php?action=goregister"  class="boutons_menu">S'incrire</a>
  <?php endif;?>

<?php if (!isset($_SESSION['nickname'])): ?>
    <a href="index.php?action=goconnect" class="boutons_menu">Se connecter</a>
<?php endif;?>


<?php if (isset($_SESSION['nickname'])): ?>
          <a href="index.php?action=godisconnect" class="boutons_menu"> Déconnexion</a>
<?php endif;?>

        </div>
    </header>
    <?=$content?>
<footer id="bandeau_bas">

    </footer>
</body>
</html>