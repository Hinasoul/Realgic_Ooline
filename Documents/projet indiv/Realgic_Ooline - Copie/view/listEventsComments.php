<?php $title = 'Commentaires';?>
<?php ob_start();?>

<!--Recuperation d'un Event-->

<main id="events_page">
<div class="events_page_contenu">
<h1><?php echo $event['title']; ?></h1>
<h1><?php echo ' le ' . $event['event_date']; ?></h1>
<p><?php echo $event['content']; ?></p>
<a href="index.php" id="revenir">Revenir a Evenements</a>
</div>

<div id ="comment">
<form action="index.php?action=putComment&amp;id=<?=$event['id']?>" method="post">
<label for='commentaire'>Commentaire : </label>
    <input type='text' name='commentaire'>
<input type='submit' value='Publier' id="buttonPublishComments">
</form>
</div>

<div id="comments">
<?php
//Recuperation des commentaires de l'Event
while ($allcomments = $comments->fetch()) {
    ?>
    <div class= "comments_content">
    <p><?php echo $allcomments['creation_date']; ?></p>
    <p><?php echo $allcomments['content']; ?></p>
    <a href="index.php?action=clickeraseComment&eraseComment=<?php echo $allcomments['id']; ?>&idEvent=<?=$event['id']?>" class="boutonEffacer">Effacer<a>
    </div>
<?php
}
?>
 </div>
 </main>
<?php $content = ob_get_clean();?>

<?php require 'template.php';?>

</body>
</html>