<?php

	
	$url_photo = 'img/photos/'.$etudiant['photo'];
	

 ?>

<div id="profil">
	<img src="<?= $this->assetUrl($url_photo);?>" alt="photo">
	<h2><?= $etudiant['civilite']. " " . $_SESSION['user']['prenom'] . " " . $_SESSION['user']['nom'] . "<br>"  ?> </h2>
	<?php  echo $etudiant['date_naissance'] .'<br>'.
		$etudiant['adresse'] . " " . $etudiant['cp'] . " " . $etudiant['ville']. "<br><br>".
		$_SESSION['user']['email'] . '<br>'.
		$etudiant['tel'] . '<br><br>' .
		'Inscrit depuis le : ' . $_SESSION['user']['date_inscription'] . '<br><br>' .
		'Type de rendez-vous : ' . $etudiant['type_rdv'] . '<br>' .
		'Niveau : ' . $etudiant['niveau_etude'] . '<br>'.

		$matiere[0]['nom'] . " " . $scolarite_min[0]['nom'] . " " . $scolarite_max[0]['nom']. "<br>".

		$etudiant['description'] . '<br>'.
		$etudiant['dispo'] . '<br>'.
		$etudiant['detail_dispo'] . '<br>'.
		$etudiant['tarif'] . '€<br><br>';
		
		foreach ($commentaire as $value) {
			echo $value['note'].'<br>' . $value['commentaire'] . '<br>' . $value['date_commentaire'] .'<br><br>';
		}

		





	?>
</div>