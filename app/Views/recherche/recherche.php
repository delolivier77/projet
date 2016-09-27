<form method="POST" action="<?=$this->url('recherche_result') ?>">
	<div class="col-lg-offset-1 col-lg-3">
    <input placeholder="Matière" type="text" class="form-control" id="matiere" name="matiere" value="<?= isset($matiere) ? $matiere : ''; ?>">
    </div>
    <div class="col-lg-3">
    <input placeholder="Classe" type="text" class="form-control" id="niveau" name="scolarite" value="<?= isset($scolarite) ? $scolarite : ''; ?>">
    </div>
    <div class="col-lg-3">
    <input placeholder="Ville" type="text" class="form-control" id="searchTextField" name="ville" value="<?= isset($ville) ? $ville : ''; ?>">
    </div>
    <div class="col-lg-1">	
    <button type="submit" class="btn btn-primary">Rechercher</button>
    </div>
</form>
<script>
var input = document.getElementById('searchTextField');
var options = {
  types: ['(cities)'],
  componentRestrictions: {country: 'fr'}
};

mapStack.push(function() {
	autocomplete = new google.maps.places.Autocomplete(input, options);
});

$(function() {
	
	var listeM = <?= $matieres ?>;
	var listeN = <?= $scolarites ?>;
	$('#matiere').autocomplete({
    	source : listeM
	});
	$('#niveau').autocomplete({
   	 	source : listeN
	});
});
</script>
