<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>


<!-- ZONE DE RECHERCHE -->
<section class="fluid-container">

	<div class="container box_search">

		<h1>Un soutien scolaire pour votre enfant par des étudiants</h1>

		<div class="row">
			<div class="container">
				<div class="row form_search">
<?php $this->insert('recherche/recherche',array('matieres'=>$matieres, 'scolarites'=>$scolarites)); ?>
				</div>
			</div>	
		</div>
	</div>
</section>


<!-- CONCEPT -->
<section class="container">
	<div class="row concept">

		<div class="col-lg-6" id="concept_left">
			<h2>Vous recherchez du soutien scolaire<br>pour vos enfants</h2>
			<div class="text-center">
				<img src="<?= $this->assetUrl("img/visuels/eleve.jpg") ?>" class="img-circle" alt="">
			</div>
		</div>

		<div class="col-lg-6">
			<h2>Ils sont étudiants et souhaitent transmettre<br>leurs connaissances</h2>
			<div class="text-center">
				<img src="<?= $this->assetUrl("img/visuels/etudiant-soutien.jpg") ?>" class="img-circle">
			</div>
		</div>
	</div>
</section>

<!-- DERNIERS ETUDIANTS INSCRITS -->
<section class="fluid-container">

	<div class="row last_students">

		<h3>Ils viennent de nous rejoindre !</h3>

		<div class="container">
			<?php foreach($lastStudentsForView as $etudiant): ?>

				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">

				<!-- !!!!!!!!!!!!!!! A DECOMMMENTER QUAND RASSEMBLEMENT DES FICHIERS !!!!!!!!!!!!!!!!!!!!! -->
					<!-- <div class="thumbnail vignette" onclick="location.href='<?php //echo $this->url('detailsetudiant_detailsetudiant', ['id' => $valeur['id_u']]); ?>';" > -->
				
					<div class="thumbnail vignette">

						<img src="<?= $this->assetUrl("img/photos/{$etudiant['photo']}");?>" class="img-responsive" alt="Etudiant">

						<div class="description"><?php echo $etudiant['prenom'];?><br><span class="matiere"><?php echo $etudiant['matiere'];?></span></div>
					
					</div>

				</div>
			
			<?php endforeach; ?>
		</div>

	</div>
</section>

<?php $this->stop('main_content') ?>