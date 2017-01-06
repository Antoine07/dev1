<?php ob_start() ; ?>
<div class="row">
	<div class="col-sm-12">
		<article>
			<?php foreach($posts as $post): ?>
				<h2><a href="/index.php/single?id=<?php echo $post['id']; ?>"><?php echo $post['title'] ?></a></h2>
				<?php if(!empty($post['thumbnail'])): ?>
					<img src="/images/<?php echo $post['thumbnail'] ?>" alt="" class="rounded pull-left">
				<?php endif ?>
				<p><?php echo htmlentities($post['excerpt']) ?>
					<br><a href="/index.php/single?id=<?php echo $post['id'] ?>">lire la suite...</a>
				</p>
				<p>Auteur: <?php echo $post['author']?? 'aucun auteur' ?></p>
				<p>Date de publication: <?php echo $post['published_at']?? 'non daté' ?></p>
				<p>Catégorie: <?php echo $post['category_name']?? 'non catégorisé' ?></p>
				<h3>Commentaires <?php echo count(get_comments_by_post($post['id'])) ?></h3>
				<?php foreach(get_comments_by_post($post['id']) as $comment): ?>
					<?php echo $comment['title'] ?>, 
				<?php endforeach ?>
			<?php endforeach; ?>
		</article>
	</div>
</div>
<?php $content = ob_get_clean() ; ?>
<?php include 'master.php' ?>