<?php $this->layout('layout'); ?>

<?php $this->start('main_content') ?>
<style scoped>
ul{
	list-style: none;
	}
p{

	overflow: hidden;
	text-overflow: ellipsis;
	max-height: 100px;
	}
.top-content{
	height: 165px;
}
.test{
	background-color: #ccc;
}
.mdi-star{
	color: #F5CE28;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-lg-4 test">
			test
			
  <i class="mdi mdi-24px mdi-star" aria-hidden="true"></i>
  <i class="mdi mdi-24px mdi-account-multiple" aria-hidden="true"></i>
</span>
		</div>
	<div class="col-lg-8">
	<?php foreach($finalresultv as $valeur): ?>
		<div class="row">
			<div class="search-result-picture col-lg-4">
				<img src="<?= $this->assetUrl("img/photos/" . $valeur['photo'] . "") ?>"><br>
				<?php if($valeur['moyenne'] == 0): ?>
				<i class="mdi mdi-24px mdi-star-outline" aria-hidden="true"></i>
				<i class="mdi mdi-24px mdi-star-outline" aria-hidden="true"></i>
				<i class="mdi mdi-24px mdi-star-outline" aria-hidden="true"></i>
				<i class="mdi mdi-24px mdi-star-outline" aria-hidden="true"></i>
				<i class="mdi mdi-24px mdi-star-outline" aria-hidden="true"></i>	
				<?php endif;?>
				<?php if($valeur['moyenne'] == 4): ?>
				<i class="mdi mdi-24px mdi-star" aria-hidden="true"></i>
				<i class="mdi mdi-24px mdi-star" aria-hidden="true"></i>
				<i class="mdi mdi-24px mdi-star" aria-hidden="true"></i>
				<i class="mdi mdi-24px mdi-star" aria-hidden="true"></i>
				<i class="mdi mdi-24px mdi-star-outline" aria-hidden="true"></i>
				<?php endif;?>
			</div>
			<div class="search-result-content col-lg-8">
				<div class="row top-content">
					<p><strong><?= $valeur['prenom']?></strong>
					<?php if($valeur['type_rdv'] == 'webcam' || $valeur['type_rdv'] == 'both'): ?>
					<i class="mdi mdi-24px mdi-webcam" aria-hidden="true"></i>
					<?php endif;?>
					<?php if($valeur['type_rdv'] == 'faceface' || $valeur['type_rdv'] == 'both'): ?>
					<i class="mdi mdi-24px mdi-account-multiple" aria-hidden="true"></i>
					<?php endif;?>
					</p>
					<p><?= $valeur['description']?></p>
				</div>
				<div class="row">
					<div class="col-lg-9"></div>
					<div class="col-lg-3">
						<p><?= $valeur['tarif']?>€/h</p>


					</div>
				</div>
		</div>
		</div>
	<?php endforeach; ?>
	</div>
	</div>
</div>
<?php $this->stop('main_content') ?>



0 => moyenne = étoiles jaune
moyenne => 5 = étoiles blanches blanche