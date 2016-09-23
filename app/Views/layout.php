<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>soutien-etudiant</title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/normalize.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet"> 
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style1.css') ?>">
	<link rel="stylesheet" href="//cdn.materialdesignicons.com/1.7.22/css/materialdesignicons.min.css">
	<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
</head>
<body>
<script type="text/javascript">var mapStack = []; var googleLoaded = false;</script>
	<!-- header -->
	<div class="fluid-container">
		<div class="container">
			<header class="row">
				<div class="col-lg-12 text-center header">

					<ul class="nav navbar-nav">
						<li> <a href="<?=$this->url('default_home') ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
						<li> <a href="#">Connexion</a> </li>
						<li> <a href="#">Inscription</a> </li>
					</ul>

					<ul class="nav navbar-brand">
						<li>SOUTIEN-ETUDIANT.FR</li>
					</ul>

					<form class="nav navbar-form">
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-md">Donner des cours</button>						
						</div>
					</form>	
				</div>
			</header>
		</div>
	</div>
	<?= $this->section('main_content') ?>			
	<!-- section	 -->
	<div class="fluid-container">
	</div>
		<!-- footer -->
		<div class="fluid-container">
			<footer class="row">
				<div class="col-lg-12 text-center footer">
					<p>soutien-etudiant.fr &copy; Copyright 2016<br> <a href="#">FAQ</a> - <a href="#">Contact</a>- Conditions générales</p>
				</div>
			</footer>
		</div>
<script>
	function initMap() {
		googleLoaded = true;
		for(var i = 0; i<mapStack.length; i++) {
		mapStack[i]();
			}
		}
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPlW4LQDMOdSwwxD63oCeedmLRHb6yIjo&libraries=places&callback=initMap&region=FR" async defer></script>
</body>
</html>