<?php $this->layout('layout'); ?>

<?php $this->start('main_content') ?>
	<!-- <?php debug($etudiant); ?> -->
	<div class="container">
	<img src="<?= $this->assetUrl("img/photos/" . $etudiant['photo'] . "") ?>"><br>
	<?php
    	for($x=1;$x<=$etudiant['moyenne'];$x++) {
        	echo '<i class="mdi mdi-18px mdi-star" aria-hidden="true"></i>';
    	}
    	if (strpos($etudiant['moyenne'],'.') && intval($etudiant['moyenne']) != $etudiant['moyenne']) {
        	echo '<i class="mdi mdi-18px mdi-star-half" aria-hidden="true"></i>';
        	$x++;
    	}
    	while ($x<=5) {
        	echo '<i class="mdi mdi-18px mdi-star-outline" aria-hidden="true"></i>';
        	$x++;
    	}
    	?>
    <p><?= $etudiant['nbrdevote']?> (avis)</p><br>
	<?php if($etudiant['type_rdv'] == 'webcam' || $etudiant['type_rdv'] == 'both'): ?>
		<i class="mdi mdi-24px mdi-webcam" aria-hidden="true"></i>
	<?php endif;?>
	<?php if($etudiant['type_rdv'] == 'faceface' || $etudiant['type_rdv'] == 'both'): ?>
		<i class="mdi mdi-24px mdi-account-multiple" aria-hidden="true"></i>
	<?php endif;?><br>
	<?= $etudiant['prenom'] ?><br>
	<?= $etudiant['nom'] ?><br>
	<p><?= $etudiant['tarif'] ?>€/h</p><br>
	<?= $etudiant['ville'] ?><br>
	<?= $etudiant['tel'] ?><br>
	<?= $etudiant['email'] ?><br>
	<?= $etudiant['niveau_etude'] ?><br>
	<?= $etudiant['id_s_min'] ?><br>
	<?= $etudiant['id_s_max'] ?><br>
	<?= $etudiant['description'] ?><br>
	<?= $etudiant['detail_dispo'] ?><br>
	</div>



<?php $this->stop('main_content') ?>