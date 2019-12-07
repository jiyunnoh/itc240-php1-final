<?php //errors page - the shortest page in this group of pages

//if there are errors, show them to me - errors is an array
if(count($errors) > 0): ?>

<?php
//run a foreach loop to identify the errors

foreach($errors as $error) : ?>

<p class="red italic"><?php echo $error; ?></p>

<?php endforeach ?>
<?php endif ?>