
<?php
 
  echo $fmsg->display(); 
  
  debug($assignedDatas);

  debug($_POST);
  extract($_POST);
  $mdp = (isset($mdp)) ? $mdp : "";
  debug($mdp);
  if (isset($_POST) && !empty($_POST)){
    echo 'test';
  }

?>

<form action="<?= $this->url('user_add_user_particulier')?>" method="post">

   	  <input type="radio" name="civilite" value="M." <?= $assignedDatas['civilite_h']?>>M.
  		<input type="radio" name="civilite" value="Mme" <?= $assignedDatas['civilite_f']?>>Mme<br>
  		<input type="text" name="nom" id="nom" placeholder = "Nom" value="<?= $assignedDatas['nom']?>"><br>
  		<input type="text" name="prenom" id="prenom" placeholder = "Prénom" value="<?= $assignedDatas['prenom']?>"><br>
  		<input type="text" name="email" id="email" placeholder = "Email" value="<?= $assignedDatas['email']?>"><br>
  		<input type="text" name="mdp" id="mdp" placeholder = "Mot de passe" value="<?= $assignedDatas['mdp']?>"><br>
      <input type="text" name="adresse" id="adresse" placeholder = "Adresse" value="<?= $assignedDatas['adresse']?>"><br>
      <input type="text" name="cp" id="cp" placeholder = "CP (00000)" value="<?= $assignedDatas['cp']?>"><br>
      <input type="text" name="ville" id="ville" placeholder = "Ville" value="<?= $assignedDatas['ville']?>"><br>
      <input type="text" name="tel" id="tel" placeholder = "N° de téléphone (0000000000)" value="<?= $assignedDatas['tel']?>"><br>

      <input type="text" name="prenom_enfant" id="prenom_enfant" placeholder = "Prénom de l'enfant" value="<?= $assignedDatas['prenom_enfant']?>"><br>
  		<input type="text" name="date_naissance" id="date_naissance" placeholder = "Date de Naissance (00/00/0000)" value="<?= $assignedDatas['date_naissance']?>"><br>
  	     		
      <select name="classe">
        <option selected disabled >Classe de l'enfant</option>
        <?php 
             foreach ($scolarite_list as $indice)
             {
               $cd_selected = (isset($assignedDatas['classe']) && $indice['id_s'] == $assignedDatas['classe']) ? "selected" : "";
               echo '<option value="'. $indice['id_s'] . '"'. $cd_selected .'>' .  $indice['nom']. '</option>';
             }
        ?>
      </select><br>

      <input type="submit" name="enregister" value="Inscription">

</form>