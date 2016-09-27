<?php

// On charge le layout
$this->layout('layout_admin', ['title' => 'Utilisateurs']);

// On place le contenu de la vue
$this->start('main_content');

?>

<!-- AFFICHAGE DE TOUS LES UTILISATEURS -->

<h1>Tous les utilisateurs</h1>

<!-- Affichage d'un message éventuel avec l'administrateur -->
<?php echo $fmsg->display(); ?>

<table class="table-striped table-bordered table-hover table-condensed">

	<tr><th>id_u</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Date d'inscription</th><th>Statut</th><th colspan="2">Actions</th></tr>

	<?php foreach($users as $valeur) : ?>	
		<tr>
			<?php foreach($valeur as $indice2 => $valeur2) : 
				if ($indice2 != 'mdp') 
				{?>
					<td><?= $valeur2 ?></td>
				<?php ;}
				endforeach; ?>

			<!-- Modification -->
			<td><a href="<?php echo $this->url('admin_find_all_user_edit', array('id' => $valeur['id_u'])) ; ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
			<!-- Suppression -->
			<td><a href="<?php echo $this->url('admin_delete_user', array('id' => $valeur['id_u'])) ; ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer cet utilisateur ?');"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td>
		</tr>
	<?php endforeach; ?>
	
</table>

<?php
// Par défaut, on sélectionne actif  dans le formulaire pour le statut : 
$statut_a = (!isset($_POST['statut']) || (isset($_POST['statut'])) && $_POST['statut'] == "actif") ? 'selected' : '';  
$statut_i = (isset($_POST['statut']) && $_POST['statut'] == "inactif") ? 'selected' : '';
$statut_b = (isset($_POST['statut']) && $_POST['statut'] == "banni") ? 'selected' : '';
?>

<!-- FORMULAIRE -->

<div class="row">
<form action="<?php echo $this->url('admin_save_user') ?>" method="post">
	
	<h2>Gestion du statut actif / désactif / banni</h2>
	
	<input type="hidden" name="id_u" value="<?php if(isset($user)){ echo $user['id_u']; } ?>"/>
		
	<div class="form-group col-xs-4">

		<label>Nom</label>
		<input type="text" class="form-control" name="nom" placeholder="Nom" value="<?php if(isset($user)){ echo $user['nom']; } ?>"/>

		<label>Statut</label>
		<select name="statut" class="form-control">
			<option value="actif" <?= $statut_a ?>>actif</option>
			<option value="inactif" <?= $statut_i?>>inactif</option>
			<option value="banni" <?= $statut_b?>>banni</option>
		</select>
		
		<input type="submit" class="btn btn-primary" name="enregistrer" value="Enregistrer" />

	</div>

	<div class="form-group col-xs-4">

		<label>Prénom</label>
		<input type="text" class="form-control" name="prenom" placeholder="Prénom" value="<?php if(isset($user)){ echo $user['prenom']; } ?>"/>

	</div>

	<div class="form-group col-xs-4">

		<label>Email</label>
		<input type="email" class="form-control" name="email" placeholder="email" value="<?php if(isset($user)){ echo $user['email']; } ?>"/>

	</div>

</form>
</div>

	<form action="<?php echo $this->url('admin_add_user') ?>" method="post">
	
	<h2>Ajout d'un administrateur</h2>
	
	<div class="form-group col-xs-4">

		<label>Nom</label>
		<input type="text" class="form-control" name="nom" placeholder="Nom" value="<?php if(isset($user)){ echo $user['nom']; } ?>"/>

		<label>Statut</label>
		<select name="statut" class="form-control">
			<option value="actif">actif</option>
			<option value="inactif">inactif</option>
			<option value="banni" >banni</option>
		</select>
		
		<input type="submit" class="btn btn-primary" name="enregistrer" value="Enregistrer" />

	</div>

	<div class="form-group col-xs-4">

		<label>Prénom</label>
		<input type="text" class="form-control" name="prenom" placeholder="Prénom" value=""/>

		<label>Mot de passe</label>
		<input type="mdp" class="form-control" name="mdp" placeholder="mdp" value=""/>

	</div>

	<div class="form-group col-xs-4">

		<label>Email</label>
		<input type="email" class="form-control" name="email" placeholder="email" value=""/>

	</div>

	

</form>


<!-- FORMULAIRE D'AJOUT D'UN NOUVEAU ADMIN-->
	




<?php $this->stop('main_content'); ?>
<!-- fin du contenu de la vue -->