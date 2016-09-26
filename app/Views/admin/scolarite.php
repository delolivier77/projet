<?php 

// On charge le layout
$this->layout('layout_admin', ['title' => 'Scolarité']);

// On place le contenu de la vue
$this->start('main_content');

?>

<!-- AFFICHAGE DE TOUTES LES MATIERES -->

<h1>Tous les niveaux de scolarité</h1>

<!-- Affichage d'un message éventuel avec l'administrateur -->
<?php echo $fmsg->display(); ?>

<table class="table-striped table-bordered table-hover table-condensed">

	<tr><th>id_s</th><th>Scolarité</th><th>Action</th></tr>

	<?php foreach($scolarites as $valeur) : ?>	
		<tr>
			<?php foreach($valeur as $indice2 => $valeur2) : ?>
				<td><?= $valeur2 ?></td>
			<?php endforeach; ?>
			
			<!-- Modification -->
			<td><a href="<?php echo $this->url('admin_find_all_scolarite_edit', array('id' => $valeur['id_s'])) ; ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
		</tr>
	<?php endforeach; ?>

</table>

<!-- FORMULAIRE -->
<form action="<?php echo $this->url('admin_save_scolarite') ?>" method="post">
	
	<input type="hidden" name="id_s" value="<?php if(isset($scolarite)){ echo $scolarite['id_s']; } ?>"/>
	
	<div class="form-group col-xs-5">
		<label>Niveau de scolarité</label>
		<input type="text" class="form-control" name="nom" placeholder="Niveau de scolarité" value="<?php if(isset($scolarite)){ echo $scolarite['nom']; } ?>"/>

		<input type="submit" class="btn btn-primary" name="enregistrer" value="Modifier" />
	</div>

</form>

<?php $this->stop('main_content'); ?>
<!-- fin du contenu de la vue -->