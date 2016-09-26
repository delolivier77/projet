<?php $this->layout('layout', ['title' => 'Resultats']); ?>

<?php $this->start('main_content') ?>
<style scoped>
ul{list-style: none;}
p{overflow: hidden;text-overflow: ellipsis;max-height: 100px;}
.top-content{height: 165px;}
#map{height: 300px;width: 100%;border-radius: 5px;padding: 0;}
.fa-star, .fa-star-half-o, .fa-star-o{color: #F5CE28;}
.search{padding-top: 3%; padding-bottom: 3%;border-radius: 5px;}
.search-result-map{margin-top: 6%;}
.search-result-container{margin-top: 2%;overflow: hidden;}
.search-result-picture {position: relative;padding-right: 0;overflow: hidden;}
/* .search-result-picutre img{display: block; width: 97%;} */
/* .shadow{position: absolute;width: 100%;height: 100%;-webkit-box-shadow: inset 0px -25px 5px 0px rgba(0,0,0,0.71);-moz-box-shadow: inset 0px -25px 5px 0px rgba(0,0,0,0.71);box-shadow: inset 0px -25px 5px 0px rgba(0,0,0,0.71);bottom: 10%;z-index: -1;} */
.search-result-picture img{display: block; width: 100%;border-radius: 5px 0 0 5px;}
.search-result-picture p{display: inline; color: #fff;}
.search-result-picture .stars {position: absolute; z-index: 1; top: 88%; left: 25%;}
.stars{background-color: rgba(0,0,0,0.7);}
/* .search-result-content{margin-left: 22px;} */
.etudiant{
	cursor: pointer;
}
.test{overflow: hidden;}
.etudiants{background-color: #fff; border-radius: 0 5px 5px 0;}
.fix{margin-left: 5px;}
</style>
<div class="container">
	<div class="row fix">
		<div class="col-lg-12 search"><?php $this->insert('recherche/recherche',array('matieres'=>$matieres, 'scolarites'=>$scolarites, 'ville'=>$ville, 'scolarite' => $scolarite, 'matiere' => $matiere)); ?>
		</div>
	</div>
	<div class="row fix">
	<div class="col-lg-3">
		<div class="row fix search-result-map">
			<div class="col-lg-12 test" id="map"></div>
		</div>
	</div>
	<div class="col-lg-9 .col-md-offset-3">
	<?php foreach($finalresultv as $valeur): ?>
		<div class="row fix search-result-container" onclick="displayModal('<?= $this->url('detailsetudiant_detailsetudiant', ['id' => $valeur['id_u']]) ?>');">
			<div class="search-result-picture col-lg-3">
				<img src="<?= $this->assetUrl("img/photos/" . $valeur['photo'] . "") ?>">
				<div class="stars">
					<?php
    				for($x=1;$x<=$valeur['moyenne'];$x++) {
        				echo '<i class="fa fa-star bg-star" aria-hidden="true"></i>';
    				}
    				if (strpos($valeur['moyenne'],'.') && intval($valeur['moyenne']) != $valeur['moyenne']) {
        				echo '<i class="fa fa-star-half-o bg-star" aria-hidden="true"></i>';
        				$x++;
    				}
    				while ($x<=5) {
        				echo '<i class="fa fa-star-o bg-star" aria-hidden="true"></i>';
        			$x++;
    				}
					?>
					<p><?= $valeur['nbrdevote']?> (avis)</p>
				</div>
			</div>
			<div class="search-result-content col-lg-9 etudiants">
				<div class="row fix top-content">
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
				<div class="row fix">
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
	var resultVille;
	var map;
	$.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address=<?php echo strtolower($ville); ?>,france').done(function(datas) {
			var localize = function() {
				resultVille = datas;
				if(resultVille.results.length < 1) {
					// traitement de l'erreur
					return ;
				}
				var positionVille = resultVille.results[0].geometry.location;
				map = new google.maps.Map(document.getElementById('map'), {
			    center: {lat: positionVille.lat, lng: positionVille.lng},
			    disableDefaultUI: true,
			    zoom: 10
			  });
			  map.setOptions({draggable: false, zoomControl: false, scrollwheel: false, disableDoubleClickZoom: true});
			}
			if(googleLoaded) {
				localize();
			} else {
				mapStack.push(localize);
			}
			
		});
	
	function displayModal(url) {
		$.get(url, function(data){
			var myModal = $('#modalStudent');
			myModal.find('h4').text('Fiche étudiant');
			myModal.find('.modal-body').html(data);
			myModal.modal();

		});
	}


</script>

<div class="modal fade" id="modalStudent" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php $this->stop('main_content') ?>
