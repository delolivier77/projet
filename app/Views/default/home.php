<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
<style scoped>
	.pac-icon{
	display: none;
	}
	.pac-container:after {
    background-image: none !important;
    height: 0px;
}
</style>
<form method="POST" action="<?=$this->url('recherche_result') ?>">  
    <input placeholder="Matière" type="text" id="matiere" name="matiere">
    <input placeholder="Scolarité" type="text" id="niveau" name="scolarite">
    <input placeholder="Ville" type="text" id="searchTextField" name="ville">
    <input type="submit" value="Rechercher">
</form>
<script>
var input = document.getElementById('searchTextField');
var options = {
  types: ['(cities)'],
  componentRestrictions: {country: 'fr'}
};

autocomplete = new google.maps.places.Autocomplete(input, options);

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
<?php $this->stop('main_content') ?>
