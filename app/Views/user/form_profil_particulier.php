

<?php
   
    $fmsg->display(); 
    $date_naissance = date('d/m/Y', strtotime($enfant[0]['date_naissance']));
?>


<form action="<?= $this->url('user_update_particulier')?>" method="post">

   	  <input type="radio" name="civilite" value="M." <?=(!isset($particulier['civilite']) || (isset($particulier['civilite'])) && $particulier['civilite'] == "M.") ? 'checked' : ""?>>M.
  	  <input type="radio" name="civilite" value="Mme" <?=(isset($particulier['civilite']) && $particulier['civilite'] == "Mme") ? 'checked' : ""?> >Mme<br>
  	  <input type="text" name="nom" id="nom" placeholder = "Nom" value= "<?= $_SESSION['user']['nom']?>" ><br>
  	  <input type="text" name="prenom" id="prenom" placeholder = "Prénom" value="<?= $_SESSION['user']['prenom']?>"><br>
  	  <input type="text" name="email" id="email" placeholder = "Email" value="<?= $_SESSION['user']['email']?>"><br>
  	  <input type="text" name="adresse" id="adresse" placeholder = "Adresse" value="<?= $particulier['adresse']?>"><br>
      <input type="text" name="cp" id="cp" placeholder = "CP (00000)" value="<?= $particulier['cp']?>"><br>
      <input type="text" name="ville" id="ville" placeholder = "Ville" value="<?= $particulier['ville']?>"><br>
      <input type="text" name="tel" id="tel" placeholder = "N° de téléphone (0000000000)" value="<?= $particulier['tel']?>"><br>

      <input type="hidden" name="id_en" value="<?= $enfant[0]['id_en']?>">
      <input type="text" name="prenom_enfant" id="prenom_enfant" placeholder = "Prénom de l'enfant" value="<?= $enfant[0]['prenom']?>"><br>
  		<input type="text" name="date_naissance" id="date_naissance" placeholder = "Date de Naissance (00/00/0000)" value="<?= $date_naissance?>"><br>
  	     		
      <select name="classe">
        <option selected disabled >Classe de l'enfant</option>
        <?php 
             foreach ($scolarite_list as $indice)
             {
               $cd_selected = (isset($scolarite['id_s']) && $indice['id_s'] == $scolarite['id_s']) ? "selected" : "";
               echo '<option value="'. $indice['id_s'] . '"'. $cd_selected .'>' .  $indice['nom']. '</option>';
             }
        ?>
      </select><br>

      <input type="radio" name="statut" value="actif" <?= (isset($_SESSION['user']['statut']) || (isset($_SESSION['user']['statut'])) && $statut == "") ? 'checked' : ""?>>actif
      <input type="radio" name="statut" value="inactif" <?=(isset($_SESSION['user']['statut']) && $_SESSION['user']['statut'] == "inactif") ? 'checked' : ""?> >inactif<br>

      <label for="ancien_mdp">Pour changer de mot de passe, inscrire l'ancien avant d'en écrire un nouveau</label><br>
      <input type="text" name="ancien_mdp" id="ancien_mdp" placeholder = "Ancien mot de passe" >
      <input type="text" name="ancien_mdp" id="ancien_mdp" placeholder = "Ancien mot de passe" ><br>

      <input type="submit" name="enregister" value="modifier">

</form>