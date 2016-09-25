
<?php
 
  $this->layout('layout');
   
  $this->start('main_content');

  echo $fmsg->display(); 

  extract($assignedDatas);
  

?>

<form action="<?= $this->url('user_add_user_particulier')?>" method="post">

   	  <input type="radio" name="civilite" value="M." <?= $civilite_h?>>M.
  		<input type="radio" name="civilite" value="Mme" <?= $civilite_f?>>Mme<br>
  		<input type="text" name="nom" id="nom" placeholder = "Nom" value="<?= $nom?>"><br>
  		<input type="text" name="prenom" id="prenom" placeholder = "Prénom" value="<?= $prenom?>"><br>
  		<input type="text" name="email" id="email" placeholder = "Email" value="<?= $email?>"><br>
  		<input type="text" name="mdp" id="mdp" placeholder = "Mot de passe" value="<?= $mdp?>"><br>
      <input type="text" name="adresse" id="adresse" placeholder = "Adresse" value="<?= $adresse?>"><br>
      <input type="text" name="cp" id="cp" placeholder = "CP (00000)" value="<?= $cp?>"><br>
      <input type="text" name="ville" id="ville" placeholder = "Ville" value="<?= $ville?>"><br>
      <input type="text" name="tel" id="tel" placeholder = "N° de téléphone (0000000000)" value="<?= $tel?>"><br>

      <input type="text" name="prenom_enfant" id="prenom_enfant" placeholder = "Prénom de l'enfant" value="<?= $prenom_enfant?>"><br>
  		<input type="text" name="date_naissance" id="date_naissance" placeholder = "Date de Naissance (00/00/0000)" value="<?= $date_naissance?>"><br>
  	     		
      <select name="classe">
        <option selected disabled >Classe de l'enfant</option>
        <?php 
             foreach ($scolarite_list as $indice)
             {
               $cd_selected = (isset($classe) && $indice['id_s'] == $classe) ? "selected" : "";
               echo '<option value="'. $indice['id_s'] . '"'. $cd_selected .'>' .  $indice['nom']. '</option>';
             }
        ?>
      </select><br>

      <input type="submit" name="enregister" value="Inscription">

</form>



<?php $this->stop('main_content');  ?>