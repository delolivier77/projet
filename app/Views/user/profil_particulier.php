<?php
	
$this->layout('layout', ['title' => 'Profil']);

$this->start('main_content');

$date_naissance = date('d/m/Y', strtotime($enfant[0]['date_naissance']));
$date_inscription = date('d/m/Y', strtotime($_SESSION['user']['date_inscription']));

?>
<div class="container">

	<h1 class="h2 text-center">Votre profil</h1>

	<div class="row formular">
		<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h2 class="panel-title">Profil</h2>
				</div>

				<div class="panel-body">
				
					<!-- Affichage d'un message éventuel avec l'utilisateur -->
					<?php echo $fmsg->display(); ?>
						
					<h3 class="h4 text-center"><?= $particulier['civilite'] . " " . $_SESSION['user']['prenom'] . " " . $_SESSION['user']['nom'] . '<br>'  ?> </h3>

					<?php echo '<p><strong>Adresse</strong><br>' . $particulier['adresse'] . " " . $particulier['cp'] . " " . $particulier['ville'] . '</p>' .
						'<p><strong>Email</strong><br>' .
						$_SESSION['user']['email'] . '</p>'.
						'<p><strong>Téléphone</strong><br>' .
						$particulier['tel'] . '</p>' .
						"<p><strong>Date d'inscription</strong><br>" .
						$date_inscription . '</p>' .
						'<p><strong>Votre enfant</strong><br>' .
						$enfant[0]['prenom'] . ', né le ' . $date_naissance . ', en classe de ' . $scolarite['nom']. '</p><br>';
						?>
						<a href=<?=$this->url('user_form_profil_particulier') ?> class="btn btn-info btn-block">Modifier le profil</a>
				</div>
			</div>
		</div>		
	</div>

	<h2 class="h2 text-center">Les commentaires que vous avez postés</h2>

	<div class="row formular">

		<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">

			<div class="panel panel-info ">

				<div class="panel-heading">
					<h3 class="panel-title">Commentaires</h3>
				</div>

				<div class="panel-body">

					<?php								
						foreach ($commentaire as $value) {
							echo '<p><strong>Etudiant</strong><br>' . $value['nom']. ' ' . $value['prenom'] . '</p>';
							// echo '<p><strong>Votre note</strong><br>' . $value['note'].'</p>';
							echo '<p><strong>Votre note</strong><br>';

								// Affichage de la notation en étoiles
								for($x=1;$x<=$value['note'];$x++) {
									echo '<i class="mdi mdi-18px mdi-star" aria-hidden="true"></i>'; 
								};

								if (strpos($value['note'],'.' && '' > 0)) { 
									if (strpos($value['note'],'.') && intval($value['note']) != $value['note']) { 
									echo '<i class="mdi mdi-18px mdi-star-half" aria-hidden="true"></i></p>'; 
									$x++;
								}};

							echo '<p><strong>Votre commentaire</strong><br>' . $value['commentaire'] . '</p>';
							echo '<p><strong>Posté le : </strong><br>' . date('d/m/Y H:i:s', strtotime($value['date_commentaire'])) . '</p>';

							echo '<a href=' . $this->url('commentaire_form_commentaire', ['id' => $value['id_co']]). ' class="btn btn-info btn-block">Modifier le commentaire</a>';
							echo '<a href=' . $this->url('commentaire_delete_commentaire', ['id' => $value['id_co']]). ' class="btn btn-primary btn-block">Supprimer le commentaire</a>';

							echo '<hr>';

						}		
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->stop('main_content'); ?>