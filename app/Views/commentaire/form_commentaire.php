


<form action="<?= $this->url('commentaire_update_commentaire')?>" method="post">

	 <input type="hidden" name="id_co" value="<?= $commentaire[0]['id_co']?>"><br>
	 <input type="text" name="note" id="note" value= "<?= $commentaire[0]['note']?>" ><br>
	 <textarea name="commentaire" ><?= $commentaire[0]['commentaire']?></textarea><br>
	 <input type="submit" name="enregister" value="modifier">

</form>