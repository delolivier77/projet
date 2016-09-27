<?php
 
$this->layout('layout', ['title' => 'Inscription']);

$this->start('main_content');

extract($assignedDatas);

?>

<div class="container">

	<h1 class="h2 text-center">Vous êtes étudiant</h1>

	<h2 class="h3 text-center fonctioning_title">Fonctionnement</h2>

	<div class="row text-center fonctioning">

		<div class="col-xs-12 col-sm-4 col-lg-4">
			<p><span class="badge">1</span>Vous vous inscrivez</p>
		</div>
		<div class="col-xs-12 col-sm-4 col-lg-4">
			<p><span class="badge">2</span>Vous êtes contacté par des parents d'élève</p>
		</div>
		<div class="col-xs-12 col-sm-4 col-lg-4">
			<p><span class="badge">3</span>Vous acceptez ou refusez leurs demandes</p>
		</div>
	</div>

	<div class="row formular">

		<div class="col-xs-12 col-lg-offset-2 col-lg-8">

			<div class="panel panel-info">

				<div class="panel-heading">
					<h3 class="panel-title">Inscription</h3>
				</div>

				<div class="panel-body">

					<form action="<?= $this->url('user_add_user_etudiant')?>" method="post" enctype="multipart/form-data">

						<!-- Affichage d'un message éventuel avec l'utilisateur -->
						<?php echo $fmsg->display(); ?>

							<div class="form-group">
								<label for="photo">Photo</label>
								<input type="file" name="photo" id="photo">
								<p class="help-block">Merci de télécharger ici votre photo.</p>
							</div>

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


								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="date_naissance">Date de naissance</label>
										<input type="text" class="form-control" name="date_naissance" id="date_naissance" placeholder = "Date de Naissance (00/00/0000)" value="<?= $date_naissance?>">
									</div>
								</div>

								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="tel">N° de téléphone</label>
										<input type="text" class="form-control" name="tel" id="tel" placeholder = "N° de téléphone (0000000000)" value="<?= $tel?>">
									</div>
								</div>

							</div> <!-- FIN div.row -->

							<div class="form-group">
								<label for="adresse">Adresse</label>
								<input type="text" class="form-control" name="adresse" id="adresse" placeholder = "Adresse" value="<?= $adresse?>">
							</div>
							
							<div class="row">

								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="cp">Code postal</label>
										<input type="text" class="form-control" name="cp" id="cp" placeholder = "Code postal (00000)" value="<?= $cp?>">
									</div>
								</div>	

								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="ville">Ville</label>
										<input type="text" class="form-control" name="ville" id="ville" placeholder = "Ville" value="<?= $ville?>">
									</div>
								</div>

								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<label>Votre niveau d'étude</label>
										<select name="niveau_etude" class="form-control">
											<option selected disabled >Niveau d'étude</option>
											<option value="Bac +1" <?= $b1?>>Bac +1</option>
											<option value="Bac +2" <?= $b2?>>Bac +2</option>
											<option value="Bac +3" <?= $b3?>>Bac +3</option>
											<option value="Bac +4" <?= $b4?>>Bac +4</option>
											<option value="Bac +5 (ou +)" <?= $b5?>>Bac +5 ou plus</option>
										</select>
									</div>
								</div>

								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<label>N° de carte étudiant</label>
										<input type="text" class="form-control" name="num_etudiant" id="num_etudiant" placeholder = "N° de carte étudiant" value="<?= $num_etudiant?>">
									</div>
								</div>
							
							</div> <!-- FIN div.row -->

							<h2 class="h3 text-center">Vous souhaitez enseigner</h2>

							<div class="row">

								<div class="col-xs-12 col-sm-4 col-md-4">
									<div class="form-group">
										<label>Quoi ?</label>
										<select name="matiere" class="form-control">
											<option selected disabled >Matière</option>
											<?php 
											foreach ($matiere_list as $indice)
											{
												$m_selected = (isset($matiere) && $indice['id_m'] == $matiere) ? "selected" : "";
												echo '<option value="'. $indice['id_m'] . '"'. $m_selected .'>' .  $indice['nom']. '</option>';
											}
											?>
										</select>
									</div>
								</div>

								<div class="col-xs-12 col-sm-4 col-md-4">
									<div class="form-group">
										<label>De la classe</label>
										
										<select name="classe_debut" id="cd" onchange="this.form.cf.selectedIndex=this.selectedIndex" class="form-control">
											<option selected disabled >Classe de début</option>
											<?php 
											foreach ($scolarite_list as $indice)
											{
												$cd_selected = (isset($classe_debut) && $indice['id_s'] == $classe_debut) ? "selected" : "";
												echo '<option value="'. $indice['id_s'] . '"'. $cd_selected .'>' .  $indice['nom']. '</option>';
											}
											?>
										</select>
									</div>
								</div>

								<div class="col-xs-12 col-sm-4 col-md-4">
									<div class="form-group">
										<label>A la classe</label>
										<select name="classe_fin" id="cf" class="form-control">
											<option selected disabled >Classe de fin</option>
											<?php 
											foreach ($scolarite_list as $indice)
											{
												$cf_selected = (isset($classe_fin) && $indice['id_s'] == $classe_fin) ? "selected" : "";
												echo '<option value="'. $indice['id_s'] . '"'. $cf_selected .'>' .  $indice['nom']. '</option>';
											}
											?>
										</select>
									</div>
								</div>

							</div> <!-- FIN div.row -->

							<label>Parlez-nous de vous, votre parcours...</label>
							<textarea class="form-control" rows="5" name="description" placeholder = "Décrivez-vous, votre parcours universitaire (ex: bac+2 en chimie...)"><?= $description?></textarea>

							<div class="form-group text-center">
								<label>Type de rendez-vous</label><br>
								<label for="faceface" class="radio-inline">
									<input type="radio" name="type_rdv" id="faceface" value="faceface" <?= $rdv_ff?> > Face à face
								</label>

								<label for="webcam" class="radio-inline">	
									<input type="radio" name="type_rdv" id="webcam" value="webcam" <?= $rdv_w?> > Webcam
								</label>

								<label for="both" class="radio-inline">
									<input type="radio" name="type_rdv" id="both" value="both" <?= $rdv_2?> > Les deux
								</label>
							</div>

							<label>Vos disponibilités</label>
							<textarea class="form-control" rows="3" name="detail_dispo" placeholder = "Vos disponibilités (ex: disponible le lundi de 18h à 20h...)"><?= $detail_dispo?></textarea>

							<div class="row">
								<div class="form-group col-xs-12 col-lg-offset-4 col-lg-4 text-center">
									<label>Tarif horaire (en euros)</label>
									<input type="text" class="form-control" name="tarif" id="tarif" placeholder = "Tarif horaire (ex: 15)" value="<?= $tarif?>"><br>
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