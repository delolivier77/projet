<?php

    $this->layout('layout');
	 

	$this->start('main_content');

	$url_photo = 'img/photos/'.$etudiant['photo'];
	$date_naissance = date('d/m/Y', strtotime($etudiant['date_naissance']));
	$date_inscription = date('d/m/Y', strtotime($_SESSION['user']['date_inscription']));
	

 ?>

<div id="profil">
	<img src="<?= $this->assetUrl($url_photo);?>" alt="photo">
	<h2><?= $etudiant['civilite']. " " . $_SESSION['user']['prenom'] . " " . $_SESSION['user']['nom'] . "<br>"  ?> </h2>
	<?php  echo 'Note moyenne: '. $avg[0]['avg'] . ' Nombre d\'avis :' . $avg[0]['count']. '<br><br>'.
		'Date de naissance : ' . $date_naissance .'<br>'.
		$etudiant['adresse'] . " " . $etudiant['cp'] . " " . $etudiant['ville']. "<br><br>".
		$_SESSION['user']['email'] . '<br>'.
		$etudiant['tel'] . '<br><br>' .
		'Inscrit depuis le : ' . $date_inscription . '<br><br>' .
		'Type de rendez-vous : ' . $etudiant['type_rdv'] . '<br>' .
		'Niveau : ' . $etudiant['niveau_etude'] . '<br>'.

		$matiere[0]['nom'] . " " . $scolarite_min[0]['nom'] . " " . $scolarite_max[0]['nom']. "<br>".

		$etudiant['description'] . '<br>'.
		$etudiant['dispo'] . '<br>'.
		$etudiant['detail_dispo'] . '<br>'.
		$etudiant['tarif'] . '€<br><br>';
		
		foreach ($commentaire as $value) {
			echo $value['note'].'<br>' . $value['commentaire'] . '<br>' . date('d/m/Y H:i:s', strtotime($value['date_commentaire'])) .'<br><br>';
		}

		
	?>
</div>

	<?php $this->stop('main_content');  ?>