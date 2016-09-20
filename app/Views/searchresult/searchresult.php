<?php $this->layout('layout'); ?>

<?php $this->start('main_content') ?>
<style scoped>
ul{list-style: none;}
p{overflow: hidden;text-overflow: ellipsis;max-height: 100px;}
.top-content{height: 165px;}
#map{height: 300px;border-radius: 5px;}
.mdi-star, .mdi-star-half, .mdi-star-outline{color: #F5CE28;}
.search-result-picture {position: relative;}
.shadow{position: absolute;width: 100%;height: 100%;-webkit-box-shadow: inset 0px -25px 5px 0px rgba(0,0,0,0.71);-moz-box-shadow: inset 0px -25px 5px 0px rgba(0,0,0,0.71);box-shadow: inset 0px -25px 5px 0px rgba(0,0,0,0.71);bottom: 10%;z-index: -1;}
.search-result-picture img{display: block; width: 100%;border-radius: 5px;}
.search-result-picture p{display: inline; color: #fff;}
.search-result-picture .stars {position: absolute; z-index: 1; top: 88%; left: 15%;}
.etudiant{
	cursor: pointer;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-lg-12"><p>Test</p>
			<!-- <?php $this->insert('recherche/recherche',array('matieres'=>$matieres, 'scolarites'=>$scolarites)); ?> -->
		</div>
	</div>
	<div class="row">
	<div class="col-lg-3">
		<div class="row">
			<div class="col-lg-12" id="map"></div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<p>Type de cours</p>
				<div class="radio">
  					<label>
    					<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>&Agrave; mon domicile
  					</label>
				</div>
				<div class="radio">
  				<label>
    				<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Par webcam
  				</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<p>Tarifs</p>
				<div class="radio">
  					<label>
    					<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Tous
  					</label>
				</div>
				<div class="radio">
  				<label>
    				<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Les moins chers
  				</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-9">
	<?php foreach($finalresultv as $valeur): ?>
		<div class="row etudiant" onclick="location.href='<?= $valeur["id_et"]?>';">
			<div class="search-result-picture col-lg-3">
				<img src="<?= $this->assetUrl("img/photos/" . $valeur['photo'] . "") ?>">
				<div class="stars">
					<?php
    				for($x=1;$x<=$valeur['moyenne'];$x++) {
        				echo '<i class="mdi mdi-18px mdi-star" aria-hidden="true"></i>';
    				}
    				if (strpos($valeur['moyenne'],'.' && '' > 0)) {
        				echo '<i class="mdi mdi-18px mdi-star-half" aria-hidden="true"></i>';
        				$x++;
    				}
    				while ($x<=5) {
        				echo '<i class="mdi mdi-18px mdi-star-outline" aria-hidden="true"></i>';
        			$x++;
    				}
					?>
					<p><?= $valeur['nbrdevote']?> (avis)</p>
					<div class="shadow"></div>
				</div>
			</div>
			<div class="search-result-content col-lg-9">
				<div class="row top-content">
					<p><strong><?= $valeur['prenom']?></strong>
					<?php if($valeur['type_rdv'] == 'webcam' || $valeur['type_rdv'] == 'both'): ?>
					<i class="mdi mdi-24px mdi-webcam" aria-hidden="true"></i>
					<?php endif;?>
					<?php if($valeur['type_rdv'] == 'faceface' || $valeur['type_rdv'] == 'both'): ?>
					<i class="mdi mdi-24px mdi-account-multiple" aria-hidden="true"></i>
					<?php endif;?>
					</p>
					<p><?= $valeur['description']?></p>
				</div>
				<div class="row">
					<div class="col-lg-9"></div>
					<div class="col-lg-3">
						<p><?= $valeur['tarif']?>€/h</p>


					</div>
				</div>
		</div>
		</div>
	<?php endforeach; ?>
	</div>
	</div>
</div>
<script type="text/javascript">

var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 48.856614, lng: 2.3522219000000177},
    disableDefaultUI: true,
    zoom: 10
  });
  map.setOptions({draggable: false, zoomControl: false, scrollwheel: false, disableDoubleClickZoom: true});
}

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPlW4LQDMOdSwwxD63oCeedmLRHb6yIjo&callback=initMap&region=FR"
        async defer></script>
<?php $this->stop('main_content') ?>



0 => moyenne = étoiles jaune
moyenne => 5 = étoiles blanches blanche

https://maps.googleapis.com/maps/api/geocode/json?address=paris,france