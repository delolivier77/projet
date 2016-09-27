<?php

$this->layout('layout', ['title' => 'Profil']);

$this->start('main_content');

$url_photo = 'img/photos/'.$etudiant['photo'];
$date_naissance = date('d/m/Y', strtotime($etudiant['date_naissance']));

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

					<form action="<?= $this->url('user_update_etudiant')?>" method="post" enctype="multipart/form-data">

						<!-- Affichage d'un message éventuel avec l'utilisateur -->
						<?php echo $fmsg->display(); ?>

						<img src="<?= $this->assetUrl($url_photo);?>" alt="photo" class=" media-object img-profil">
						<input type="hidden" name="nom_photo" value="<?= $etudiant['photo']?>">

						<input type="file" name="photo" id="photo">
						<p class="help-block">Vous pouvez modifier ici la photo de votre profil.</p>					

						<div class="form-group">
							<label>Civilité</label><br>
							<label for="civilite_h" class="radio-inline">
							<input type="radio" name="civilite" id="civilite_h" value="M." <?=(isset($etudiant['civilite']) && $etudiant['civilite'] == "M.") ? 'checked' : ""?>>M.
							</label>

							<label for="civilite_f" class="radio-inline">
							<input type="radio" name="civilite" id="civilite_f" value="Mme" <?=(isset($etudiant['civilite']) && $etudiant['civilite'] == "Mme") ? 'checked' : ""?> >Mme
							</label>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="nom">Nom</label>
									<input type="text" class="form-control" name="nom" id="nom" value="<?= $_SESSION['user']['nom']?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="prenom">Prénom</label>
									<input type="text" class="form-control" name="prenom" id="prenom" value="<?= $_SESSION['user']['prenom']?>">
								</div>
							</div>
						</div> <!-- FIN div.row -->

						<div class="row">	
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="text" class="form-control" name="email" id="email" value="<?= $_SESSION['user']['email']?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="date_naissance">Date de naissance</label>
									<input type="text" class="form-control" name="date_naissance" id="date_naissance" value="<?= $date_naissance?>">
								</div>
							</div>	
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="tel">Téléphone</label>
									<input type="text" class="form-control" name="tel" id="tel" value="<?= $etudiant['tel']?>">
								</div>
							</div>	
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="adresse">Adresse</label>
									<input type="text" class="form-control" name="adresse" id="adresse" value="<?= $etudiant['adresse']?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="cp">Code postal</label>
									<input type="text" class="form-control" name="cp" id="cp" value="<?= $etudiant['cp']?>">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label for="ville">Ville</label>
									<input type="text" class="form-control" name="ville" id="ville" value="<?= $etudiant['ville']?>">
								</div>
							</div>

						</div> <!-- FIN div.row -->

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
						</div> <!-- FIN div.row -->

						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Votre niveau d'étude</label>
									<select name="niveau_etude" class="form-control">
										<option selected disabled >Niveau d'étude</option>
										<option value="Bac +1" <?= ($etudiant['niveau_etude'] == 'Bac +1') ? 'selected' : "" ?> >Bac +1</option>
										<option value="Bac +2" <?= ($etudiant['niveau_etude'] == 'Bac +2') ? 'selected' : "" ?> >Bac +2</option>
										<option value="Bac +3" <?= ($etudiant['niveau_etude'] == 'Bac +3') ? 'selected' : "" ?> >Bac +3</option>
										<option value="Bac +4" <?= ($etudiant['niveau_etude'] == 'Bac +4') ? 'selected' : "" ?> >Bac +4</option>
										<option value="Bac +5 (ou +)" <?= ($etudiant['niveau_etude'] == 'Bac +5 (ou +)') ? 'selected' : "" ?> >Bac +5 ou plus</option>
									</select>
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label>N° de carte étudiant</label>
									<input type="text" class="form-control" name="num_etudiant" id="num_etudiant" value="<?= $etudiant['num_etudiant']?>">
								</div>
							</div>

						</div> <!-- FIN div.row -->

						<h2 class="h3 text-center">Vous souhaitez enseigner</h2>

						<div class="row">
						
							<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label>Quoi ?</label>
									<input type="hidden" name="id_cn" value="<?= $connaissance[0]['id_cn']?>">
									<select name="matiere" class="form-control">
										<option selected disabled >Matière</option>
										<?php 
										foreach ($matiere_list as $indice)
										{
										$m_selected = (isset($connaissance[0]['id_m']) && $indice['id_m'] == $connaissance[0]['id_m']) ? "selected" : "";
										echo '<option value="'. $indice['id_m'] . '" '. $m_selected .'>' .  $indice['nom'] . '</option>';
										}
										?>
									</select>
								</div>
							</div>

							<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label>De la classe</label>
									<select name="classe_debut" class="form-control">
										<option selected disabled >Classe de début</option>
										<?php 
										foreach ($scolarite_list as $indice)
										{
										$cd_selected = (isset($connaissance[0]['id_s_min']) && $indice['id_s'] == $connaissance[0]['id_s_min']) ? "selected" : "";
										echo '<option value="'. $indice['id_s'] . '" ' . $cd_selected .'>' .  $indice['nom'] . '</option>';
										}
										?>
									</select>
								</div>
							</div>

							<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label>A la classe</label>
									<select name="classe_fin" class="form-control">
										<option selected disabled >Classe de fin</option>
										<?php 
										foreach ($scolarite_list as $indice)
										{
										$cf_selected = (isset($connaissance[0]['id_s_max']) && $indice['id_s'] == $connaissance[0]['id_s_max']) ? "selected" : "";
										echo '<option value="'. $indice['id_s'] . '" ' . $cf_selected .'>' .  $indice['nom'] . '</option>';
										}
										?>
									</select>
								</div>
							</div>

						</div><!-- FIN div.row -->
						
						<label>Description de votre parcours</label>
						<textarea class="form-control" rows="5" name="description" ><?= $etudiant['description']?></textarea>

						<div class="form-group text-center">
							<label>Type de rendez-vous</label><br>
							<label for="faceface" class="radio-inline">
								<input type="radio" name="type_rdv" id="faceface" value="faceface" <?=(isset($etudiant['type_rdv']) && $etudiant['type_rdv'] == "faceface") ? 'checked' : ""?> > Face à face
							</label>

							<label for="webcam" class="radio-inline">
								<input type="radio" name="type_rdv" id="webcam" value="webcam"  <?=(isset($etudiant['type_rdv']) && $etudiant['type_rdv'] == "webcam") ? 'checked' : ""?> > Webcam
							</label>

							<label for="both" class="radio-inline">
								<input type="radio" name="type_rdv" id="both" value="both"  <?=(isset($etudiant['type_rdv']) && $etudiant['type_rdv'] == "both") ? 'checked' : ""?> > Les deux
							</label>
						</div>

						<div class="form-group text-center">						
							<label>Actuellement, vous êtes : </label><br>
							<label for="nodispo" class="radio-inline">
								<input type="radio" name="dispo" id="nodispo" value="0" <?=(isset($etudiant['dispo']) && $etudiant['dispo'] == "0") ? 'checked' : ""?> > Indisponible
							</label>

							<label for="dispo" class="radio-inline">
								<input type="radio" name="dispo" id="dispo" value="1" <?=(isset($etudiant['dispo']) && $etudiant['dispo'] == "1") ? 'checked' : ""?> > Disponible
							</label>
						</div>

						<label>Vos disponibilités</label>
						<textarea class="form-control" rows="2" name="detail_dispo"> <?= $etudiant['detail_dispo']?></textarea>

						<div class="row">
							<div class="form-group col-xs-12 col-lg-offset-4 col-lg-4 text-center">
								<label>Tarif horaire (en euros)</label>
								<input type="text" class="form-control" name="tarif" id="tarif" value="<?= $etudiant['tarif']?>"><br>
							</div>
						</div>

						<input type="submit" class="btn btn-info btn-block" name="enregister" value="Enregistrer">

					</form>

				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->stop('main_content'); ?>