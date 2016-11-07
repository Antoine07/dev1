<?php ob_start() ; ?>
<div class="row">
	<div class="col-sm-12">
	<!-- mettez novalidate dans la balise form pour tester la vérification des champs coté serveur -->
		<form action="/index.php/about" method="post">
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" name="email" value="<?php echo $_SESSION['old']['email']?? '' ?>" class="form-control" id="exampleInputEmail1" placeholder="Email">
				<?php if(isset($_SESSION['errors']['email'])): ?>
					<div class="alert alert-success">
						<?php echo $_SESSION['errors']['email'] ?>
					</div>
				<?php endif ?>
			</div>
			<textarea name="message" class="form-control" rows="3"><?php echo $_SESSION['old']['message']?? '' ?></textarea>
			<?php if(isset($_SESSION['errors']['message'])): ?>
				<div class="alert alert-success">
				<?php echo $_SESSION['errors']['message'] ?>
				</div>
			<?php endif ?>
			<button type="submit" class="btn btn-default">Contactez-nous</button>
		</form>
	</div>
</div>
<?php $content = ob_get_clean() ; ?>
<?php include 'master.php' ?>