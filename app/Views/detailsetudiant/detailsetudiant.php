<?php $this->layout('layout'); ?>

<?php $this->start('main_content') ?>
	<!-- <?php debug($etudiant); ?> -->
<style scoped>
.mdi-star, .mdi-star-half, .mdi-star-outline{color: #F5CE28;}
.stars {position: absolute; z-index: 1; bottom: 0%; right: 6%;background-color: rgba(0,0,0, 0.7); padding-left: 1%; padding-right: 10%;}
.stars p{color:#fff; position: absolute; z-index: 1; bottom: -10px; right: 4%;}
</style>
	<div class="container">
		<div class="row">
			<div class="search-result-picture col-lg-6 text-right">
				<img src="<?= $this->assetUrl("img/photos/" . $etudiant['photo'] . "") ?>">
					<div class="stars">
						<?php
					    	for($x=1;$x<=$etudiant['moyenne'];$x++) {
					        	echo '<i class="mdi mdi-18px mdi-star bg-star" aria-hidden="true"></i>';
					    	}
					    	if (strpos($etudiant['moyenne'],'.') && intval($etudiant['moyenne']) != $etudiant['moyenne']) {
					        	echo '<i class="mdi mdi-18px mdi-star-half bg-star" aria-hidden="true"></i>';
					        	$x++;
					    	}
					    	while ($x<=5) {
					        	echo '<i class="mdi mdi-18px mdi-star-outline bg-star" aria-hidden="true"></i>';
					        	$x++;
					    	}
					    ?>
					    <p><?= $etudiant['nbrdevote']?> (avis)</p>
    				</div>
					
			</div>
			<div class="col-lg-6">
				<?= $etudiant['prenom'] ?>
				<?= $etudiant['nom'] ?><br>
				
				Ville : <?= $etudiant['ville'] ?><br>
				Tel : <?= $etudiant['tel'] ?><br>
				Email : <?= $etudiant['email'] ?><br>
				Niveau d'étude :
				<?= $etudiant['niveau_etude'] ?><br>
				<p>Matière et niveaux ciblés :</p>
				<?= $etudiant['matiere'] ?><br>
				<?= $etudiant['scolmin'] ?> à
				<?= $etudiant['scolmax'] ?><br>
				Type de rendez vous : 
				<?php if($etudiant['type_rdv'] == 'webcam' || $etudiant['type_rdv'] == 'both'): ?>
				<i class="mdi mdi-24px mdi-webcam" aria-hidden="true"></i>
				<?php endif;?>
				<?php if($etudiant['type_rdv'] == 'faceface' || $etudiant['type_rdv'] == 'both'): ?>
				<i class="mdi mdi-24px mdi-account-multiple" aria-hidden="true"></i>
				<?php endif;?><br>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<p>Description :</p>
			 	<?= $etudiant['description'] ?>
			 	<p>Disponibilités :</p>
				<?= $etudiant['detail_dispo'] ?>
				<p>Avis :</p>
				<?php foreach($commentaire as $valeur): ?>
				<?= $valeur['commentaire'] ?><br>
				<?= $valeur['date_commentaire'] ?><br><br>
				<?php endforeach; ?>
				<p>Donner un avis :</p>
				<form method="POST" action="<?= $this->url('add_commentaire')?>">
					<div class="form-group">
					<textarea class="form-control" rows="3"></textarea>
					<button type="submit" class="btn btn-primary btn-md">Envoyer</button>	
					</div>
				</form>
			</div>
		</div>
<?php $this->stop('main_content') ?>