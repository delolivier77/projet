
<?php
  if (isset($message)){
    debug ($message);
  }

  extract($_POST);
  $civilite_h = (!isset($civilite) || (isset($civilite)) && $civilite == "M.") ? 'checked' : "";  
  $civilite_f = (isset($civilite) && $civilite == "Mme") ? 'checked' : "";  
  $nom = (isset($nom)) ? $nom : "";
  $prenom = (isset($prenom)) ? $prenom : "";
  $email = (isset($email)) ? $email : "";
  $mdp = (isset($mdp)) ? $mdp : "";
  $date_naissance = (isset($date_naissance)) ? $date_naissance : "";
  $tel = (isset($tel)) ? $tel : "";
  $adresse = (isset($adresse)) ? $adresse : "";
  $cp = (isset($cp)) ? $cp : "";
  $ville = (isset($ville)) ? $ville : "";


  $b1 = ""; $b2 = "" ; $b3 = "" ; $b4 = "" ; $b5 = "";
  if (isset($niveau_etude))
  {
    switch ($niveau_etude)
    {
      case 'Bac +1':
        $b1 = "selected";
        break;
      case 'Bac +2':
        $b2 = "selected";
        break;
      case 'Bac +3':
        $b3 = "selected";
        break;
      case 'Bac +4':
        $b4 = "selected";
        break;
      case 'Bac +5 (ou +)':
        $b5 = "selected";
        break;
    }
  }

  $num_etudiant = (isset($num_etudiant)) ? $num_etudiant : "";

  $rdv_ff = (!isset($type_rdv) || (isset($type_rdv)) && $type_rdv == "faceface") ? 'checked' : "";  
  $rdv_w = (isset($type_rdv) && $type_rdv == "webcam") ? 'checked' : "";
  $rdv_2 = (isset($type_rdv) && $type_rdv == "both") ? 'checked' : "";

  $description = (isset($description)) ? $description : "";
  $detail_dispo = (isset($detail_dispo)) ? $detail_dispo : "";
  $tarif = (isset($tarif)) ? $tarif : "";

 

?>

 
<form action="<?= $this->url('user_add_user_etudiant')?>" method="post" enctype="multipart/form-data">
	
 

	<fieldset id="part1">
      <img src="<?= $this->assetUrl('img\visuels\user.png') ?>" alt="photo" width="120">
   		<input type="file" name="photo"><br>
		  <input type="radio" name="civilite" value="M." <?= $civilite_h?>>M.
  		<input type="radio" name="civilite" value="Mme" <?= $civilite_f?>>Mme<br>
  		<input type="text" name="nom" id="nom" placeholder = "Nom" value="<?= $nom?>"><br>
  		<input type="text" name="prenom" id="prenom" placeholder = "Prénom" value="<?= $prenom?>"><br>
  		<input type="text" name="email" id="email" placeholder = "Email" value="<?= $email?>"><br>
  		<input type="text" name="mdp" id="mdp" placeholder = "Mot de passe" value="<?= $mdp?>"><br>
  		<input type="text" name="date_naissance" id="date_naissance" placeholder = "Date de Naissance (00/00/0000)" value="<?= $date_naissance?>"><br>
  		<input type="text" name="tel" id="tel" placeholder = "N° de téléphone (0000000000)" value="<?= $tel?>"><br>
  		<input type="text" name="adresse" id="adresse" placeholder = "Adresse" value="<?= $adresse?>"><br>
  		<input type="text" name="cp" id="cp" placeholder = "CP (00000)" value="<?= $cp?>"><br>
  		<input type="text" name="ville" id="ville" placeholder = "Ville" value="<?= $ville?>"><br>
  		
      <select name="niveau_etude">
        <option selected disabled >Niveau d'étude</option>
        <option value="Bac +1" <?= $b1?>>Bac +1</option>
        <option value="Bac +2" <?= $b2?>>Bac +2</option>
        <option value="Bac +3" <?= $b3?>>Bac +3</option>
        <option value="Bac +4" <?= $b4?>>Bac +4</option>
        <option value="Bac +5 (ou +)" <?= $b5?>>Bac +5 ou plus</option>
      </select><br>

  		<input type="text" name="num_etudiant" id="num_etudiant" placeholder = "N° de carte étudiant" value="<?= $num_etudiant?>"><br>
  	</fieldset>

  	<fieldset id="part2">
        <select name="matiere">
          <option selected disabled >Matière</option>
          <?php 
             foreach ($matiere_list as $indice)
             {
                $m_selected = (isset($matiere) && $indice['id_m'] == $matiere) ? "selected" : "";
                echo '<option value="'. $indice['id_m'] . '"'. $m_selected .'>' .  $indice['nom']. '</option>';
             }
          ?>
        </select><br>
    		
        <select name="classe_debut">
          <option selected disabled >Classe de début</option>
          <?php 
               foreach ($scolarite_list as $indice)
               {
                 $cd_selected = (isset($classe_debut) && $indice['id_s'] == $classe_debut) ? "selected" : "";
                 echo '<option value="'. $indice['id_s'] . '"'. $cd_selected .'>' .  $indice['nom']. '</option>';
               }
          ?>
        </select><br>

        <select name="classe_fin">
          <option selected disabled >Classe de fin</option>
          <?php 
               foreach ($scolarite_list as $indice)
               {
                 $cf_selected = (isset($classe_fin) && $indice['id_s'] == $classe_fin) ? "selected" : "";
                 echo '<option value="'. $indice['id_s'] . '"'. $cf_selected .'>' .  $indice['nom']. '</option>';
              }
          ?>
        </select><br>


  		  <textarea name="description" placeholder = "Décrivez votre parcours universitaire (ex: bac+2 en chimie)"><?= $description?></textarea><br>

  		  <input type="radio" name="type_rdv" value="faceface" <?= $rdv_ff?> > Face à face
    		<input type="radio" name="type_rdv" value="webcam" <?= $rdv_w?> > Webcam
    		<input type="radio" name="type_rdv" value="both" <?= $rdv_2?> > Les deux<br>
    	</fieldset>

    	<fieldset id="part3">
    		<textarea name="detail_dispo" placeholder = "Vos disponibilités (ex: disponible le lundi de 18h à 20h"><?= $detail_dispo?></textarea><br>
    		<input type="text" name="tarif" id="tarif" placeholder = "Tarif (0,0)" value="<?= $tarif?>"><br>
    	</fieldset>

      <input type="submit" name="enregister" value="Inscription">


  

</form>