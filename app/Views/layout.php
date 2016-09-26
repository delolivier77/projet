<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/normalize.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font/stylesheet.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style1.css') ?>">
	<link rel="stylesheet" href="//cdn.materialdesignicons.com/1.7.22/css/materialdesignicons.min.css">
	<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
</head>
<body>
<script type="text/javascript">var mapStack = []; var googleLoaded = false;</script>
<div class="page">  <!--  pour la gestion du footer -->

	<!-- HEADER -->
		<nav class="navbar navbar-default navbar-fixed-top header">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand domaine" href="<?php echo $this->url('default_home')?>" >SOUTIEN-ETUDIANT.FR</a>
				</div>

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">

						<li><a href="<?php echo $this->url('default_home')?>" ><i class="fa fa-home menu" aria-hidden="true"></i></a></li>

<!-- OLIVIER : 2 POSSIBILITES DE MENU, SELON CE QUE TU VEUX FAIRE-->
<!-- Sans menu déroulant -->
						<!-- <li><a href="#" class="menu">Connexion</a></li> -->

<!-- Avec menu déroulant -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Connexion<span class="caret"></span></a>

							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li role="separator" class="divider"></li>
								<li class="dropdown-header">Nav header</li>
								<li><a href="#">Separated link</a></li>
								<li><a href="#">One more separated link</a></li>
							</ul>
						</li>




						<li><a href="#" class="menu">Inscription</a></li>

					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li> 
							<form class="navbar-form navbar-right">
							<button type="submit" class="btn btn-primary btn-cours">Donner des cours</button>
							</form>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	
	<!-- CONTENU PRINCIPAL -->
	<?= $this->section('main_content') ?>

	<!-- FOOTER -->
	<footer>
		<div class="fluid-container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<!-- <p>soutien-etudiant.fr &copy; 2016</p>
					<a href="<?php // echo $this->url('default_contact')?>">Contact</a>
					<a href="<?php // echo $this->url('default_cgu')?>">Mentions légales</a> -->
				</div>
			</div>
		</div>
	</footer>
	
</div><!--  FIN div.page -->
<script>
	function initMap() {
		googleLoaded = true;
		for(var i = 0; i<mapStack.length; i++) {
		mapStack[i]();
			}
		}
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPlW4LQDMOdSwwxD63oCeedmLRHb6yIjo&libraries=places&callback=initMap&region=FR" async defer></script>
<script type="text/javascript" src="<?php echo $this->assetUrl('js/bootstrap.min.js');?>"></script>
</body>
</html>