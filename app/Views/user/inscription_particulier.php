<?php

$this->layout('layout', ['title' => 'Inscription']);

$this->start('main_content');

extract($assignedDatas);

?>

<div class="container">

	<h1 class="h2 text-center">Vous êtes parent d'élève</h1>

	<div class="row formular">

		<div class="col-xs-12 col-lg-offset-2 col-lg-8">

			<div class="panel panel-info">

				<div class="panel-heading">
					<h2 class="panel-title">Inscription</h2>
				</div>

				<div class="panel-body">

					<form action="<?= $this->url('user_add_user_particulier')?>" method="post">

						<!-- Affichage d'un message éventuel avec l'utilisateur -->
						<?php echo $fmsg->display(); ?>

						<div class="form-group">
							<label>Civilité</label><br>
							<label for="civilite_h" class="radio-inline">
								<input type="radio" name="civilite" id="civilite_h" value="M." <?= $civilite_h?> >M.
							</label>

							<label for="civilite_f" class="radio-inline">
								<input type="radio" name="civilite" id="civilite_f" value="Mme" <?= $civilite_f?>>Mme
							</label>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="nom">Nom</label>
									<input type="text" class="form-control" name="nom" id="nom" placeholder = "Nom" value="<?= $nom?>">
								</div>
							</div>	
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="prenom">Prénom</label>
									<input type="text" class="form-control" name="prenom" id="prenom" placeholder = "Prénom" value="<?= $prenom?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="text" class="form-control" name="email" id="email" placeholder = "Email" value="<?= $email?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="mdp">Mot de passe</label>
									<input type="password" class="form-control" name="mdp" id="mdp" placeholder = "Mot de passe" value="<?= $mdp?>">
								</div>
							</div>	
						</div>

						<div class="form-group">
							<label for="adresse">Adresse</label>
							<input type="text" class="form-control" name="adresse" id="adresse" placeholder = "Adresse" value="<?= $adresse?>">
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label for="cp">Code postal</label>
									<input type="text" class="form-control" name="cp" id="cp" placeholder = "Code postal (00000)" value="<?= $cp?>">
								</div>
							</div>	
							<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label for="ville">Ville</label>
									<input type="text" class="form-control" name="ville" id="ville" placeholder = "Ville" value="<?= $ville?>">
								</div>
							</div>	
							<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label for="tel">Téléphone</label>
									<input type="text" class="form-control" name="tel" id="tel" placeholder = "N° de tél. (0000000000)" value="<?= $tel?>">
								</div>
							</div>	
						</div>

						<h2 class="h3 text-center">Votre enfant</h2>

						<div class="row">
							<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label for="prenom_enfant">Prénom de l'enfant</label>
									<input type="text" class="form-control" name="prenom_enfant" id="prenom_enfant" placeholder = "Prénom de l'enfant" value="<?= $prenom_enfant?>">
								</div>
							</div>	
							<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label for="date_naissance">Date de naissance</label>
									<input type="text" class="form-control" name="date_naissance" id="date_naissance" placeholder = "Date de naissance (00/00/0000)" value="<?= $date_naissance?>">
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
											$cd_selected = (isset($classe) && $indice['id_s'] == $classe) ? "selected" : "";
											echo '<option value="'. $indice['id_s'] . '"'. $cd_selected .'>' .  $indice['nom']. '</option>';
										}
										?>
									</select>
								</div>
							</div>	
						</div>

						<input type="submit" class="btn btn-info btn-block" name="enregister" value="S'inscrire">

					</form>
				</div>
			</div>
		</div>
	</div>
</div>	

<?php $this->stop('main_content');  ?>