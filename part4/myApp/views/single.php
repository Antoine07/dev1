<?php ob_start() ; ?>
<div class="row">
	<div class="col-sm-12">
		<article>
			<h1><?php echo $post['title'] ?></h1>
			<p><?php echo htmlentities($post['content']) ?></p>
		</article>
	</div>
</div>
<?php $content = ob_get_clean() ; ?>
<?php include 'master.php' ?>