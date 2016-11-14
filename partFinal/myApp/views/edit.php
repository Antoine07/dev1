<?php ob_start() ; ?>
<div class="row">
	<div class="col-sm-12">
		<form action="/index.php/post/update?id=<?php echo $post['id'] ?>" method="post">
			<div class="form-group">
				<p><small>les champs * sont obligatoires</small></p>
				<label for="title">Title (*)</label>
				<input name="title" value="<?php echo $_SESSION['old']['title']?? $post['title'] ?>" type="text" class="form-control" id="title" placeholder="Titre de l'article">
				<?php if(isset($_SESSION['errors']['title'])): ?>
					<div class="alert alert-success">
						<?php echo $_SESSION['errors']['title'] ?>
					</div>
				<?php endif ?>
			</div>
			<div class="form-group">
				<label for="content">Contenu (*)</label>
				<textarea name="content" class="form-control" id="content" rows="3"><?php echo $_SESSION['old']['content']?? $post['content'] ?></textarea>
				<?php if(isset($_SESSION['errors']['content'])): ?>
					<div class="alert alert-success">
						<?php echo $_SESSION['errors']['content'] ?>
					</div>
				<?php endif ?>
			</div>
			<div class="form-group">
				<label for="exampleSelect1">Catégorie</label>
				<select name="category" class="form-control" id="category">
					<option <?php echo ($post['category_id'] == null)? 'selected' : '' ?>  value="null">Non catégorisé</option>
					<?php foreach ($categories as $category): ?>
						<option <?php echo ($post['category_id'] == $category['id'] )? 'selected' : '' ?> value="<?php echo  $category['id'] ?>"><?php echo  $category['title'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-check">
				<label class="form-check-label">
					<input <?php echo ($post['status'] == 'published')? 'checked' : '' ;?> type="radio" class="form-check-input" name="status" value="published">
					publié l'article
				</label>
			</div>
			<div class="form-check" checked>
				<label class="form-check-label">
					<input <?php echo ($post['status'] == 'unpublished') ? 'checked' : '' ;?> type="radio" class="form-check-input" name="status" value="unpublished" >
					dépublié l'article
				</label>
			</div>
			<button type="submit" class="btn btn-primary">Mettre à jour</button>
		</div>
	</div>
	<?php $content = ob_get_clean() ; ?>
	<?php include 'master_admin.php' ?>