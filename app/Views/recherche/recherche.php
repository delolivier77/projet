<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
</head>
<body>
<form method="POST" action="">  
    <input placeholder="Matière" type="text" id="matiere" name="name">
    <input placeholder="Niveau" type="text" id="niveau" name="name">
    <input placeholder="Ville" type="text" id="ville" name="name">
    <input type="submit" value="Rechercher">
</form>
<script>
$(function() {
	var listeM = <?= $matieres ?>;
	var listeN = [
	"Bac",
    "CP",
    "CE1"
	];
	var listeV = [
	"Paris",
    "Lyon",
    "Marseille"
	];
$('#matiere').autocomplete({
    source : listeM
	});
$('#niveau').autocomplete({
    source : listeN
	});
$('#ville').autocomplete({
    source : listeV
	});
});
</script>
</body>
</html>