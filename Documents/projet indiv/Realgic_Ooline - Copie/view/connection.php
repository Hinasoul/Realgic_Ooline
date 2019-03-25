<?php $title = 'Connexion';?>
<?php ob_start();?>

<main id="page_formulaire_connexion">
<div id="formulaire_connexion">
<div id="imgConnection">
        <img src="public/imgs/first_image.jpg"  alt="can you and me be friends?" id="img1idConnection">
</div>
<form action="index.php?action=connection" method="post">
<p>
<div class="nicknamePassSubmit">
    <input type="text" name="formnickname" placeholder="Pseudo" class="inputConnection" />
    </div>
    <div class="nicknamePassSubmit">
    <input type="password" name="formmotpasse"  placeholder="Mot de passe"  class="inputConnection" />
</div>
<div class="nicknamePassSubmit">
    <input type="submit" name="Valider" class="boutons_connection" />
    </div>
    </form>
</div>
</main>



<?php $content = ob_get_clean();?>

<?php require 'template.php';?>
