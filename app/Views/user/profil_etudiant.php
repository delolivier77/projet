<?php

$this->layout('layout', ['title' => 'Profil']);

$this->start('main_content');

$url_photo = 'img/photos/'.$etudiant['photo'];
$date_naissance = date('d/m/Y', strtotime($etudiant['date_naissance']));
$date_inscription = date('d/m/Y', strtotime($_SESSION['user']['date_inscription']));

?>

<div class="container">

	<h1 class="h2 text-center">Votre profil</h1>

	<div class="row formular">
		<div class="col-xs-12 col-lg-offset-2 col-lg-8">
			<div class="panel panel-info">

				<!-- Affichage d'un message éventuel avec l'utilisateur -->
				<?php echo $fmsg->display(); ?>

				<div class="panel-heading">
					<h2 class="panel-title">Profil</h2>
				</div>
		
				<div class="panel-body">

					<img src="<?= $this->assetUrl($url_photo);?>" class="img-profil" alt="photo">
					<h3><?= $etudiant['civilite']. " " . $_SESSION['user']['prenom'] . " " . $_SESSION['user']['nom'] . '<br><br>'  ?> </h3>
					<?php 
						echo '<p><strong>Votre notation moyenne</strong></p>';
						for($x=1;$x<=$avg['avg'];$x++) { 
								echo '<i class="mdi mdi-18px mdi-star" aria-hidden="true"></i>'; 
						};

						if (strpos($avg['avg'],'.' && '' > 0)) { 
							if (strpos($avg['avg'],'.') && intval($avg['avg']) != $avg['avg']) { 
								echo '<i class="mdi mdi-18px mdi-star-half" aria-hidden="true"></i>'; 
								$x++;
						}};

					 	echo '<p><br><strong>Nombre d\'avis</strong><br>' . $avg['count'] . '</p>'.
						'<p><strong>Date de naissance</strong><br>' . $date_naissance . '</p>'.
						'<p><strong>Adresse</strong><br>' . $etudiant['adresse'] . " " . $etudiant['cp'] . " " . $etudiant['ville']. '</p>' .
						'<p><strong>Email</strong><br>' . $_SESSION['user']['email'] . '</p>' .
						'<p><strong>Téléphone</strong><br>' .  $etudiant['tel'] . '</p>' .
						"<p><strong>Date d'inscription</strong><br>" . $date_inscription . '</p>' .
						'<p><strong>Type de rendez-vous</strong><br>';

							if ($etudiant['type_rdv'] == 'faceface')
							{
								echo '<i class="mdi mdi-24px mdi-account-multiple" aria-hidden="true"></i>';
							}
							else if ($etudiant['type_rdv'] == 'webcam')
							{
								echo '<i class="mdi mdi-24px mdi-webcam" aria-hidden="true"></i>';
							}
							else
							{
								echo '<i class="mdi mdi-24px mdi-account-multiple" aria-hidden="true"></i><i class="mdi mdi-24px mdi-webcam" aria-hidden="true"></i>';	
							}
						
						echo "<p><strong>Niveau d'étude</strong><br>" . $etudiant['niveau_etude'] . '</p>' .
						'<p><strong>Matière d\'enseignement ciblée</strong><br>' . $matiere[0]['nom'] . '</p>' . 
						'<p><strong>De la classe</strong><br>' . $scolarite_min[0]['nom'] . '</p>' . 
						'<p><strong>A la classe</strong><br>' . $scolarite_max[0]['nom']. '</p>' .
						'<p><strong>Votre description</strong><br>' . 	$etudiant['description'] . '</p>' .
						'<p><strong>Votre disponibilité actuelle</strong><br>' .
						'Je suis actuellement ';
						echo (isset($etudiant['dispo']) && $etudiant['dispo'] == "0") ? 'indisponible.' : "disponible." ;

						echo '<p><strong>Détail de vos disponibilités</strong><br>' . $etudiant['detail_dispo'] . '</p>'.
						'<p><strong>Votre tarif</strong><br>' .$etudiant['tarif'] . ' €/h</p>';		
					?>

					<a href=<?=$this->url('user_form_profil_etudiant') ?> class="btn btn-info btn-block">Modifiez votre profil</a>

				</div>
			</div>
		</div>
	</div>
	
	<h2 class="h2 text-center">Les avis que vous avez reçus</h2>

	<div class="row formular">

		<div class="col-xs-12 col-lg-offset-2 col-lg-8">

			<div class="panel panel-info ">

				<div class="panel-heading">
					<h3 class="panel-title">Avis</h3>
				</div>

				<div class="panel-body">

					<?php								
						foreach ($commentaire as $value) {
							if (!empty($value['commentaire']))
							{
								echo '<p><strong>Note donnée : </strong>' . $value['note'] . '<p>' . 
								'<p><strong>Avis</strong><br>' . $value['commentaire'] . '<br>' . 
								'(Posté le : ' . date('d/m/Y H:i:s', strtotime($value['date_commentaire'])) .')<br><br>';
							}
						}			
					?>
				</div>
			</div>
		</div>
	</div>

</div>

<?php $this->stop('main_content');  ?>