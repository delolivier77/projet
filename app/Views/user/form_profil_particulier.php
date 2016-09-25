

<?php
   
    $fmsg->display(); 
    $date_naissance = date('d/m/Y', strtotime($enfant[0]['date_naissance']));

?>


<form action="<?= $this->url('user_update_particulier')?>" method="post">

   	  <input type="radio" name="civilite" value="M." <?=(isset($particulier['civilite'])) && $particulier['civilite'] == "M.") ? 'checked' : ""?>>M.
  	  <input type="radio" name="civilite" value="Mme" <?=(isset($particulier['civilite']) && $particulier['civilite'] == "Mme") ? 'checked' : ""?> >Mme<br>
  	  <input type="text" name="nom" id="nom" value= "<?= $_SESSION['user']['nom']?>" ><br>
  	  <input type="text" name="prenom" id="prenom" value="<?= $_SESSION['user']['prenom']?>"><br>
  	  <input type="text" name="email" id="email" value="<?= $_SESSION['user']['email']?>"><br>
  	  <input type="text" name="adresse" id="adresse" value="<?= $particulier['adresse']?>"><br>
      <input type="text" name="cp" id="cp" value="<?= $particulier['cp']?>"><br>
      <input type="text" name="ville" id="ville" value="<?= $particulier['ville']?>"><br>
      <input type="text" name="tel" id="tel" value="<?= $particulier['tel']?>"><br>

      <input type="hidden" name="id_en" value="<?= $enfant[0]['id_en']?>">
      <input type="text" name="prenom_enfant" id="prenom_enfant" value="<?= $enfant[0]['prenom']?>"><br>
  		<input type="text" name="date_naissance" id="date_naissance" value="<?= $date_naissance?>"><br>
  	     		
      <select name="classe">
        <option selected disabled >Classe de l'enfant</option>
        <?php 
             foreach ($scolarite_list as $indice)
             {
               $cd_selected = (isset($enfant[0]['id_s']) && $indice['id_s'] == $enfant[0]['id_s']) ? "selected" : "";
               echo '<option value="'. $indice['id_s'] . '"'. $cd_selected .'>' .  $indice['nom']. '</option>';
             }
        ?>
      </select><br>

      <label for="ancien_mdp">Pour changer de mot de passe, inscrire l'ancien avant d'en écrire un nouveau</label><br>
      <input type="text" name="ancien_mdp" id="ancien_mdp" placeholder = "Ancien mot de passe" >
      <input type="text" name="nouveau_mdp" id="nouveau_mdp" placeholder = "Nouveau mot de passe" ><br>

      <input type="submit" name="enregister" value="modifier">

</form>