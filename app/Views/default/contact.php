<?php

$this->layout('layout', ['title' => 'Contact']);

$this->start('main_content');

?>

<div class="container">

	<h1 class="h2 text-center">Contactez-nous !</h1>
  
	<div class="row formular">

	<div class="col-xs-12 col-lg-offset-2 col-lg-8">

	  <div class="panel panel-info">

		<div class="panel-heading">
			<h2 class="panel-title">Contact</h2>
		</div>

		<div class="panel-body">

			<form method="POST" action="" role="form">

				<div class="form-group">
						<label class="control-label" for="signupName">Votre nom</label>
						<input id="signupName" name="name" placeholder="Votre nom" type="text" maxlength="50" class="form-control">
				</div>

				<div class="form-group">
						<label class="control-label" for="signupEmail">Votre mail</label>
						<input id="signupEmail" name="email" placeholder="Votre adresse email" type="email" maxlength="50" class="form-control">
				</div>

				<div class="form-group">
						<label>Votre message</label>
						<textarea rows="3" name="message" class="form-control" placeholder="Votre message"></textarea>
				</div>

				<div class="form-group">
						<button id="signupSubmit" type="submit" name="envoi" class="btn btn-info btn-block">Envoyer</button>
				</div>

			</form>

		</div>
	  </div>
	</div>
  </div>
</div>

<?php $this->stop('main_content'); ?>
