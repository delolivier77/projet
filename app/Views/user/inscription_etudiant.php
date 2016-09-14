	
<form action="">
	

	<fieldset id="part1">
   		<input type="file" name="photo"><br>
		<input type="radio" name="civilite" value="h" checked> M.
  		<input type="radio" name="civilite" value="m"> Mme<br>
  		<input type="text" name="nom" id="nom" placeholder = "Nom"><br>
  		<input type="text" name="prenom" id="prenom" placeholder = "Prénom"><br>
  		<input type="text" name="email" id="email" placeholder = "Email"><br>
  		<input type="text" name="mdp" id="mdp" placeholder = "Mot de passe"><br>
  		<input type="text" name="date_naissance" id="date_naissance" placeholder = "Date de Naissance"><br>
  		<input type="text" name="telephone" id="telephone" placeholder = "N° de téléphone"><br>
  		<input type="text" name="adresse" id="adresse" placeholder = "Adresse"><br>
  		<input type="text" name="cp" id="cp" placeholder = "CP"><br>
  		<input type="text" name="ville" id="ville" placeholder = "Ville"><br>
  		<input type="text" name="niveau_etude" id="niveau_etude" placeholder = "Niveau d'étude"><br>
  		<input type="text" name="carte_etudiant" id="carte_etudiant" placeholder = "N° de carte étudiant"><br>
  	</fieldset>

  	<fieldset id="part2">
  		<input type="text" name="matiere" id="matiere" placeholder = "Matière"><br>
  		<input type="text" name="classe_debut" id="classe_debut" placeholder = "Classe de début"><br>
  		<input type="text" name="classe_fin" id="classe_fin" placeholder = "Classe de fin"><br>

  		<textarea name="parcours" placeholder = "Décrivez votre parcours universitaire (ex: bac+2 en chimie)"></textarea><br>

		<input type="radio" name="tyr_rdv" value="face_a_face" > Face à face<br>
  		<input type="radio" name="tyr_rdv" value="webcam"> Webcam<br>
  		<input type="radio" name="tyr_rdv" value="les_deux"> Les deux<br>
  	</fieldset>

	<fieldset id="part3">
		<textarea name="dispo" placeholder = "Vos disponibilités (ex: disponible le lundi de 18h à 20h"></textarea><br>
		<input type="text" name="tarif" id="tarif" placeholder = "Tarif (ex: 15€)"><br>
	</fieldset>

</form>