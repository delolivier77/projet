<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPlW4LQDMOdSwwxD63oCeedmLRHb6yIjo&libraries=places&region=FR"></script>
</head>
<body>
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
    <input placeholder="Niveau" type="text" id="niveau" name="niveau">
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
</body>
</html>