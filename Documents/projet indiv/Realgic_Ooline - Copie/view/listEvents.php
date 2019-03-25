<?php $title = 'Evenements';?>
<?php ob_start();?>

<?php /*if(isset($_SESSION['nickname'])){
echo '<h1>Salut' . $_SESSION['nickname'] .  '</h1>';
}*/?>

<main id="events_page">
<?php if (isset($_SESSION['nickname'])): ?>
    <!--member ajoute event-->
<div id="blockPutEvent">
<form action='index.php?action=putEvent' method='post'  enctype="multipart/form-data">
    <div class="titleContent">
    <input type='text' name='eventtitle' placeholder ="Titre" >
</div>
<div class="titleContent">
<input type='date' name='eventdate'>
</div>
<div class="titleContent">
    <textarea name='eventcontent'  rows="20" cols="33" placeholder="Contenu"></textarea>
</div>
<input type="file" name="fileName" />

<div class="titleContent">
<input type='submit' value='Publier' id="publish">
</div>
</form>
</div>
<?php endif;?>




<?php
//Recuperation des events
while ($allEvents = $events->fetch()) {
    ?>

<!--affichade des evenements-->

<div class="events_page_contenu">
<h1><?php echo $allEvents['title'] . ' le ' . $allEvents['event_date']; ?></h1>
<p><?php echo $allEvents['content'] ?></p>
<a href="index.php?action=clickeraseEvent&eraseEvent=<?php echo $allEvents['id']; ?> " class="boutonEffacer">Effacer<a>
<a href="index.php?action=goeditedEvent&editEvent=<?php echo $allEvents['id']; ?> " id="boutonModifier">Modifier<a>
<a href="index.php?action=clickEvents&events=<?php echo $allEvents['id']; ?>" id= "boutonDetails">Details</a>
</div>

<?php
}

?>

</main>

<?php $content = ob_get_clean();?>

<?php require 'template.php';?>

</body>
</html>