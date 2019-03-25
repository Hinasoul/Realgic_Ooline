<?php $title = 'S inscrire';?>
<?php ob_start();?>

<main id="page_formulaire_connexion">
<div id="formulaire_connexion">
<div id="imgConnection">
        <img src="public/imgs/first_image.jpg"  alt="img1alt" id="firstImage">
</div>
<form action="index.php?action=registration" method="post">
<p>
    <div id="blockNicknamePassSubmit">
<div class="nicknamePassSubmit">
    <input type="text" name="prenom" placeholder="Pseudo" class="inputConnection" id="nickname" required/>
    <span id='missNickname'></span>
    </div>
    <div class="nicknamePassSubmit">
    <input type="password" name="motpasse"  placeholder="Mot de passe" class="inputConnection" id="motpasse" required/>
    <span id="missMotpasse"></span>
    </div>
    <div class="nicknamePassSubmit">
            <input type='email' name='email' placeholder="Email" id='email' class="inputConnection" required>
            <span id='missEmail'></span>
</div>
<div class="nicknamePassSubmit">
    <input type="submit" name="Valider"  class="boutons_connection" id='boutonEnvoi' />
    </div>
</div>
    </form>
</main>
<script src="public/js/emailValidation.js"></script>
<script src="public/js/slider.js"></script>

<?php $content = ob_get_clean();?>

<?php require 'template.php';?>