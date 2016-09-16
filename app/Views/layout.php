<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>soutien-etudiant</title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/normalize.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css'); ?>" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">

	
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style1.css') ?>">
</head>
<body>
<!-- navigation -->
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<ul class="nav navbar-nav">

					<li> <a href="#">Accueil</a> </li>
					<li> <a href="#">Connexion</a> </li>
					<li> <a href="#">Inscription</a> </li>
				</ul>
				<ul class="nav navbar-brand">
					<li>SOUTIEN-ETUDIANT.FR</li>
				</ul>
				
				<form class="navbar-form navbar-right inline-form">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-sm"><span class=""></span>Donner des cours</button>
					</div>
				</form>
			</div>
		</nav>
	</div>


<!-- section	 -->
		<section id="visuel">
			
			<!-- <?= $this->section('main_content') ?> -->

			<div class="row clearfix">

				<h1>Un soutien scolaire pour votre enfant par des étudiants</h1>

				<div class="col-lg-12"></div>

				<form method="POST" action="">  

					<input placeholder="Matière" type="text" id="matiere" name="name">
					<input placeholder="Niveau" type="text" id="niveau" name="name">
					<input placeholder="Ville" type="text" id="searchTextField" name="name">
					<input type="submit" value="Rechercher">

				</form>
			</div>
		</section>
	

<!-- footer -->

	<footer class="container">
    <p class="titre">soutien-etudiant.fr &copy; Copyright 2016<br> <a href="#">FAQ</a>-  <a href="#">Contact</a>-Conditions générales</p>
	</footer>
	
		
</body>
</html>