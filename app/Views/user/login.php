<?php

$this->layout('layout', ['title' => 'Login']);

$this->start('main_content');

?>

<div class="container">

	<h1 class="h2 text-center">Connectez-vous à votre compte</h1>

	<div class="row formular">
		<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
			<div class="panel panel-info">

				<div class="panel-heading">
					<h2 class="panel-title">Connexion</h2>
				</div>

				<div class="panel-body">

					<form method="POST" action="<?= $this->url('user_login')?>">

						<!-- Affichage d'un message éventuel avec l'utilisateur -->
						<?php echo $fmsg->display(); ?>

						<div class="form-group">
							<label for="email">Email</label> 
							<input id="email" placeholder="Votre adresse email" type="text" name="email" class="form-control" >
						</div>
						<div class="form-group">
							<label for="mdp">Mot de passe</label> 
							<input id="mdp" placeholder="Votre mot de passe" type="password" name="mdp" class="form-control">
						</div>
						<input type="submit" class="btn btn-info btn-block" value="Se connecter">
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->stop('main_content'); ?>