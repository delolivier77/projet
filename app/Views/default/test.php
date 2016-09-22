<?php $this->layout('layout', ['title' => 'Accueil']) ?>
<?php $this->start('main_content') ?>
	<section id="visuel">
		<div class="row clearfix">
			<h1>Un soutien scolaire pour votre enfant par des étudiants</h1>
			<div class="col-lg-12">
				<?php $this->insert('recherche/recherche',array('matieres'=>$matieres, 'scolarites'=>$scolarites)); ?>
			</div>
			</div>
	</section>
<?php $this->stop('main_content') ?>