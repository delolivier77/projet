<form method="POST" class="form-inline" action="<?=$this->url('recherche_result') ?>">
	<div class="form-group">
    <input placeholder="Matière" type="text" class="form-control" id="matiere" name="matiere" value="<?= isset($matiere) ? $matiere : ''; ?>">
    <input placeholder="Scolarité" type="text" class="form-control" id="niveau" name="scolarite" value="<?= isset($scolarite) ? $scolarite : ''; ?>">
    <input placeholder="Ville" type="text" class="form-control" id="searchTextField" name="ville" value="<?= isset($ville) ? $ville : ''; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Rechercher</button>
    

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
