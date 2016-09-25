<?php

  $fmsg->display(); 
	$url_photo = 'img/photos/'.$etudiant['photo'];
	$date_naissance = date('d/m/Y', strtotime($etudiant['date_naissance']));

?>



<form action="<?= $this->url('user_update_etudiant')?>" method="post" enctype="multipart/form-data">
	


	<fieldset id="part1">

      	<img src="<?= $this->assetUrl($url_photo);?>" alt="photo">
        <input type="hidden" name="nom_photo" value="<?= $etudiant['photo']?>">
      	<input type="file" name="photo" id="photo"><br>
		    <input type="radio" name="civilite" value="M." <?=(isset($etudiant['civilite']) && $etudiant['civilite'] == "M.") ? 'checked' : ""?>>M.
  	  	<input type="radio" name="civilite" value="Mme" <?=(isset($etudiant['civilite']) && $etudiant['civilite'] == "Mme") ? 'checked' : ""?> >Mme<br>
  		<input type="text" name="nom" id="nom" value="<?= $_SESSION['user']['nom']?>"><br>
  		<input type="text" name="prenom" id="prenom" value="<?= $_SESSION['user']['prenom']?>"><br>
  		<input type="text" name="email" id="email" value="<?= $_SESSION['user']['email']?>"><br>
  		<input type="text" name="date_naissance" id="date_naissance" value="<?= $date_naissance?>"><br>
  		<input type="text" name="tel" id="tel" value="<?= $etudiant['tel']?>"><br>
  		<input type="text" name="adresse" id="adresse" value="<?= $etudiant['adresse']?>"><br>
  		<input type="text" name="cp" id="cp" value="<?= $etudiant['cp']?>"><br>
  		<input type="text" name="ville" id="ville" value="<?= $etudiant['ville']?>"><br>

  	  <label for="ancien_mdp">Pour changer de mot de passe, inscrire l'ancien avant d'en écrire un nouveau</label><br>
      <input type="text" name="ancien_mdp" id="ancien_mdp" placeholder = "Ancien mot de passe" >
      <input type="text" name="nouveau_mdp" id="nouveau_mdp" placeholder = "Nouveau mot de passe" ><br>
  		
      <select name="niveau_etude">
        <option selected disabled >Niveau d'étude</option>
        <option value="Bac +1" <?= ($etudiant['niveau_etude'] == 'Bac +1') ? 'selected' : "" ?> >Bac +1</option>
        <option value="Bac +2" <?= ($etudiant['niveau_etude'] == 'Bac +2') ? 'selected' : "" ?> >Bac +2</option>
        <option value="Bac +3" <?= ($etudiant['niveau_etude'] == 'Bac +3') ? 'selected' : "" ?> >Bac +3</option>
        <option value="Bac +4" <?= ($etudiant['niveau_etude'] == 'Bac +4') ? 'selected' : "" ?> >Bac +4</option>
        <option value="Bac +5 (ou +)" <?= ($etudiant['niveau_etude'] == 'Bac +5 (ou +)') ? 'selected' : "" ?> >Bac +5 ou plus</option>
      </select><br>

  		<input type="text" name="num_etudiant" id="num_etudiant" value="<?= $etudiant['num_etudiant']?>"><br>
  	</fieldset>

  	<fieldset id="part2">
        <input type="hidden" name="id_cn" value="<?= $connaissance[0]['id_cn']?>">
        <select name="matiere">
          <option selected disabled >Matière</option>
          <?php 
             foreach ($matiere_list as $indice)
             {
                $m_selected = (isset($connaissance[0]['id_m']) && $indice['id_m'] == $connaissance[0]['id_m']) ? "selected" : "";
                echo '<option value="'. $indice['id_m'] . '"'. $m_selected .'>' .  $indice['nom']. '</option>';
             }
          ?>
        </select><br>
    		
        <select name="classe_debut">
          <option selected disabled >Classe de début</option>
          <?php 
               foreach ($scolarite_list as $indice)
               {
                 $cd_selected = (isset($connaissance[0]['id_s_min']) && $indice['id_s'] == $connaissance[0]['id_s_min']) ? "selected" : "";
                 echo '<option value="'. $indice['id_s'] . '"'. $cd_selected .'>' .  $indice['nom']. '</option>';
               }
          ?>
        </select><br>

        <select name="classe_fin">
          <option selected disabled >Classe de fin</option>
          <?php 
               foreach ($scolarite_list as $indice)
               {
                 $cf_selected = (isset($connaissance[0]['id_s_max']) && $indice['id_s'] == $connaissance[0]['id_s_max']) ? "selected" : "";
                 echo '<option value="'. $indice['id_s'] . '"'. $cf_selected .'>' .  $indice['nom']. '</option>';
              }
          ?>
        </select><br>


  		  <textarea name="description" ><?= $etudiant['description']?></textarea><br>


  		  	<input type="radio" name="type_rdv" value="faceface" <?=(isset($etudiant['type_rdv']) && $etudiant['type_rdv'] == "faceface") ? 'checked' : ""?> > Face à face
    		<input type="radio" name="type_rdv" value="webcam"  <?=(isset($etudiant['type_rdv']) && $etudiant['type_rdv'] == "webcam") ? 'checked' : ""?> > Webcam
    		<input type="radio" name="type_rdv" value="both"  <?=(isset($etudiant['type_rdv']) && $etudiant['type_rdv'] == "both") ? 'checked' : ""?> > Les deux<br>
    		</fieldset>

    	<fieldset id="part3">
    		Actuellement je suis :
    		<input type="radio" name="dispo" value="0" <?=(isset($etudiant['dispo']) && $etudiant['dispo'] == "0") ? 'checked' : ""?>>Indisponible
  	  		<input type="radio" name="dispo" value="1" <?=(isset($etudiant['dispo']) && $etudiant['dispo'] == "1") ? 'checked' : ""?> >Disponible<br>
    		<textarea name="detail_dispo"> <?= $etudiant['detail_dispo']?></textarea><br>
    		<input type="text" name="tarif" id="tarif" " value="<?= $etudiant['tarif']?>"><br>
    	</fieldset>



      <input type="submit" name="enregister" value="Inscription">


  

</form>
