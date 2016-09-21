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
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style1.css') ?>">
</head>


<body>
	<!-- header -->
	

		<nav class="navbar navbar-default">
		<div class="fluid-container">
			<div class="container">

				<ul class="nav navbar-nav">
					<li> <a href="#"><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li> <a href="#">Connexion</a> </li>
					<li> <a href="#">Inscription</a> </li>
				</ul>

				<ul class="nav navbar-brand" class="responsive">
					<li>SOUTIEN-ETUDIANT.FR</li>
				</ul>

				<form class="navbar-form navbar-right inline-form">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-md"<span class=""></span>Donner des cours</button>						
					</div>
				</form>	

			</nav>
		</div>
	</div>


	<!-- section	 -->
	<div class="fluid-container">
		<section class="row">
			<div class="visuel" class="img-responsive">
				<div class="container">
					<!-- <?= $this->section('main_content') ?> -->

					<h1>Un soutien scolaire pour votre enfant par des étudiants</h1>

					<form method="POST" action=""> 

						<div class="col-lg-3">
							<input placeholder="" class= form-control value=Matière type="text">
						</div>
						<div class="col-lg-3">
							<input placeholder="" class= form-control value=Niveau type="text">
						</div>					
						<div class="col-lg-3">				
							<input placeholder="" class= form-control value=Ville type="text">
						</div>

						<button type="submit" class="btn btn-primary btn-md"><span class=""></span>Rechercher</button>


					</form>	
				</div>
			</div>				
		</section>
	</div>

	<!-- aside 1-->
	<div class="container">
		<aside class="row">

			<div class="col-lg-6 line">
				<h2>Vous recherchez du soutien scolaire pour vos enfants</h2>
				<div class="text-center">
					<img src="<?= $this->assetUrl("img/visuels/eleve.jpg") ?>" class="img-circle">
				</div>					 
			</div>

			<div class="col-lg-6">
				<h2>Ils sont étudiants et souhaitent transmettre leurs connaissances</h2>
				<div class="text-center">
					<img src="<?= $this->assetUrl("img/visuels/etudiant-soutien.jpg") ?>" class="img-circle">
				</div>
			</div>
		</aside>
	</div>  

	<!-- aside 2-->
	<div class="fluid-container test2">
		<aside class="row">
			<h3>Ils viennent de nous rejoindre !</h3>

			<div class="container">

				<div class="col-lg-4 test2">
				
					<div class="text-center">
						<img src="<?= $this->assetUrl("img/photos/04-etudiant.jpg") ?>">
						<div class="desc">Prénom<br>Matière</div>
						
					</div>
				</div>

				<div class="col-lg-4 test2">
					<div class="text-center">
						<img src="<?= $this->assetUrl("img/photos/05-etudiant.jpg" ) ?>">
						<div class="desc">Prénom<br>Matière</div>
						
					</div>
				</div> 


				<div class="col-lg-4 test2">
					<div class="text-center">
						<img src="<?= $this->assetUrl("img/photos/25-etudiant.jpg") ?>">
						<div class="desc">Prenom<br>Matière</div>
						
					</div>
				</div>
			</aside>  
		</div>

		<!-- footer -->
		<div class="fluid-container">
			<footer class="row">
				<div class="col-lg-12">
					<p>soutien-etudiant.fr &copy; Copyright 2016<br> <a href="#">FAQ</a> - <a href="#">Contact</a>- Conditions générales</p>
				</div>
			</footer>
		</div>

		
	</body>
	</html>