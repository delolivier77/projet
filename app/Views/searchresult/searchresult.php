<?php $this->layout('layout', ['title' => 'Resultats']); ?>

<?php $this->start('main_content') ?>
	<div class="container">
	<div class="row fix">
		<div class="col-lg-12 search"><?php $this->insert('recherche/recherche',array('matieres'=>$matieres, 'scolarites'=>$scolarites, 'ville'=>$ville, 'scolarite' => $scolarite, 'matiere' => $matiere)); ?>
		</div>
	</div>
	<div class="row fix">
	<div class="col-lg-3">
		<div class="row fix search-result-map">
			<div class="col-lg-12 map" id="map"></div>
		</div>
	</div>
	<div class="col-lg-9 .col-md-offset-3">
	<?php foreach($finalresultv as $valeur): ?>
		<div class="row fix search-result-container etudiant" onclick="displayModal('<?= $this->url('detailsetudiant_detailsetudiant', ['id' => $valeur['id_u']]) ?>');">
			<div class="search-result-picture col-lg-3">
				<img src="<?= $this->assetUrl("img/photos/" . $valeur['photo'] . "") ?>">
				<div class="stars-details">
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
			  	var image = '<?= $this->assetUrl("img/visuels/down-arrow.png") ?>';
				var marker = new google.maps.Marker({
    			position: {lat: positionVille.lat, lng: positionVille.lng},
    			icon: image
				});
				marker.setMap(map);
				var circle = new google.maps.Circle({
				map: map,
				radius: 5000,
				fillColor: '#286090',
				strokeWeight: 2,
				strokeColor : '#286090'
				});
				circle.bindTo('center', marker, 'position');
			  	map.setOptions({draggable: false, zoomControl: false, scrollwheel: false, disableDoubleClickZoom: true});
			}
			if(googleLoaded) {
				localize();
			} else {
				mapStack.push(localize);
			}
			
		});
	
	// function displayModal(url) {
	// 	$.get(url, function(data){
	// 		var myModal = $('#modalStudent');
	// 		myModal.find('h4').text('Fiche étudiant');
	// 		myModal.find('.modal-body').html(data);
	// 		myModal.modal();

	// 	});
	// }


	function displayModal(url) {
	<?php if(isset($_SESSION['user']) && ($_SESSION['user']['role'] == 'particulier' || $_SESSION['user']['role'] == 'admin')): ?>
			$.get(url, function(data){
				var myModal = $('#modalStudent');
				myModal.find('h4').text('Fiche étudiant');
				myModal.find('.modal-body').html(data);
				myModal.modal();

			});
	<?php else : ?>
		alert("Vous devez être connecté pour accéder au profil de l'étudiant(e)");
	<?php endif; ?>
	}

</script>

<div class="modal fade" id="modalStudent" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>

<?php $this->stop('main_content') ?>
