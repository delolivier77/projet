<?php

$this->layout('layout', ['title' => 'Profil']);

$this->start('main_content');

$date_naissance = date('d/m/Y', strtotime($enfant[0]['date_naissance']));

?>

<div class="container">

	<h1 class="h2 text-center">Modifiez votre profil</h1>

	<div class="row formular">

		<div class="col-xs-12 col-lg-offset-2 col-lg-8">

			<div class="panel panel-info">

				<div class="panel-heading">
					<h2 class="panel-title">Profil</h2>
				</div>

				<div class="panel-body">

					<form action="<?= $this->url('user_update_particulier')?>" method="post">

						<!-- Affichage d'un message éventuel avec l'utilisateur -->
						<?php echo $fmsg->display(); ?>

						<div class="form-group">
							<label>Civilité</label><br>
							<label for="civilite_h" class="radio-inline">
								<input type="radio" name="civilite" id="civilite_h" value="M." <?=(isset($particulier['civilite']) && $particulier['civilite'] == "M.") ? 'checked' : ""?>> M.
							</label>

							<label for="civilite_f" class="radio-inline">
							<input type="radio" name="civilite" id="civilite_f" value="Mme" <?=(isset($particulier['civilite']) && $particulier['civilite'] == "Mme") ? 'checked' : ""?> >Mme
							</label>
						</div>

						<div class="row">

							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="nom">Nom</label>
									<input type="text" class="form-control" name="nom" id="nom" value= "<?= $_SESSION['user']['nom']?>" >
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="prenom">Prénom</label>
									<input type="text" class="form-control" name="prenom" id="prenom" value="<?= $_SESSION['user']['prenom']?>">
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="text" class="form-control" name="email" id="email" value="<?= $_SESSION['user']['email']?>">
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="adresse">Adresse</label>
									<input type="text" class="form-control" name="adresse" id="adresse" value="<?= $particulier['adresse']?>">
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label for="cp">Code postal</label>
									<input type="text" class="form-control" name="cp" id="cp" value="<?= $particulier['cp']?>">
								</div>
							</div>

							<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label for="ville">Ville</label>
									<input type="text" class="form-control" name="ville" id="ville" value="<?= $particulier['ville']?>">
								</div>
							</div>

							<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label for="tel">Téléphone</label>
									<input type="text" class="form-control" name="tel" id="tel" value="<?= $particulier['tel']?>">
								</div>
							</div>

						</div>
						
						<h2 class="h3 text-center">Votre enfant</h2>

						<div class="row">

							<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label for="prenom_enfant">Prénom de l'enfant</label>
									<input type="text" class="form-control" name="prenom_enfant" id="prenom_enfant" value="<?= $enfant[0]['prenom']?>">
									<input type="hidden" name="id_en" value="<?= $enfant[0]['id_en']?>">
								</div>
							</div>

							<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label for="date_naissance">Date de naissance</label>
									<input type="text" class="form-control" name="date_naissance" id="date_naissance" value="<?= $date_naissance?>">
								</div>
							</div>

							<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label>Classe de l'enfant</label>
									<select name="classe" class="form-control">
										<option selected disabled >Classe de l'enfant</option>
										<?php
										foreach ($scolarite_list as $indice)
										{
										$cd_selected = (isset($enfant[0]['id_s']) && $indice['id_s'] == $enfant[0]['id_s']) ? "selected" : "";
										echo '<option value="'. $indice['id_s'] . '" '. $cd_selected .'>' .  $indice['nom']. '</option>';
										}
										?>
									</select>
								</div>
							</div>

						</div>

						<p class="help-block">Pour changer de mot de passe, inscrire l'ancien avant d'en écrire un nouveau.</p>	
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="ancien_mdp">Ancien mot de passe</label>
									<input type="password" class="form-control" name="ancien_mdp" id="ancien_mdp" placeholder = "Ancien mot de passe" >
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="nouveau_mdp">Nouveau mot de passe</label>
									<input type="password" class="form-control" name="nouveau_mdp" id="nouveau_mdp" placeholder = "Nouveau mot de passe" >
								</div>
							</div>
						</div>
									
						<input type="submit" class="btn btn-info btn-block" name="enregister" value="Enregistrer">

					</form>

				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->stop('main_content');  ?>
