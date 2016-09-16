


<form action="<?= $this->url('user_add_user_etudiant')?>" method="post">
	
	<fieldset id="part1">
   		<input type="file" name="photo"><br>
		  <input type="radio" name="civilite" value="M." checked>M.
  		<input type="radio" name="civilite" value="Mme">Mme<br>
  		<input type="text" name="nom" id="nom" placeholder = "Nom"><br>
  		<input type="text" name="prenom" id="prenom" placeholder = "Prénom"><br>
  		<input type="text" name="email" id="email" placeholder = "Email"><br>
  		<input type="text" name="mdp" id="mdp" placeholder = "Mot de passe"><br>
  		<input type="text" name="date_naissance" id="date_naissance" placeholder = "Date de Naissance"><br>
  		<input type="text" name="tel" id="tel" placeholder = "N° de téléphone"><br>
  		<input type="text" name="adresse" id="adresse" placeholder = "Adresse"><br>
  		<input type="text" name="cp" id="cp" placeholder = "CP"><br>
  		<input type="text" name="ville" id="ville" placeholder = "Ville"><br>
  		
      <select name="niveau_etude">
        <option selected disabled >Niveau d'étude</option>
        <option value="BAC +1">Bac +1</option>
        <option value="BAC +2">Bac +2</option>
        <option value="BAC +3">Bac +3</option>
        <option value="BAC +4">Bac +4</option>
        <option value="BAC +5 ou plus">Bac +5 (ou +)</option>
      </select><br>

  		<input type="text" name="num_etudiant" id="num_etudiant" placeholder = "N° de carte étudiant"><br>
  	</fieldset>

  	<fieldset id="part2">
      <select name="matiere">
        <option selected disabled >Matière</option>
        <?php 
            // var_dump($matiere);
          foreach ($matiere as $indice) {
           
              echo '<option value="'. $indice['id_m'] . '">' .  $indice['nom']. '</option>';
          }
        ?>
      </select><br>
  		
      <select name="classe_debut">
        <option selected disabled >Classe de début</option>
        <?php 
             foreach ($scolarite as $indice) {
           
             echo '<option value="'. $indice['id_s'] . '">' .  $indice['nom']. '</option>';
          }
        ?>
      </select><br>

      <select name="classe_fin">
        <option selected disabled >Classe de fin</option>
        <?php 
             foreach ($scolarite as $indice) {
           
             echo '<option value="'. $indice['id_s'] . '">' .  $indice['nom']. '</option>';
          }
        ?>
      </select><br>


  		<textarea name="description" placeholder = "Décrivez votre parcours universitaire (ex: bac+2 en chimie)"></textarea><br>

		<input type="radio" name="type_rdv" value="faceface" > Face à face<br>
  		<input type="radio" name="type_rdv" value="webcam"> Webcam<br>
  		<input type="radio" name="type_rdv" value="both"> Les deux<br>
  	</fieldset>

	<fieldset id="part3">
		<textarea name="detail_dispo" placeholder = "Vos disponibilités (ex: disponible le lundi de 18h à 20h"></textarea><br>
		<input type="text" name="tarif" id="tarif" placeholder = "Tarif (ex: 15€)"><br>
	</fieldset>

  <input type="submit" name="enregister" value="Inscription">


  <?php  debug($_POST); ?>

</form>