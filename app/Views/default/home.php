

<?php $this->layout('layout', ['title' => 'testhome']) ?>



<?php $this->start('main_content') ?>




<!-- section -->

<div class="fluid-container">

	<div class="visuel">

		<div class="container">



			<!-- <?= $this->section('main_content') ?> -->

			<h1>Un soutien scolaire pour votre enfant par des étudiants</h1>



			<div class="row">

				<?php $this->insert('recherche/recherche',array('matieres'=>$matieres, 'scolarites'=>$scolarites)); ?>



			</div>

		</div>

	</div>

</div>	

<!-- aside 1-->

<div class="container">

	<aside class="row">



		<div class="col-lg-6 line">

			<h2>Vous recherchez du soutien scolaire<br>pour vos enfants</h2>

			<div class="text-center">

				<img src="<?= $this->assetUrl("img/visuels/eleve.jpg") ?>" class="img-circle">

			</div>					 

		</div>



		<div class="col-lg-6">

			<h2>Ils sont étudiants et souhaitent transmettre leurs connaissances</h2>

			<div class="text-center">

				<img src="<?= $this->assetUrl("img/visuels/etudiant-soutien.jpg") ?>" class="img-circle">

			</div>

		</div>

	</aside>

</div>  



<!-- aside 2-->

<div class="fluid-container test2">

	<aside class="row">

		<h3>Ils viennent de nous rejoindre !</h3>



		<div class="container">

			<?php foreach($lastStudentsForView as $etudiant): ?>



			<div class="col-lg-4">



				<div class="thumbnail"> 

				

					<img src="<?= $this->assetUrl("img/photos/{$etudiant['photo']}");?>" class="img-responsive">

					<div class="desc"><?php echo $etudiant['prenom'];?><br><?php echo $etudiant['matiere'];?></div>

				

				</div>

			</div> 

			



			<?php endforeach; ?>

		</div>

	</aside>

</div>







<?php $this->stop('main_content') ?>

