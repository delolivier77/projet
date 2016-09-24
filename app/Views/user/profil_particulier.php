<?php
	
	
	$this->layout('layout');
	 


	$this->start('main_content');

	echo $fmsg->display(); 

	$date_naissance = date('d/m/Y', strtotime($enfant[0]['date_naissance']));
	$date_inscription = date('d/m/Y', strtotime($_SESSION['user']['date_inscription']));
	

?>


<div id="profil">
	<h2><?= $particulier['civilite']. " " . $_SESSION['user']['prenom'] . " " . $_SESSION['user']['nom'] . "<br>"  ?> </h2>
	<?php  echo $particulier['adresse'] . " " . $particulier['cp'] . " " . $particulier['ville']. "<br><br>".
		$_SESSION['user']['email'] . '<br>'.
		$particulier['tel'] . '<br><br>' .
		'Inscrit depuis le : ' . $date_inscription . '<br><br>' .
	
		$enfant[0]['prenom'] . " " . $date_naissance . " " . $scolarite['nom']. "<br><br>";
		?>
		Les commentaires que vous avez postés<br><br>
		<?php
			
			foreach ($commentaire as $value) {
				echo 'etudiant: ' . $value['nom']. ' ' . $value['prenom'] . '<br>';
				echo 'note :' . $value['note'].'<br>' . $value['commentaire'] . '<br>' . date('d/m/Y H:i:s', strtotime($value['date_commentaire'])) .'<br>';
				
				echo '<a href=' . $this->url('commentaire_form_commentaire', ['id' => $value['id_co']]). '>Modifier le commentaire</a><br>';
				echo '<a href=' . $this->url('commentaire_delete_commentaire', ['id' => $value['id_co']]). '>Supprimer le commentaire</a><br><br>';
			}
		
	?>


	<br>
	<a href=<?=$this->url('user_form_profil_particulier')  ?>>Modifier le profil</a>

</div>


<?php $this->stop('main_content');  ?>

