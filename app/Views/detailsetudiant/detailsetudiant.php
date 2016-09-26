<style scoped>
	.fa-star, .fa-star-half-o, .fa-star-o{color: #F5CE28;}
	.stars {position: absolute; z-index: 1; bottom: 0%; right: 6%;background-color: rgba(0,0,0, 0.7); padding-left: 1%; padding-right: 10%;}
	.stars p{color:#fff; position: absolute; z-index: 1; bottom: -10px; right: 4%;}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="search-result-picture col-lg-6">
			<div class="row">
			<div class="col-lg-6"></div>
			<div class="col-lg-6">
			<img src="<?= $this->assetUrl("img/photos/" . $etudiant['photo'] . "") ?>">
			<div class="stars">
				<?php
				for($x=1;$x<=$etudiant['moyenne'];$x++) {
					echo '<i class="fa fa-star bg-star" aria-hidden="true"></i>';
				}
				if (strpos($etudiant['moyenne'],'.') && intval($etudiant['moyenne']) != $etudiant['moyenne']) {
					echo '<i class="fa fa-star-half-o bg-star" aria-hidden="true"></i>';
					$x++;
				}
				while ($x<=5) {
					echo '<i class="fa fa-star-o bg-star" aria-hidden="true"></i>';
					$x++;
				}
				?>
				<p><?= $etudiant['nbrdevote']?> (avis)</p>
				</div>
			</div>
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
			<?php endif;?><br><br>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<p><strong>Description</strong></p>
			<?= $etudiant['description'] ?><br><br>
			<p><strong>Disponibilités</strong></p>
			<?= $etudiant['detail_dispo'] ?><br><br>
			<p><strong>Avis</strong></p>
			<?php foreach($commentaire as $valeur): ?>
				<?php
				for($x=1;$x<=$valeur['note'];$x++) {
					echo '<i class="fa fa-star bg-star" aria-hidden="true"></i>';
				}
				if (strpos($valeur['note'],'.') && intval($valeur['note']) != $valeur['note']) {
					echo '<i class="fa fa-star-half-o bg-star" aria-hidden="true"></i>';
					$x++;
				}
				while ($x<=5) {
					echo '<i class="fa fa-star-o bg-star" aria-hidden="true"></i>';
					$x++;
				}
				?><br>
				Par <?= $valeur['prenom'] ?> le <?= $valeur['date_commentaire'] ?><br>
				<?= $valeur['commentaire'] ?><br>
				<br><br>
			<?php endforeach; ?>
			<p>Donner un avis :</p>
			<form method="POST" action="<?= $this->url('')?>">
				<div class="form-group">
					<textarea class="form-control" rows="3" name="commentaire"></textarea>
					<button type="submit" class="btn btn-primary btn-md">Envoyer</button>	
				</div>
			</form>
		</div>
	</div>