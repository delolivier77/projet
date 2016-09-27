<?php 

// On charge le layout
$this->layout('layout_admin', ['title' => 'Commentaires']);

// On place le contenu de la vue
$this->start('main_content');

?>

<!-- AFFICHAGE DE TOUS LES COMMENTAIRES -->

<h1>Tous les commentaires</h1>

<!-- Affichage d'un message éventuel avec l'administrateur -->
<?php echo $fmsg->display(); ?>

<table class="table-striped table-bordered table-hover table-condensed">

	<tr><th>id_co</th><th>Particulier</th><th>Etudiant</th><th>Note</th><th>Commentaire</th><th>Date du commentaire</th><th>Action</th></tr>

	<!-- <tr><th>id_co</th><th>Etudiant</th><th>Note</th><th>Commentaire</th><th>Date du commentaire</th><th>Action</th></tr> -->

	<?php foreach($commentaires as $valeur) : ?>	
		<tr>
			<?php foreach($valeur as $indice2 => $valeur2) : ?>
				<td><?= $valeur2 ?></td>
			<?php endforeach; ?>

			<!-- Suppression -->
			<td><a href="<?php echo $this->url('admin_delete_commentaire', array('id' => $valeur['id_co'])) ; ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce commentaire ?');"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
		</tr>
	<?php endforeach; ?>

</table>

<?php $this->stop('main_content'); ?>
<!-- fin du contenu de la vue -->