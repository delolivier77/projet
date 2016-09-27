<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?= $this->e($title) ?></title>
	
	<link rel="stylesheet" href="<?= $this->assetUrl('css/normalize.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css'); ?>" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/admin.css') ?>">
</head>
<body>


<!-- HEADER -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<p class="navbar-brand">Administration</p>

				<ul class="nav navbar-nav menu">
					<li><a href="<?php echo $this->url('default_home')?>" ><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right menu">

<!-- !!!!!!!!!!!!!!!!!!! METTRE LE BON LIEN !!!!!!!!!!!!!!!!!!!!! -->

					<li><a href="<?php echo $this->url('user_logout')?>"><i class="fa fa-user" aria-hidden="true"></i>Déconnexion</a></li>
				</ul>
			</div>
		</div>
	</nav>

<!-- SIDEBAR -->
	<section class="col-sm-2 col-lg-2 sidebar">
		<ul class="nav">
			<li class="active"><a href="#">Tableau de bord</a></li>
			<li><a href="<?= $this->url('admin_find_all_commentaire') ?>">Commentaires</a></li>
			<li><a href="<?= $this->url('admin_find_all_user') ?>">Utilisateurs</a></li>
			<li><a href="<?= $this->url('admin_find_all_matiere') ?>" >Matières</a></li>
			<li><a href="<?= $this->url('admin_find_all_scolarite') ?>">Scolarité</a></li>
		</ul>
	</section>

<!-- CONTENU PRINCIPAL -->
	<section class="col-sm-10 col-sm-offset-2 col-lg-10 col-lg-offset-2">			
		<div class="row">
			<div class="col-lg-12">

				<?= $this->section('main_content') ?>

			</div>
		</div>		
	</section>

<!-- FOOTER -->
	<footer>
		<p>&copy; Copyright 2016</p>
		<a href="<?php echo $this->url('default_home')?>">soutien-etudiant.fr</a>
	</footer>

</body>
</html>