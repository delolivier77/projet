<?php
for($x=1;$x<=$comm['note'];$x++) {
	echo '<i class="fa fa-star bg-star" aria-hidden="true"></i>';
}
if (strpos($comm['note'],'.') && intval($comm['note']) != $comm['note']) {
	echo '<i class="fa fa-star-half-o bg-star" aria-hidden="true"></i>';
	$x++;
}
while ($x<=5) {
	echo '<i class="fa fa-star-o bg-star" aria-hidden="true"></i>';
	$x++;
}
?><br>
Par <?= $_SESSION['user']['prenom'] ?> le <?= $comm['date_commentaire'] ?><br>
<?= $comm['commentaire'] ?><br>
<br><br>