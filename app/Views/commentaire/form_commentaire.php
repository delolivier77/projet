<?php
	
$this->layout('layout', ['title' => 'Commentaire']);

$this->start('main_content');

?>
<div class="container">

	<h1 class="h2 text-center">Modifiez votre commentaire</h1>

	<div class="row formular">
		<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h2 class="panel-title">Commentaire</h2>
				</div>

				<div class="panel-body">

					<form action="<?= $this->url('commentaire_update_commentaire')?>" method="post">

						<div class="row">

							<div class="col-lg-12">
								<div class="form-group">
									<label for="note">Note sur 5</label>
									<input type="text" class="form-control" name="note" id="note" value= "<?= $commentaire[0]['note']?>" >
									<input type="hidden" name="id_co" value="<?= $commentaire[0]['id_co']?>">
								</div>
							</div>
						</div>

						<label>Commentaire</label>
						<textarea class="form-control" rows="5" name="commentaire" ><?= $commentaire[0]['commentaire']?></textarea>
						
						<input type="submit" name="enregister" class="btn btn-info btn-block" value="Enregistrer">

					</form>

				</div>
			</div>
		</div>
	</div>

</div>

<?php $this->stop('main_content'); ?>