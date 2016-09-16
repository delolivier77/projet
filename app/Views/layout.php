<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>soutien-etudiant</title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/normalize.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css'); ?>" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style1.css') ?>">
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPlW4LQDMOdSwwxD63oCeedmLRHb6yIjo&libraries=places&region=FR"></script>
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
			<div class="row clearfix">

				<h1>Un soutien scolaire pour votre enfant par des étudiants</h1>
				<?= $this->section('main_content') ?>
				<div class="col-lg-12"></div>

				
			</div>
		</section>
		<section>
			<?= $this->section('search_result') ?>
		</section>
<!-- footer -->

	<footer class="container">
    <p class="titre">soutien-etudiant.fr &copy; Copyright 2016<br> <a href="#">FAQ</a>-  <a href="#">Contact</a>-Conditions générales</p>
	</footer>
	
		
</body>
</html>