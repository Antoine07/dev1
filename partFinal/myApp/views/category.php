<?php ob_start() ; ?>
<div class="row">
	<div class="col-sm-12">
		<article>
			<?php foreach($posts as $post): ?>
				<h2><a href="/index.php/single?id=<?php echo $post['id']; ?>"><?php echo $post['title'] ?></a></h2>
				
				<p><?php echo htmlentities($post['excerpt']) ?>
					<br><a href="/index.php/single?id=<?php echo $post['id'] ?>">lire la suite...</a>
				</p>
				<p>Auteur: <?php echo $post['author'] ?></p>
			<?php endforeach; ?>
		</article>
	</div>
</div>
<?php $content = ob_get_clean() ; ?>
<?php include 'master.php' ?>