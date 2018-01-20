<h1>This is much better</h1>

<p>I am good old php, your name is unimportant</p>

<ul>
<?php foreach ($users as $u) { ?>
<li><?=$u['username']?></li>
<?php } ?>
</ul>

<div>
<form method="POST" action="<?=$router->pathFor('color-handler')?>">
<input type="textbox" name="color">
<button>Post me</button>
</form>
</div>
