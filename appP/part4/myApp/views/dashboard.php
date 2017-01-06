<?php ob_start() ; ?>
<div class="row">
	<div class="col-sm-12 add">
		<button type="button" class="btn btn-secondary"><a href="/index.php/post/create">Ajouter un article</a></button>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php include 'partials/paginate.php' ?>
		<table class="table table-inverse">
			<thead>
				<tr>
					<th>Titre</th>
					<th>Catégorie</th>
					<th>Statut</th>
					<th>Date</th>
					<th>Supprimer</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($posts as $post): ?>
					<tr>
						<td><a href="/index.php/post/edit?id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></td>
						<td><?php echo $post['category_name']?? 'non catégorisé' ?></td>
						<td><?php echo $post['status'] ?></td>
						<td><?php echo $post['published_at'] ?></td>
						<td>
						<button class="btn btn-default" data-href="#" data-toggle="modal" data-target="#confirm-delete">Supprimer </button>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php include 'partials/paginate.php' ?>
	</div>
</div>
<?php $content = ob_get_clean() ; ?>
<?php include 'master_admin.php' ?>