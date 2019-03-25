<?php $title = 'Editer event';?>
<?php ob_start();?>


<main id="events_page">
<div id="blockPutEvent">
<form action='index.php?action=editedEvent&id=<?=$eventId?>' method='post'>
<div class="titleContent">
    <input type='text' name='eventtitlechange' value='<?php echo $event['title']; ?>'>
    </div>
<div class="titleContent">
    <input type='text' name='eventdatechange' value='<?php echo $event['event_date']; ?>'>
    </div>
<div class="titleContent">
    <textarea name='eventcontentchange' rows="20" cols="33"><?php echo $event['content']; ?></textarea>
    </div>
<div class="titleContent">
<input type='submit' value='Modifier' id="publish">
</div>
</form>
</main>


<?php $content = ob_get_clean();?>

<?php require 'template.php';?>