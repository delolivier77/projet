<?php 

// On charge le layout
$this->layout('layout_admin', ['title' => 'Matières']);

// On place le contenu de la vue
$this->start('main_content');

?>

<!-- AFFICHAGE DE TOUTES LES MATIERES -->

<h1>Toutes les matières</h1>

<!-- Affichage d'un message éventuel avec l'administrateur -->
<?php echo $fmsg->display(); ?>

<table class="table-striped table-bordered table-hover table-condensed">

	<tr><th>id_m</th><th>Matière</th><th colspan="2">Actions</th></tr>

	<?php foreach($matieres as $valeur) : ?>	
		<tr>
			<?php foreach($valeur as $indice2 => $valeur2) : ?>
				<td><?= $valeur2 ?></td>
			<?php endforeach; ?>

			<!-- Modification -->
			<td><a href="<?php echo $this->url('admin_find_all_matiere_edit', array('id' => $valeur['id_m'])) ; ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
			<!-- Suppression -->
			<td><a href="<?php echo $this->url('admin_delete_matiere', array('id' => $valeur['id_m'])) ; ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer cette matière ?');"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
		</tr>
	<?php endforeach; ?>

</table>

<!-- FORMULAIRE -->
<form action="<?php echo $this->url('admin_save_matiere') ?>" method="post">
	
	<input type="hidden" name="id_m" value="<?php if(isset($matiere)){ echo $matiere['id_m']; } ?>"/>
	
	<div class="form-group col-xs-5">
		<label>Matière</label>
		<input type="text" class="form-control" name="nom" placeholder="Matière" value="<?php if(isset($matiere)){ echo $matiere['nom']; } ?>"/>

		<input type="submit" class="btn btn-primary" name="enregistrer" value="<?php if(isset($matiere)){echo "Modifier";}else{ echo "Ajouter";} ?>" />
	</div>

</form>

<?php $this->stop('main_content'); ?>
<!-- fin du contenu de la vue -->