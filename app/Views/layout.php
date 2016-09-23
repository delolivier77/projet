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
	<link rel="stylesheet" href="//cdn.materialdesignicons.com/1.7.22/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style1.css') ?>">
</head>


<body>
	<!-- header -->
	
	<div class="fluid-container">
		<div class="container">
			<header class="row">
				<div class="col-lg-12 text-center header">

					<ul class="nav navbar-nav">
						<li> <a href="#"><i class="fa fa-home" aria-hidden="true"></i></a></li>
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

		
	</body>
	</html>